<?php

namespace App\Http\Controllers;

use App\Models\HomePageSection;
use App\Http\Requests\StoreHomePageSectionRequest;
use App\Http\Requests\UpdateHomePageSectionRequest;

class HomePageSectionController extends Controller
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
     * @param  \App\Http\Requests\StoreHomePageSectionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHomePageSectionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomePageSection  $homePageSection
     * @return \Illuminate\Http\Response
     */
    public function show(HomePageSection $homePageSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomePageSection  $homePageSection
     * @return \Illuminate\Http\Response
     */
    public function edit(HomePageSection $homePageSection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHomePageSectionRequest  $request
     * @param  \App\Models\HomePageSection  $homePageSection
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHomePageSectionRequest $request, HomePageSection $homePageSection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomePageSection  $homePageSection
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomePageSection $homePageSection)
    {
        //
    }
}
