<?php

namespace App\Api\V1\Controllers;
use App\Patner;
use App\Api\V1\Requests\PatnerRequest;
use App\Helpers\RestHelper;
use App\Http\Controllers\Controller;

/**
 * @group Patner
 *
 * This controller is used for the management of bills
 * Class PatnerController
 * @package App\Api\V1\Controllers
 */
class PatnerController extends Controller{
    /**
     * Start action, use to show all bills inside the database
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(){
        return RestHelper::get(Patner::class);
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
    public function store(PatnerRequest $request)
    {
        return RestHelper::store(Patner::class,$request->all());
    }
    /**
     * Display the specified bill. given the ID
     *
     * @param  int  $id
     * @return \Illumi$addressnate\Http\JsonResponse
     */
    public function show($id)
    {
        return RestHelper::show(Patner::class,$id);
    }
    /**
     * Show the form for editing the specified bill.
     *
     * @param  \App\Patner  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Patner $bill)
    {
        //
    }
    /**
     * Update the specified bill in database.
     *
     * @param PatnerRequest $request
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(PatnerRequest $request, $id)
    {
        return RestHelper::update(Patner::class,$request->all(),$id);
    }
    /**
     * Remove the specified bill from database given his id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        return RestHelper::destroy(Patner::class,$id);
    }
}