<?php

namespace App\Api\V1\Controllers;
use App\Category;
use App\Api\V1\Requests\CategoryRequest;
use App\Helpers\RestHelper;
use App\Http\Controllers\Controller;

/**
 * @group Category
 *
 * This controller is used for the management of bills
 * Class CategoryController
 * @package App\Api\V1\Controllers
 */
class CategoryController extends Controller{
    /**
     * Start action, use to show all bills inside the database
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(){
        return RestHelper::get(Category::class);
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
    public function store(CategoryRequest $request)
    {
        return RestHelper::store(Category::class,$request->all());
    }
    /**
     * Display the specified bill. given the ID
     *
     * @param  int  $id
     * @return \Illumi$addressnate\Http\JsonResponse
     */
    public function show($id)
    {
        return RestHelper::show(Category::class,$id);
    }
    /**
     * Show the form for editing the specified bill.
     *
     * @param  \App\Category  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $bill)
    {
        //
    }
    /**
     * Update the specified bill in database.
     *
     * @param CategoryRequest $request
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CategoryRequest $request, $id)
    {
        return RestHelper::update(Category::class,$request->all(),$id);
    }
    /**
     * Remove the specified bill from database given his id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        return RestHelper::destroy(Category::class,$id);
    }
}