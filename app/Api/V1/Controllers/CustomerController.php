<?php

namespace App\Api\V1\Controllers;
use App\Customer;
use App\Api\V1\Requests\CustomerRequest;
use App\Helpers\RestHelper;
use App\Http\Controllers\Controller;

/**
 * @group Customer
 *
 * This controller is used for the management of bills
 * Class CustomerController
 * @package App\Api\V1\Controllers
 */
class CustomerController extends Controller{
    /**
     * Start action, use to show all bills inside the database
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(){
        return RestHelper::get(Customer::class);
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
    public function store(CustomerRequest $request)
    {
        return RestHelper::store(Customer::class,$request->all());
    }
    /**
     * Display the specified bill. given the ID
     *
     * @param  int  $id
     * @return \Illumi$addressnate\Http\JsonResponse
     */
    public function show($id)
    {
        return RestHelper::show(Customer::class,$id);
    }
    /**
     * Show the form for editing the specified bill.
     *
     * @param  \App\Customer  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $bill)
    {
        //
    }
    /**
     * Update the specified bill in database.
     *
     * @param CustomerRequest $request
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CustomerRequest $request, $id)
    {
        return RestHelper::update(Customer::class,$request->all(),$id);
    }
    /**
     * Remove the specified bill from database given his id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        return RestHelper::destroy(Customer::class,$id);
    }
}