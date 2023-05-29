<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Resources\PlaneResource;
use Illuminate\Support\Facades\Validator;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plan = Plan::all();
        $plan = PlaneResource::collection($plan);
        return response()->json(['Message' => 'Here is all the plans', 'Plan' => $plan], 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'plan_name' => 'required|string|max:255',
            'date_time' => 'required|string|max:255',
            'user_id' => 'required|integer',
            'farm_id' => 'required|integer',
        ]);
        if($validator->fails()) {
            return $validator->errors();
        }
        $plan = Plan::create($validator->validated());
        $plan = new PlaneResource($plan);
        return response()->json(['Message' => 'Plan successfully created!', 'Plan' => $plan], 200);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $plan = Plan::find($id);
        $plan = new PlaneResource($plan);
        return response()->json(['Message' => 'Here is the plan', 'Plan' => $plan], 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $plan = Plan::find($id);
        $plan->update($request->all());
        return response()->json(['Message' => 'Plan successfully updated', 'Plan' => $plan], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $plan = Plan::find($id);
        $plan->delete();
        return response()->json(['Message' => 'Plan successfully deleted!'], 200);
    }

    public function getSpecifictPlan($name) {
        $plan = Plan::where('plan_name', $name)->first();
        $plan = new PlaneResource($plan);
        return response()->json(['Message' => 'Plan successfully updated', 'Plan' => $plan], 200);
    }
}
