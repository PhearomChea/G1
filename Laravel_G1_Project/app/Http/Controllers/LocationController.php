<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Http\Resources\LocationResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $location = Location::all();
        $location = LocationResource::collection($location);
        return response()->json(['Message' => 'Here is all the locations', 'Location' => $location], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'latitude' => 'required',
            'longitude' => 'required',
        ]);
        if($validator->fails()) {
            return $validator->errors();
        }
        $location = Location::create($validator->validated());
        return response()->json(['Message' => 'Location successfully created', 'Location' => $location], 200);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $location = Location::find($id);
        $location = new LocationResource($location);
        return response()->json(['Message' => 'Here is the location', 'Location' => $location], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $location = Location::find($id);
        $location->update($request->all());
        $location = new LocationResource($location);
        return response()->json(['Message' => 'location successfully updated', 'Location' => $location], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $location = Location::find($id);
        $location->delete();
        return response()->json(['Message' => 'Location successfully deleted!'], 200);
    }
}
