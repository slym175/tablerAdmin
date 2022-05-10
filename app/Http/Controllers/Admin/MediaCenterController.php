<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MediaCenter;
use Illuminate\Http\Request;

class MediaCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.media_center.index');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MediaCenter  $mediaCenter
     * @return \Illuminate\Http\Response
     */
    public function show(MediaCenter $mediaCenter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MediaCenter  $mediaCenter
     * @return \Illuminate\Http\Response
     */
    public function edit(MediaCenter $mediaCenter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MediaCenter  $mediaCenter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MediaCenter $mediaCenter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MediaCenter  $mediaCenter
     * @return \Illuminate\Http\Response
     */
    public function destroy(MediaCenter $mediaCenter)
    {
        //
    }
}
