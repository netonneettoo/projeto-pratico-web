<?php

namespace App\Http\Controllers\Admin;

use App\Copy;
use App\LoanItem;
use App\ReturnLoanItem;
use DateTime;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReturnLoanItemsController extends Controller
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
        $now = new DateTime();//new DateTime((new DateTime())->format('Y-m-d 00:00:00'));

        if ($request->user() != null) {

            if ($request->user()->hasRole(array('admin', 'librarian'))) {
                $loanItem = LoanItem::findLoanItem($request->get('loan_item_id'));

//                if (is_null($loanItem->returned_at) || empty($loanItem->returned_at) || $loanItem->returned_at == 'null' || $loanItem->returned_at == 'NULL') {
//                    $dateDiff = $now->diff($now);
//                } else {
//                    $dt2 = new DateTime(substr($loanItem->returned_at, 0, 10) . ' 00:00:00');
//                    $dateDiff = $now->diff(new DateTime($dt2->format('Y-m-d H:i:s')));
//                }

//                return array($dateDiff->days, $dateDiff->invert);

//                if ($dateDiff->invert == 0 && $dateDiff->days > 0) {

                    $loanItem->returned_at = $now->format('Y-m-d H:i:s');

                    if ($loanItem->save()) {

                        $copy = Copy::find($loanItem->copy_id);
                        $copy->status = Copy::AVAILABLE;

                        if ($copy->save()) {
                            return array($loanItem);
                        } else {
                            return array('erro ao devolver o exemplar');
                        }
                    } else {
                        return array('error ao salvar o loan item');
                    }
//                } else {
//                    return array('erro, data returned_at de loan item esta invalida');
//                }
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
