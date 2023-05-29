<?php

namespace App\Http\Controllers;

use App\Models\{Drone,Location};
use App\Http\Resources\{DroneResource,LocationResource};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DroneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drone = Drone::all();
        $drone = DroneResource::collection($drone);
        return response()->json(['Message' => 'Here is all the drones', 'Drone' => $drone], 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'drone_id' => 'required|string',
            'type_of_drone' => 'required|string',
            'battery' => 'required',
            'payload_capacity' => 'required',
        ]);
        if($validator->fails()) {
            return $validator->errors();
        }
        $drone = Drone::create($request->all());
        return response()->json(['Message' => 'drone successfully created!', 'Drone' => $drone], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $drone = Drone::find($id);
        $drone = new DroneResource($drone);
        return response()->json(['Message' => 'Here is the drone', 'Drone' => $drone], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $drone = drone::find($id);
        $drone->update($request->all());
        return response()->json(['Message' => 'Drone successfully updated', 'Drone' => $drone], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $drone = Drone::find($id);
        $drone->delete();
        return response()->json(['Message' => 'Drone successfully deleted!'], 200);
    }
    /**
     * get location the specified resource from storage.
     */
    public function getLocationByDroneId($id)
    {
        $drone = Drone::where('drone_id', $id)->first();
        if($drone != null){
            $location_id = $drone->location_id;
            $location = Location::find($location_id);
            $location = new LocationResource($location);
            return response()->json(['Message' => 'Here is the drone', 'Drone' => $location], 200);
        }else{
            return response()->json(['Message' => 'No location of drone id '.$id, 'request' => false], 500);
        }
    }
    public function droneInfo($id)
    {
        $droneInfo = Drone::where('drone_id', $id)->first();
        if($droneInfo != null){
            $droneInfo = new DroneResource($droneInfo);
            return response()->json(['Message' => 'Here is the drone', 'Drone' => $droneInfo], 200);
        }else{
            return response()->json(['Message' => 'No drone with drone id '.$id, 'request' => false], 500);   
        }
    }
    public function updateByDroneId(Request $request,  $code)
    {
        $drone = Drone::where('drone_id', $code);
        $drone->update($request->all());
        return response()->json(['Message' => 'Drone successfully updated'], 200);
    }
}
