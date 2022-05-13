<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Tasks;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Monolog\Handler\PushoverHandler;

class ProjectController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        // $project = Project::where('description', 'LIKE' , '%'.$search_key.'%')
        // ->get();

        // $pending = Project::withCount([
        //     'tasks', 
        //     'tasks as pending_tasks' => function ($query) {
        //         $query->where('status_id', 'NOT', 3);
        //     }])
        //     ->get();

        //     dd($pending);

        $projects = [];
        foreach($user->projects as $project) {
            array_push($projects, $project);
        }

        

        return view("project.index", ['projects' => $projects]);
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

        $project_array = array(
            'successMessage' => "Project retrieved succesfuly",
            'projectId' => $project->id,
            'projectTitle' => $project->title,
            'projectDescription' => $project->description,
            'projectTasks' => count($project->projectTasks),
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
                'answer'=>false,
                'destroyMessage' => $project->title . " project can't be deleted. There are tasks."
            );

            $json_response = response()->json($error_array);
            return $json_response;

        } else {

            $project->delete();

            $success_array = array(
                'answer'=>true,
                'destroyMessage' => $project->title . " project deleted successfuly"
            );

            $json_response = response()->json($success_array);

            return $json_response;
        }
    }
}
