<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Routine;


class RoutineController extends Controller
{
    public function addRoutine(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'filled|string|max:255',
        ]);
        $addRoutine = new Routine($request->all());
        $addRoutine->save();
        $routine = Routine::where('id', $addRoutine->id)->get();
        return $routine;
        
        
    }
    public function editRoutine(Request $request, $id) {
        $validated = $request->validate([
            'name' => 'filled|string',
            'description' => 'filled|string|max:255',
        ]);
        
        $editRoutine = Routine::findorFail($id);
        
        $editRoutine->update($request->all());
        $routine = Routine::where('id', $id)->get();
        return $routine;

        // return 'Hello World: Edit Routine';
    }
    public function deleteRoutine(Request $request,$id) {
        return 'Hello World: Delete Routine';
    }
    public function getRoutineById(Request $request, $id) {
        return $id;
        // return 'Hello World: Get By ID';
    }
    public function getAllRoutine(Request $request) {
        return 'Hello World: Get ALL';
    }
}
