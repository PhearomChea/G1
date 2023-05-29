<?php

namespace App\Http\Controllers;

use App\Models\{Instruction,Drone};
use Illuminate\Http\Request;
use App\Http\Resources\InstructionResource;
use Illuminate\Support\Facades\Validator;

class InstructionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instruction = Instruction::all();
        $instruction = InstructionResource::collection($instruction);
        return response()->json(['Message' => 'Here is all the instructions', 'Instruction' => $instruction], 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'speed' => 'required|string',
            'height' => 'required|string',
            'drone_running'=>'required|boolean',
            'plan_id' => 'required',
            'drone_id' => 'required',
        ]);
        if($validator->fails()) {
            return $validator->errors();
        }
        $instruction = Instruction::create($validator->validated());
        $instruction = new InstructionResource($instruction);
        return response()->json(['Message' => 'Instruction successfully created!', 'Instruction' => $instruction], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $instruction = Instruction::find($id);
        $instruction = new InstructionResource($instruction);
        return response()->json(['Message' => 'Here is the instruction', 'Instruction' => $instruction], 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $drone = Drone::where('drone_id', $id)->first();
        $drone_id = $drone->id;
        $instruction = Instruction::where('drone_id', $drone_id)->first();
        $instruction->update($request->all());
        $instruction = new InstructionResource($instruction);
        return response()->json(['Message' => 'Drone '.$id.' is running.', 'Instruction' => $instruction], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $instruction = Instruction::find($id);
        $instruction->delete();
        return response()->json(['Message' => 'instruction successfully deleted!'], 200);
    }
}
