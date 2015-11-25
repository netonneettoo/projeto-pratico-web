<?php

namespace App\Http\Controllers\Admin;

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
        $users = User::orderBy('id', 'DESC')->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        return view('admin.users.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = (new User())->validate($request->all());

        if ($validation->fails()) {
            return redirect('/admin/users/create')
                ->withErrors($validation)
                ->withInput();
        }

        $user = (new User())->store($request->all());

        if (! $user->save()) {
            return redirect('/admin/users/create')
                ->withErrors($validation)
                ->withInput();
        } else {
            $users = User::orderBy('id', 'DESC')->paginate(10);
            $success = 'Sucesso ao cadastrar o usuário.';
            return view('admin.users.index', compact('users', 'success'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if ($user == null) {
            return redirect('admin/users');
        }
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if ($user == null) {
            return redirect('admin/users');
        }
        return view('admin.users.edit', compact('user'));
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
        $validation = (new User)->validatePut($request->all());

        if ($validation->fails()) {
            return redirect('/admin/users/'.$id.'/edit')
                ->withErrors($validation)
                ->withInput();
        }

        $user = (new User())->put($request->all(), $id);

        if (! $user->save()) {
            return redirect('/admin/users/'.$id.'/edit')
                ->withErrors($validation)
                ->withInput();
        } else {
            $users = User::orderBy('id', 'DESC')->paginate(10);
            $success = 'Sucesso ao alterar o usuário.';
            return view('admin.users.index', compact('users', 'success'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return 'admin.users.destroy';
    }
}
