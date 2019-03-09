<?php

namespace App\Http\Controllers;

use App\Feature;
use App\FeatureCategory;
use App\JobCategory;
use Illuminate\Http\Request;

class FeatureController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getFeatures($job_category_id)
    {
        $jobCategory = JobCategory::findOrfail($job_category_id);
        $feature_category_ids = array();
        $feature_ids = array();
        $featureData = [];
        if(isset($jobCategory->feature_category_ids) && !empty( $jobCategory->feature_category_ids)){
            $feature_category_ids = explode(",",$jobCategory->feature_category_ids);
        }
        if(isset($jobCategory->feature_ids) && !empty( $jobCategory->feature_ids)){
            $feature_ids = explode(",",$jobCategory->feature_ids);
        }

        $featureCategories = FeatureCategory::whereIn('id',$feature_category_ids)->get();
        $features = Feature::whereIn('id',$feature_ids)->get();
   

  
        foreach($featureCategories as $featureCategory)
        {
            $featureCategory->features = $features->where('feature_category_id',$featureCategory->id);
        }

        return response()->json(['features'=>$featureCategories],200);
    }
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
     * @param  \App\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function show(Feature $feature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function edit(Feature $feature)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feature $feature)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feature $feature)
    {
        //
    }
}
