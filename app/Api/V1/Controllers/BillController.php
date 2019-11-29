<?php

namespace App\Api\V1\Controllers;
use App\Bill;
use App\Api\V1\Requests\BillRequest;
use App\Helpers\RestHelper;
use App\Http\Controllers\Controller;

/**
 * @group Bill
 *
 * This controller is used for the management of bills
 * Class BillController
 * @package App\Api\V1\Controllers
 */
class BillController extends Controller{
    /**
     * Start action, use to show all bills inside the database
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(){
        return RestHelper::get(Bill::class);
    }
    /**
     * Show the form for creating a new bill.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Action to be executed to store a newly created bill in storage.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(BillRequest $request)
    {
        return RestHelper::store(Bill::class,$request->all());
    }
    /**
     * Display the specified bill. given the ID
     *
     * @param  int  $id
     * @return \Illumi$addressnate\Http\JsonResponse
     */
    public function show($id)
    {
        return RestHelper::show(Bill::class,$id);
    }
    /**
     * Show the form for editing the specified bill.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Bill $bill)
    {
        //
    }
    /**
     * Update the specified bill in database.
     *
     * @param BillRequest $request
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(BillRequest $request, $id)
    {
        return RestHelper::update(Bill::class,$request->all(),$id);
    }
    /**
     * Remove the specified bill from database given his id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        return RestHelper::destroy(Bill::class,$id);
    }
}