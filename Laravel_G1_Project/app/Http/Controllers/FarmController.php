<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use Illuminate\Http\Request;
use App\Http\Resources\FarmResource;
use Illuminate\Support\Facades\Validator;

class FarmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $farm = Farm::all();
        $farm = FarmResource::collection($farm);
        return response()->json(['Message' => 'Here is all the farms!', 'Farm' => $farm], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'area' => 'required|string|max:255',
            'farmer_id' => 'required',
            'province_id' => 'required'
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $farm = Farm::create($validator->validated());
        return response()->json(['message' => 'Successfully created!', 'Farm' => $farm], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $farm = Farm::find($id);
        $farm = new FarmResource($farm);
        return response()->json(['Message' => 'Here is the farm!', 'Farm' => $farm], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $farm = Farm::find($id);
        $farm->update($request->all());
        $farm = new FarmResource($farm);
        return response()->json(['Message' => 'Farm successfully updated!', 'Farm' => $farm], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Farm $id)
    {
        $farm = Farm::find($id);
        $farm->delete();
        return response()->json(['Message' => 'Farm successfully deleted!'], 200);
    }
}
