<?php

namespace App\Http\Controllers\Api;

use App\Services\UserService;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('name')) {
            $data = User::with('roles')->where('name', 'like', '%'.$request->get('name').'%')->get();
        } else {
            $data = User::with('roles')->get();
        }

        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = UserService::store($request->all());
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::find($id);
        $data->roles = $data->roles()->get();
        $data->loans = $data->loans()->get();
        for($i = 0; $i < count($data->loans); $i++) {
            $data->loans[$i]->loanItems = $data->loans[$i]->loanItems()->get();
            for($j = 0; $j < count($data->loans[$i]->loanItems); $j++) {
                $data->loans[$i]->loanItems[$j]->copy = $data->loans[$i]->loanItems[$j]->copy()->first();
                $data->loans[$i]->loanItems[$j]->copy->work = $data->loans[$i]->loanItems[$j]->copy->work()->first();
                unset($data->loans[$i]->loanItems[$j]->copy->work_id);
                unset($data->loans[$i]->loanItems[$j]->copy_id);
            }
        }
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = UserService::update($request->all(), $id);
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = UserService::destroy($id);
        return response()->json($data);
    }
}
