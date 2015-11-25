<?php

namespace App\Http\Controllers\Admin;

use App\Publisher;
use App\Work;
use App\WorkType;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WorksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $works = Work::orderBy('id', 'ASC')->paginate(10);
        return view('admin.works.index', compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $work = new Work();
        $publishers = array();
        foreach(Publisher::getByStatus(Publisher::STATUS_ACTIVE)->get(array('id', 'name')) as $publisher) {
            $publishers[$publisher->id] = $publisher->name;
        }
        $workTypes = array();
        foreach(WorkType::all(array('id', 'description')) as $workType) {
            $workTypes[$workType->id] = $workType->description;
        }
        return view('admin.works.create', compact('work', 'publishers', 'workTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = (new Work())->validate($request->all());

        if ($validation->fails()) {
            return redirect('/admin/works/create')
                ->withErrors($validation)
                ->withInput();
        }

        $user = (new Work())->fill($request->all());

        if (! $user->save()) {
            return redirect('/admin/works/create')
                ->withErrors($validation)
                ->withInput();
        } else {
            $works = Work::orderBy('id', 'ASC')->paginate(10);
            $success = 'Sucesso ao cadastrar a obra.';
            return view('admin.works.index', compact('works', 'success'));
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
        $work = Work::find($id);
        if ($work == null) {
            return redirect('admin/works');
        }
        $work->publisher = Publisher::find($work->publisher_id);
        unset($work->publisher_id);
        $work->work_type = WorkType::find($work->work_type_id);
        unset($work->work_type_id);
        $work->status = $work->status == 'active' ? 'Ativo' : 'Inativo';

        return view('admin.works.show', compact('work'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $work = Work::find($id);
        if ($work == null) {
            return redirect('admin/works');
        }
        $publishers = array();
        foreach(Publisher::getByStatus(Publisher::STATUS_ACTIVE)->get(array('id', 'name')) as $publisher) {
            $publishers[$publisher->id] = $publisher->name;
        }
        $workTypes = array();
        foreach(WorkType::all(array('id', 'description')) as $workType) {
            $workTypes[$workType->id] = $workType->description;
        }
        return view('admin.works.edit', compact('work', 'publishers', 'workTypes'));
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
        $validation = (new Work)->validate($request->all());

        if ($validation->fails()) {
            return redirect('/admin/works/'.$id.'/edit')
                ->withErrors($validation)
                ->withInput();
        }

        $work = Work::find($id);

        

        $work = $work->fill($request->all());

        dd($work);

        if (! $work->save()) {
            return redirect('/admin/works/'.$id.'/edit')
                ->withErrors($validation)
                ->withInput();
        } else {
            $works = Work::orderBy('id', 'ASC')->paginate(10);
            $success = 'Sucesso ao alterar a obra.';
            return view('admin.works.index', compact('works', 'success'));
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
        return 'admin.works.destroy';
    }
}
