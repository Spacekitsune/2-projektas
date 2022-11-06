<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\ProjectUser;
use App\Models\Project;
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
            $task_user_name = $user->name;
        }    }
        
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

        $projects = Project::where('id',  $task->project_id)->get();

        $all_tasks = Task::where('project_id',  $task->project_id)->get();

        $todo_tasks=$all_tasks->where('status_id', 1)->count();
        $in_progress_tasks=$all_tasks->where('status_id', 2)->count();
        $done_tasks=$all_tasks->where('status_id', 3)->count();

        foreach ($projects as $project) {
            if (count($all_tasks)==0) {
                $project->status_id = 1;
                $project->save();
            } else if ($todo_tasks!=0 || $in_progress_tasks!=0) {
                $project->status_id = 2;
                $project->save();
            } else if (count($all_tasks)==$done_tasks) {
                $project->status_id = 3;
                $project->save();
            }
        }
        
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

    public function showAjax(Task $task)
    {
        $users_in_project=ProjectUser::where('project_id', $task->project_id )->get('user_id');
        $users = User::all();
        $project_users = [];
        foreach ($users_in_project as $value) {
            foreach ($users as $user) {
                if ($value->user_id == $user->id) {
            $project_users += array($user->id => $user->name);
                }
            }
        }

        $task_array = array(
            'successMessage' => "Task retrieved succesfuly",
            'taskId' => $task->id,
            'taskTitle' => $task->title,
            'taskDescription' => $task->description,
            'taskProject' => $task->project_id,
            'taskUserName' => $task->taskUser->name,
            'taskUserId' => $task->taskUser->id,
            'taskStatus' => $task->taskStatus->title,
            'taskPriority' => $task->taskPriority->title,   
            'projectUsers' => $project_users        
        );
        $json_response = response()->json($task_array);
        return $json_response;
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
    public function update(Request $request, Task $task)
    {
        $task->title = $request->task_title;
        $task->description = $request->task_description; 
        $task->user_id = $request->task_user;
        $task->status_id = $request->task_status;
        $task->priority_id = $request->task_priority;       
        $task->save();
              

        $project_array = array(
            'successMessage' => "Task updated succesfuly",
            'taskId' => $task->id,
            'taskTitle' => $task->title,
            'taskDescription' => $task->description,
            'taskProjectId' => $task->project_id,
            'taskUser' => $task->taskUser->name,
            'taskStatus' => $task->status_id,
            'taskPriority' => $task->priority_id,
        );

        $json_response = response()->json($project_array);

        $projects = Project::where('id',  $task->project_id)->get();

        $all_tasks = Task::where('project_id',  $task->project_id)->get();

        $todo_tasks=$all_tasks->where('status_id', 1)->count();
        $in_progress_tasks=$all_tasks->where('status_id', 2)->count();
        $done_tasks=$all_tasks->where('status_id', 3)->count();

        foreach ($projects as $project) {
            if (count($all_tasks)==0) {
                $project->status_id = 1;
                $project->save();
            } else if ($todo_tasks!=0 || $in_progress_tasks!=0) {
                $project->status_id = 2;
                $project->save();
            } else if (count($all_tasks)==$done_tasks) {
                $project->status_id = 3;
                $project->save();
            }
        }

        return $json_response;
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

            $projects = Project::where('id',  $task->project_id)->get();

            $all_tasks = Task::where('project_id',  $task->project_id)->get();
    
            $todo_tasks=$all_tasks->where('status_id', 1)->count();
            $in_progress_tasks=$all_tasks->where('status_id', 2)->count();
            $done_tasks=$all_tasks->where('status_id', 3)->count();
    
            foreach ($projects as $project) {
                if (count($all_tasks)==0) {
                    $project->status_id = 1;
                    $project->save();
                } else if ($todo_tasks!=0 || $in_progress_tasks!=0) {
                    $project->status_id = 2;
                    $project->save();
                } else if (count($all_tasks)==$done_tasks) {
                    $project->status_id = 3;
                    $project->save();
                }
            }

            return $json_response;
        }
    
}
