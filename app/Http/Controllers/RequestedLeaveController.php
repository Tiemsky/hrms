<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequestedLeaveRequest;
use App\Http\Requests\UpdateRequestedLeaveRequest;
use App\Models\RequestedLeave;

class RequestedLeaveController extends Controller
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
     * @param  \App\Http\Requests\StoreRequestedLeaveRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequestedLeaveRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RequestedLeave  $requestedLeave
     * @return \Illuminate\Http\Response
     */
    public function show(RequestedLeave $requestedLeave)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RequestedLeave  $requestedLeave
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestedLeave $requestedLeave)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRequestedLeaveRequest  $request
     * @param  \App\Models\RequestedLeave  $requestedLeave
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequestedLeaveRequest $request, RequestedLeave $requestedLeave)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RequestedLeave  $requestedLeave
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestedLeave $requestedLeave)
    {
        //
    }
}
