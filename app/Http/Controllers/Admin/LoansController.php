<?php

namespace App\Http\Controllers\Admin;

use App\Copy;
use App\Loan;
use App\LoanItem;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class LoansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.loans.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = intval($request->get('u'));
        $user = User::find($id);
        if ($user) {
            $loan = new Loan();
            return view('admin.loans.create', compact('user', 'loan'));
        }

        return redirect('/admin/loans');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::find($request->get('user_id'));
        if ($user == null) {
            return 'Usuário não existe.';
        } else {
            if ($user->hasRole(['employee', 'teacher', 'student'])) {
                // TODO Verificar se o usuário tem débito com a biblioteca/faculdade
                // TODO Verificar quantos examplares o usuário pode alugar
                // TODO Verificar o status do usuário
                $loan = (new Loan())->store($request->all());
                $loan->save();

                $loanItems = array();
                foreach($request->get('loan_items') as $copyId) {
                    $loanItem = (new LoanItem())->store(array('loan_id' => $loan->id, 'copy_id' => intval($copyId), 'return_prevision' => date('2015-12-25 01:02:03')));
                    if ($loanItem->save()) {
                        $loanItems[] = $loanItem;
                    }
                }

                // pode alugar
                return array('success', $loan, $loanItems);
            } else {
                // nao pode alugar
                return array('error');
            }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
