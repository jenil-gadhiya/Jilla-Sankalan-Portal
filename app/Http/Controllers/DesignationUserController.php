<?php

namespace App\Http\Controllers;

use App\Models\DesignationUser;
use App\Http\Requests\StoreDesignationUserRequest;
use App\Http\Requests\UpdateDesignationUserRequest;

class DesignationUserController extends Controller
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
     * @param  \App\Http\Requests\StoreDesignationUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDesignationUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DesignationUser  $designationUser
     * @return \Illuminate\Http\Response
     */
    public function show(DesignationUser $designationUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DesignationUser  $designationUser
     * @return \Illuminate\Http\Response
     */
    public function edit(DesignationUser $designationUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDesignationUserRequest  $request
     * @param  \App\Models\DesignationUser  $designationUser
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDesignationUserRequest $request, DesignationUser $designationUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DesignationUser  $designationUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(DesignationUser $designationUser)
    {
        //
    }
}
