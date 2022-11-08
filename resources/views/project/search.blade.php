@extends('layouts.app')

@section('content')

<script src="{{url('js/project.js')}}" defer></script>

<div class="container">

    <div class="row my-2" style="min-height: 100px;">
        <div class="col-sm-3">
            <a href="{{route('project.index')}}">
                <div class="card ">
                    <div class="card-body" style="display: flex; justify-content: center; align-items: center">
                        <img src="{{ asset('logo/proact-logo.png') }}" alt="logo" class="img-fluid" style="height: 80px" />
                    </div>
                </div>
            </a>
        </div>

        <div class="col-sm-3">
            <a href="{{route('project.index')}}">
                <div class="card px-2">
                    <div class="card-body">
                        <div class="container-fluid px-0 my-2" style="display: flex; justify-content: space-between; align-items: center">
                            <h3 class="m-0 p-0">{{$total_projects}}</h3>
                            <i class="fa fa-archive fs-4" aria-hidden="true"></i>
                        </div>
                        <h5 class="card-title">Total projects</h5>
                        <div class="container-fluid bg-info" style="height: 3px;"></div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-3">
            <a href="{{route('project.search')}}?search_key=done">
                <div class="card">
                    <div class="card-body">
                        <div class="container-fluid px-0 my-2" style="display: flex; justify-content: space-between; align-items: center">
                            <h3 class="m-0 p-0">{{$completed_projects}}</h3>
                            <i class="fa fa-check fs-4" aria-hidden="true"></i>
                        </div>
                        <h5 class="card-title">Completed projects</h5>
                        <div class="container-fluid bg-info" style="height: 3px;"></div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-3">
            <a href="{{route('project.search')}}?search_key=pending">
                <div class="card">
                    <div class="card-body">
                        <div class="container-fluid px-0 my-2" style="display: flex; justify-content: space-between; align-items: center">
                            <h3 class="m-0 p-0">{{$pending_projects}}</h3>
                            <i class="fa fa-file-text fs-4" aria-hidden="true"></i>
                        </div>
                        <h5 class="card-title">Pending projects</h5>
                        <div class="container-fluid bg-info" style="height: 3px;"></div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <h1>Project list</h1>

    <div id="alert" class="alert d-none mt-2">
    </div>

    <div class="container-fluid px-0" style="display: flex; justify-content: space-between">

        <div class="container mt-2 px-0">            
            <button type="button" class="btn btn-success " data-bs-toggle="modal" data-bs-target="#createProjectModal">
                <i class="fa fa-plus" aria-hidden="true"></i>
                Add project
            </button>
        </div>

        <div class="mb-3" style="width: 30%">
            <form action="{{route('project.search')}}" method="GET" class="d-inline" style="width: 100%">
                <!-- @csrf -->
                <div class="input-group">
                    <input type="text" class="form-control" name="search_key" placeholder="Search.." aria-describedby="button-addon2">
                    <span class="input-group-btn">
                        <button class="btn btn-primary d-inline" id="button-addon2">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </span>
                </div>
            </form>
        </div>

    </div>

    <table id="projects-table" class="table table-striped mt-2">

        <tr>
            <th>Id</th>
            <th>Project title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Tasks</th>
            <th>Pending</th>
            <th>Actions</th>
        </tr>

        @if (count($projects)== 0)

        <p>No projects were found</p>

        @endif

        @foreach ($projects as $project)
        <tr class="project{{$project->id}}">
            <td class="col-project-id">{{$project->id}}</td>
            <td class="col-project-title">
                <a href="{{route('project.show', [$project])}}">
                    {{$project->title}}
                </a>
            </td>
            <td class="col-project-description" style="width: 40%">{{$project->description}}</td>
            <td class="col-project-statusProject">{{$project->statusProject->title}}</td>
            <td class="col-project-projectTasks count-tasks">{{count($project->projectTasks)}}</td>
            <td>{{$project->pending_tasks}}</td>
            <td>
                <button type="button" class="btn btn-primary show-project" data-bs-toggle="modal" data-bs-target="#showProjectModal" data-projectid="{{$project->id}}" title="Quick view project">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </button>
                <button type="button" class="btn btn-success edit-project" data-bs-toggle="modal" data-bs-target="#editProjectModal" data-projectid="{{$project->id}}" title="Edit project">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                </button>
                <button type="submit" class="btn btn-danger delete-project" data-projectid="{{$project->id}}" title="Delete project">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                </button>
            </td>
        </tr>
        @endforeach
    </table>

    <table class="template d-none">
        <tr>
            <td class="col-project-id"></td>
            <td class="col-project-title"></td>
            <td class="col-project-description"></td>
            <td class="col-project-status"></td>
            <td class="col-project-tasks"></td>
            <td class="col-project-pending"></td>
            <td>
                <button type="button" class="btn btn-primary show-project" data-bs-toggle="modal" data-bs-target="#showProjectModal" data-projectid="" title="Quick view project">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </button>
                <button type="button" class="btn btn-success edit-project" data-bs-toggle="modal" data-bs-target="#editProjectModal" data-projectid="" title="Edit project">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                </button>
                <button type="submit" class="btn btn-danger delete-project" data-projectid="" title="Delete project">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                </button>
            </td>
        </tr>
    </table>
    
</div>



<script>

</script>

@endsection