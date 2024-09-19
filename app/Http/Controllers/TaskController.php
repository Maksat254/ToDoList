<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Notifications\TaskAssignedNotification;
use Illuminate\Http\Request;
use Inertia\Inertia;
use function Termwind\render;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return response()->json($tasks);
    }


    public function create()
    {
        $users = User::all();
        return Inertia::render('Task/AddTask', [
            'users'=>$users
        ]);

    }

    public function store(Request $request)
    {
        $validatedData = $request ->validate([
           'title'=>'required|string',
           'description'=>'required|string',
           'priority'=>'required',
           'status'=>'required',
           'start_date'=>'required|date',
           'end_date'=>'required|date',
           'user_id'=>'required|exists:users,id',
        ]);

        $task = Task::create($validatedData);

        return response()->json(['message' => 'Task added successfully!', 'task' => $task], 201);


    }


    public function showTaskForUser()
    {
        $user = auth()->user();
        $task = Task::where('user_id',$user->id)->get();
        $notifications = $user->notifications;

        return inertia('Task/AddTask');
    }
}
