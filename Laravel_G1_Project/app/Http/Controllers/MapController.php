<?php

namespace App\Http\Controllers;

use App\Models\{Map,Province,Farm};
use Illuminate\Http\Request;
use App\Http\Resources\MapResource;
use Illuminate\Support\Facades\Validator;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $map = Map::all();
        $map = MapResource::collection($map);
        return response()->json(['Message' => 'Here is all the maps', 'map' => $map], 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMapRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required',
            'drone_id' => 'required',
            'farm_id' => 'required',
        ]);
        if($validator->fails()) {
            return $validator->errors();
        }
        $map = Map::create($validator->validated());
        return response()->json(['Message' => 'map successfully created', 'Map' => $map], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $map = Map::find($id);
        $map = new MapResource($map);
        return response()->json(['Message' => 'Here is the map', 'map' => $map], 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Map $id)
    {
        $map = Map::find($id);
        $map->update($request->all());
        return response()->json(['Message' => 'Drone successfully updated', 'Drone' => $map], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Map $id)
    {
        $map = Map::find($id);
        $map->delete();
        return response()->json(['Message' => 'map successfully deleted!'], 200);
    }

    public function dowloadImage($provice, $id){
        $province = Province::where('province', $provice)->first();
        if($province != null){
            $province_id = $province->id;
            $farm = Farm::where('id', $id)->where('province_id', $province_id)->first();
            if($farm != null){
                $farm_id = $farm->id;
                $map = Map::where('farm_id',$farm_id)->first();
                $map = new MapResource($map);
                return response()->json(['Message' => 'This is your request image farm', 'Image' => $map], 200);
            }
            else{
                return response()->json(['Message' => 'Your farm id not correct.','data'=>false], 400);
            }
        }
        else{
            return response()->json(['Message' => 'Province not correct.','data'=>false], 400);
        }
    }
    public function deleteImage($provice,$id){
        $province = Province::where('province', $provice)->first();
        if($province != null){
            $province_id = $province->id;
            $farm = Farm::where('id', $id)->where('province_id', $province_id)->first();
            if($farm != null){
                $farm_id = $farm->farm_id;
                $map = Map::where('farm_id',$farm_id)->delete();
                return response()->json(['Message' => 'Delete success'], 200);
            }
            else{
                return response()->json(['Message' => 'Your farm not correct.','data'=>false], 400);
            }
        }
        else{
            return response()->json(['Message' => 'Province not correct.','data'=>false], 400);
        }
    }
    public function addNewMap(Request $request, $pro,$id){
        $province_id = Farm::find($id)->province_id;
        if ($province_id != null){
            $province_name = Province::find($province_id)->province;
            if($province_name == $pro){
                $validator = Validator::make($request->all(), [
                    'image' => 'required',
                    'drone_id' => 'required',
                ]);
                if($validator->fails()) {
                    return $validator->errors();
                }
                Map::insert([
                    'image' => $request->image,
                    'drone_id' => $request->drone_id,
                    'farm_id' => $id,
                ]);
                $map = Map::where('image',$request->image)->first();
                $map = new MapResource($map);
                return response()->json(['Message' => 'map successfully created','data'=>$map], 200);
            }else{
                return response()->json(['Message' => 'Province not match with plane Id.','data'=>false], 400);
            }
        }
        else{
            return response()->json(['Message' => 'Cannot find farm','data'=>false], 400);

        }
    }
}
