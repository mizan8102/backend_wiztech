<?php

namespace App\Http\Controllers\DynamicForm;

use App\Enums\HttpStatusCodeEnum;
use App\Http\Api\ApiResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\DynamicForm\DynamicFormInterface;
use App\Http\Requests\DynmicFormRequest;

class DynamicFormController extends Controller
{

    private $dynamicFormInterface;
    use ApiResponseTrait;

    // inject 
    public function __construct(DynamicFormInterface $dynamicFormInterface){
        $this->dynamicFormInterface = $dynamicFormInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $res= $this->dynamicFormInterface->index();
        if ($res) {
            return $this->successResponse($res, "Data retrive successfull", HttpStatusCodeEnum::OK);
        } else {
            return $this->errorResponse('Failed to retrive', HttpStatusCodeEnum::BAD_REQUEST);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DynmicFormRequest $dynmicFormRequest)
    {
        $data   = $dynmicFormRequest->validated();
        $res    = $this->dynamicFormInterface->store($data);
        if ($res) {
            return $this->successResponse($res, "save successfull",HttpStatusCodeEnum::CREATED);
        } else {
            return $this->errorResponse($res, HttpStatusCodeEnum::BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $res= $this->dynamicFormInterface->show($id);
        if ($res) {
            return $this->successResponse($res, "Data retrive successfull", HttpStatusCodeEnum::OK);
        } else {
            return $this->errorResponse('Failed to retrive', HttpStatusCodeEnum::BAD_REQUEST);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DynmicFormRequest $dynmicFormRequest, string $id)
    {
        $data = $dynmicFormRequest->validated();
        $res  = $this->dynamicFormInterface->update($data, $id);
        if ($res) {
            return $this->successResponse($res, "updated successfull",HttpStatusCodeEnum::CREATED);
        } else {
            return $this->errorResponse($res, HttpStatusCodeEnum::BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $res  = $this->dynamicFormInterface->destroy( $id);
        if ($res) {
            return $this->successResponse($res, "deleted successfull",HttpStatusCodeEnum::CREATED);
        } else {
            return $this->errorResponse($res, HttpStatusCodeEnum::BAD_REQUEST);
        }
    }
}
