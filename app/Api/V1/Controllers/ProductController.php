<?php

namespace App\Api\V1\Controllers;
use App\Product;
use App\Api\V1\Requests\ProductRequest;
use App\Helpers\RestHelper;
use App\Http\Controllers\Controller;

/**
 * @group Product
 *
 * This controller is used for the management of bills
 * Class ProductController
 * @package App\Api\V1\Controllers
 */
class ProductController extends Controller{
    /**
     * Start action, use to show all bills inside the database
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(){
        return RestHelper::get(Product::class);
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
    public function store(ProductRequest $request)
    {
        return RestHelper::store(Product::class,$request->all());
    }
    /**
     * Display the specified bill. given the ID
     *
     * @param  int  $id
     * @return \Illumi$addressnate\Http\JsonResponse
     */
    public function show($id)
    {
        return RestHelper::show(Product::class,$id);
    }
    /**
     * Show the form for editing the specified bill.
     *
     * @param  \App\Product  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $bill)
    {
        //
    }
    /**
     * Update the specified bill in database.
     *
     * @param ProductRequest $request
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ProductRequest $request, $id)
    {
        return RestHelper::update(Product::class,$request->all(),$id);
    }
    /**
     * Remove the specified bill from database given his id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        return RestHelper::destroy(Product::class,$id);
    }
}