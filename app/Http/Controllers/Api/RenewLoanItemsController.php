<?php

namespace App\Http\Controllers\Api;

use App\Copy;
use App\LoanItem;
use App\RenewLoanItem;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RenewLoanItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $daysToAdd = 10;

        if ($request->user() != null) {

            if ($request->user()->hasRole(array('admin', 'librarian'))) {
                $loanItem = LoanItem::findLoanItem($request->get('loan_item_id'));

                $loanItem->return_prevision = date('Y-m-d H:i:s', strtotime($loanItem->return_prevision. ' + ' . $daysToAdd . ' days'));

                if ($loanItem->save()) {

                    $renewLoanItem = (new RenewLoanItem())->store(array('loan_item_id' => $loanItem->id, 'return_prevision' => $loanItem->return_prevision));

                    if ($renewLoanItem->save()) {
                        return $renewLoanItem;
                    } else {
                        return array('erro ao salvar o renew loan item');
                    }
                } else {
                    return array('erro ao salvar o return prevision de loan item');
                }
            } else {
                return array('usuario nao possui permissao');
            }
        } else {
            return array('usuario nao logado');
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
