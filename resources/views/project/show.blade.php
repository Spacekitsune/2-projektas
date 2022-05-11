@extends('layouts.app')

@section('content')

<div class="container">

<div class="container" style="position: sticky; top: 10px">

            <a type="button" class="btn btn-secondary mb-2" href="{{route('project.index')}}">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
                Back to projects
            </a>
        </div>

    <div class="container">
        <h1>Project {{ $project->title }}</h1>

        

        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#createTaskModal">
            <i class="fa fa-plus" aria-hidden="true"></i>
            Add new task
        </button>
    </div>

    <div id="alert" class="alert alert-success d-none mt-2">
    </div>

    <div class="container">
        @if (count($project->projectTasks)==0)
        <p>The are no tasks in this project</p>
        @else
        <table id="tasks-table" class="table table-striped mt-2">

            <tr>
                <th>User</th>
                <th>Id</th>
                <th>Task title</th>
                <th>Description</th>
                <th>Priority</th>
                <th>Status</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Actions</th>
            </tr>

            @foreach ($project-> projectTasks as $task)
            <tr class="task{{$task->id}}">
                <td class="col-task-user">{{$task->taskUser->name}}</td>
                <td class="col-task-id">{{$task->id}}</td>
                <td class="col-task-title">{{$task->title}}</td>
                <td class="col-task-description" style="width: 35%">{{$task->description}}</td>
                <td class="col-task-priority">{{$task->taskPriority->title}}</td>
                <td class="col-task-status" style="width: 10%">{{$task->taskStatus->title}}</td>
                <td class="col-task-created">{{$task->created_at}}</td>
                <td class="col-task-updated">{{$task->updated_at}}</td>
                <td style="width: 15%">
                    <button type="button" class="btn btn-primary show-task" data-bs-toggle="modal" data-bs-target="#showTaskModal" data-taskid="{{$task->id}}">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="btn btn-success edit-task" data-bs-toggle="modal" data-bs-target="#editTaskModal" data-taskid="{{$task->id}}">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </button>
                    <button class="btn btn-danger delete-task" type="submit" data-taskid="{{$task->id}}">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
            @endforeach
        </table>
        @endif
    </div>



</div>


@endsection