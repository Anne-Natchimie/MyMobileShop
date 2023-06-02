<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Todolist;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $tasks = Todolist::all(); 
        return response()->json($tasks); 

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $this->validate($request, [
            'task' => 'required|max:100',
            // 'state' => 'required'
        ]);

        $task = Todolist::create([
            'task' => $request->task,
            'state' => 0,
        ]);

        return response()->json($task, 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Todolist $task)
    {
        //
        return response()->json($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todolist $task)
    {
        //
        $this->validate($request, [
            'task' => 'required|max:100',
            // 'state' => 'required',
        ]);

        $task->update([
            'task' => $request->task,
            'state' => 0,
        ]);

        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todolist $task)
    {
        //
        // On supprime l'utilisateur
        $task->delete();

        // On retourne la réponse JSON
        return response()->json();
    }
}
