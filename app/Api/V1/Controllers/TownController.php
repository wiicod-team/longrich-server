<?php

namespace App\Api\V1\Controllers;
use App\Town;
use App\Api\V1\Requests\TownRequest;
use App\Helpers\RestHelper;
use App\Http\Controllers\Controller;

/**
 * @group Town
 *
 * This controller is used for the management of bills
 * Class TownController
 * @package App\Api\V1\Controllers
 */
class TownController extends Controller{
    /**
     * Start action, use to show all bills inside the database
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(){
        return RestHelper::get(Town::class);
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
    public function store(TownRequest $request)
    {
        return RestHelper::store(Town::class,$request->all());
    }
    /**
     * Display the specified bill. given the ID
     *
     * @param  int  $id
     * @return \Illumi$addressnate\Http\JsonResponse
     */
    public function show($id)
    {
        return RestHelper::show(Town::class,$id);
    }
    /**
     * Show the form for editing the specified bill.
     *
     * @param  \App\Town  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Town $bill)
    {
        //
    }
    /**
     * Update the specified bill in database.
     *
     * @param TownRequest $request
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(TownRequest $request, $id)
    {
        return RestHelper::update(Town::class,$request->all(),$id);
    }
    /**
     * Remove the specified bill from database given his id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        return RestHelper::destroy(Town::class,$id);
    }
}