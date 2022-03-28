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
        
        $editRoutine = Routine::find($id);
        
        $editRoutine->update($request->all());
        $routine = Routine::where('id', $id)->get();
        return $routine;

        // return 'Hello World: Edit Routine';
    }
    public function deleteRoutine(Request $request,$id) {
        $validated = $request->validate([
            'name' => 'filled|string',
            'description' => 'filled|string|max:255',
        ]);
        
        $deleteRoutine = Routine::findorFail($id);
        
        $deleteRoutine->delete($request->all());
        $routine = Routine::where('id', $id)->get();
        return $routine;
    }
    public function getRoutineById(Request $request, $id) {
        $getRoutineById = Routine::find($id);
        
        // $routine = Routine::where('id', $id)->get();
        return $getRoutineById;
        // return 'Hello World: Get By ID';
    }
    public function getAllRoutine(Request $request) {
        $getAllRoutine = Routine::select('id', 'name','description')->get();
        return $getAllRoutine;
    }

    public function searchRoutine(Request $request, $name) {
        $searchRoutine = Routine::select('id', 'name','description')->whereRaw("name LIKE '%$name%'")->get();
        return $searchRoutine;
    }
}
