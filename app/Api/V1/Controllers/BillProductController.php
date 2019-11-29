<?php

namespace App\Api\V1\Controllers;
use App\BillProduct;
use App\Api\V1\Requests\BillProductRequest;
use App\Helpers\RestHelper;
use App\Http\Controllers\Controller;

/**
 * @group BillProduct
 *
 * This controller is used for the management of bills
 * Class BillProductController
 * @package App\Api\V1\Controllers
 */
class BillProductController extends Controller{
    /**
     * Start action, use to show all bills inside the database
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(){
        return RestHelper::get(BillProduct::class);
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
    public function store(BillProductRequest $request)
    {
        return RestHelper::store(BillProduct::class,$request->all());
    }
    /**
     * Display the specified bill. given the ID
     *
     * @param  int  $id
     * @return \Illumi$addressnate\Http\JsonResponse
     */
    public function show($id)
    {
        return RestHelper::show(BillProduct::class,$id);
    }
    /**
     * Show the form for editing the specified bill.
     *
     * @param  \App\BillProduct  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(BillProduct $bill)
    {
        //
    }
    /**
     * Update the specified bill in database.
     *
     * @param BillProductRequest $request
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(BillProductRequest $request, $id)
    {
        return RestHelper::update(BillProduct::class,$request->all(),$id);
    }
    /**
     * Remove the specified bill from database given his id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        return RestHelper::destroy(BillProduct::class,$id);
    }
}