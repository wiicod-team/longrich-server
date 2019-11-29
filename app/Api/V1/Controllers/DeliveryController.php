<?php

namespace App\Api\V1\Controllers;
use App\Delivery;
use App\Api\V1\Requests\DeliveryRequest;
use App\Helpers\RestHelper;
use App\Http\Controllers\Controller;

/**
 * @group Delivery
 *
 * This controller is used for the management of bills
 * Class DeliveryController
 * @package App\Api\V1\Controllers
 */
class DeliveryController extends Controller{
    /**
     * Start action, use to show all bills inside the database
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(){
        return RestHelper::get(Delivery::class);
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
    public function store(DeliveryRequest $request)
    {
        return RestHelper::store(Delivery::class,$request->all());
    }
    /**
     * Display the specified bill. given the ID
     *
     * @param  int  $id
     * @return \Illumi$addressnate\Http\JsonResponse
     */
    public function show($id)
    {
        return RestHelper::show(Delivery::class,$id);
    }
    /**
     * Show the form for editing the specified bill.
     *
     * @param  \App\Delivery  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Delivery $bill)
    {
        //
    }
    /**
     * Update the specified bill in database.
     *
     * @param DeliveryRequest $request
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(DeliveryRequest $request, $id)
    {
        return RestHelper::update(Delivery::class,$request->all(),$id);
    }
    /**
     * Remove the specified bill from database given his id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        return RestHelper::destroy(Delivery::class,$id);
    }
}