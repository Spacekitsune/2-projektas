<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use App\Models\Task;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Monolog\Handler\PushoverHandler;
use App\Exports\ProjectExport;
use Excel;

class ProjectController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $projects = $user->projects;

        $pending_projects = 0;
        $completed_projects = 0;


        foreach ($projects as $project) {
            $pending_tasks = 0;
            if ($project->status_id != 3) {
                $pending_projects++;
            } else {
                $completed_projects++;
            }
            if (count($project->projectTasks) == 0) {
                $project->pending_tasks = 0;
            }
            foreach ($project->projectTasks as $task) {
                if ($task->status_id != 3) {
                    $pending_tasks++;
                }
                $project->pending_tasks = $pending_tasks;
            }
        }

        return view("project.index", ['projects' => $projects, 'pending_projects' => $pending_projects, 'completed_projects' => $completed_projects]);
    }

    //     return view("project.index", ['projects' => $projects]);
    // }

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
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Kuriamas naujas objektas iš Request reikšmių, siuntimui į db
        $user = Auth::user();
        // $users=[$user];
        // $project=Project::create($request->all);
        $project = new Project;
        $project->title = $request->project_title;
        $project->description = $request->project_description;
        $project->status_id = 1;
        $project->save();
        $project->users()->attach($user);
        // $project->users()->attach($request->project_user);
        if (!empty($request->project_user)) {
            $users = User::all();
            foreach ($request->project_user as $project_user) {
                foreach ($users as $user) {
                    if ($user->email == $project_user) {
                        $project->users()->attach($user->id);
                    }
                }
            }
        }

        //Kuriamas naujas asociatyvinis masyvas su $article objekto reikšmėmis + success žinutė
        $project_array = array(
            'successMessage' => "Project was stored succesfuly",
            'projectId' => $project->id,
            'projectTitle' => $project->title,
            'projectDescription' => $project->description,
            'projectStatus' => 'To do',
            'projectTasks' => 0,
            'projectPending' => 0,
        );

        //Asociatyvinis masyvas paverčiamas į json
        $json_response = response()->json($project_array);

        // gražinama sukurta json reikšmė
        return $json_response;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('project.show', ['project' => $project]);
    }


    public function showAjax(Project $project)
    {


        $project_users = [];
        foreach ($project->users as $user) {
            // array_push($project_users, $user->name);
            $project_users += array($user->email => $user->name);
        }

        $project_array = array(
            'successMessage' => "Project retrieved succesfuly",
            'projectId' => $project->id,
            'projectTitle' => $project->title,
            'projectDescription' => $project->description,
            'projectTasks' => count($project->projectTasks),
            'projectUsers' => $project_users
        );

        $json_response = response()->json($project_array);

        return $json_response;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {

        $project->title = $request->project_title;
        $project->description = $request->project_description;
        $project->save();

        if (count($request->project_user) != 0) {
            $users = User::all();
            foreach ($request->project_user as $project_user) {
                foreach ($users as $user) {
                    if ($user->email == $project_user) {
                        $project->users()->attach($user->id);
                    }
                }
            }
        }

        $project_array = array(
            'successMessage' => "Project updated succesfuly",
            'projectId' => $project->id,
            'projectTitle' => $project->title,
            'projectDescription' => $project->description,
        );

        $json_response = response()->json($project_array);

        return $json_response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {

        $tasks = $project->projectTasks;

        if (count($tasks) != 0) {

            $error_array = array(
                'answer' => false,
                'destroyMessage' => $project->title . " project can't be deleted. Project has assigned tasks. Delete anyway?"
            );

            $json_response = response()->json($error_array);
            return $json_response;
        } else {

            $project->delete();
            $project->users()->detach($project->id);
            // Report::destroy($report_id);

            // ReportMessages::where('report_id', $report_id)->delete();

            $success_array = array(
                'answer' => true,
                'destroyMessage' => $project->title . " project deleted successfuly"
            );

            $json_response = response()->json($success_array);

            return $json_response;
        }
    }

    public function destroyWithTasks(Project $project)
    {
        $tasks=Task::all();
        foreach($tasks as $task) {
            if ($project->id==$task->project_id) {
                $task->delete();
            }
        }
        $project->delete();
        $project->users()->detach($project->id);
    }


    public function search(Request $request)
    {

        $search_key = $request->search_key;

        $user = Auth::user();



        $projects = $user->projects::where('title', 'LIKE', '%' . $search_key . '%')
            ->orWhere('description', 'LIKE', '%' . $search_key . '%')
            ->get();


        return view('project.search', ['projects' => $projects]);
    }

    
}
