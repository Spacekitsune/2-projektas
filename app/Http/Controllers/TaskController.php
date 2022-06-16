<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Http\Request;
use App\Models\User;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = User::all();
               
        $task = new Task;

        $task->title = $request->task_title;
        $task->description = $request->task_description;
        $task->project_id = $request->project_id;


        foreach ($users as $user){
        if ($user->email == $request->task_user) {
            $task->user_id = $user->id;
            $task_user_name=$user->name;
        }
    }
        
        $task->status_id = $request->task_status;
        $task->priority_id = $request->task_priority;
        $task->save();

        $project_array = array(
            'successMessage' => "Task was stored succesfuly",
            'taskId' => $task->id,
            'taskTitle' => $task->title,
            'taskDescription' => $task->description,
            'taskProjectId' => $task->project_id,
            'taskUser' => $task_user_name,
            'taskStatus' => $task->status_id,
            'taskPriority' => $task->priority_id,
            'taskCreated' => date_format($task->created_at,"Y-m-d H:i:s"),            
            'taskUpdated' => date_format($task->updated_at,"Y-m-d H:i:s"),
        );
        
        $json_response = response()->json($project_array);

        return $json_response;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTaskRequest  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
            $task->delete();
            $success_array = array(
                'destroyMessage' => $task->title . " project deleted successfuly"
            );

            $json_response = response()->json($success_array);

            return $json_response;
        }
    
}
