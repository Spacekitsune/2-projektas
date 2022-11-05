@extends('layouts.app')
@section('content')

<script src="{{url('js/drag.js')}}" defer></script>

<div class="container mb-4" style="position: sticky; top: 10px">
    <a type="button" class="btn btn-secondary mb-2" href="{{route('project.index')}}">
        <i class="fa fa-angle-left" aria-hidden="true"></i>
        Back to projects
    </a>
</div>

<div class="container">

    <h1>{{ $project->title }}</h1>
    <button id="add-new-task" data-projectid="{{$project->id}}" type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#createTaskModal">
        <i class="fa fa-plus" aria-hidden="true"></i>
        Add new task
    </button>


    <div class="row my-2" style="min-height: 100px;">
        <div class="col-sm-4">
            <h2>To do</h2>
            <div id="to-do" class="card p-1 draggable-container" style="min-height: 100px">
                @foreach ($project-> projectTasks as $task)
                @if ($task->status_id==1)
                <div class="draggable card-body border border-danger m-2 rounded-lg task{{$task->id}}" draggable="true">
                    <h5>{{$task->title}}</h5>
                    <div class="d-inline-flex ">
                        <button class="btn btn-dark font-weight-bolder rounded-circle px-3" title="{{$task->taskUser->name}}">{{substr($task->taskUser->name,0,1)}}</button>
                    </div>
                    <div class="d-inline-flex justify-content-end">
                        <button type="button" class="btn text-primary border-primary btn-sm show-task" data-bs-toggle="modal" data-bs-target="#showTaskModal" data-taskid="{{$task->id}}" title="Quick view task">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </button>
                        <button type="button" class="btn text-success border-success btn-sm edit-task" data-bs-toggle="modal" data-bs-target="#editTaskModal" data-taskid="{{$task->id}}" title="Edit task">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </button>
                        <button type="submit" class="btn text-danger border-danger btn-sm delete-task" data-taskid="{{$task->id}}" title="Delete task">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>


        <div class="col-sm-4">
            <h2>In proggress</h2>
            <div id="in-progress" class="card p-1 draggable-container" style="min-height: 50px">
                @foreach ($project-> projectTasks as $task)
                @if ($task->status_id==2)
                <div class="draggable card-body border border-danger m-2 rounded-lg task{{$task->id}}" draggable="true">
                    <h5>{{$task->title}}</h5>
                    <div class="d-inline-flex ">
                        <button class="btn btn-dark font-weight-bolder rounded-circle px-3" title="{{$task->taskUser->name}}">{{substr($task->taskUser->name,0,1)}}</button>
                    </div>
                    <div class="d-inline-flex justify-content-end">
                        <button type="button" class="btn text-primary border-primary btn-sm show-task" data-bs-toggle="modal" data-bs-target="#showTaskModal" data-taskid="{{$task->id}}" title="Quick view task">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </button>
                        <button type="button" class="btn text-success border-success btn-sm edit-task" data-bs-toggle="modal" data-bs-target="#editTaskModal" data-taskid="{{$task->id}}" title="Edit task">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </button>
                        <button type="submit" class="btn text-danger border-danger btn-sm delete-task" data-taskid="{{$task->id}}" title="Delete task">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>

        <div class="col-sm-4">
            <h2>Done</h2>
            <div id="done" class="card p-1 draggable-container" style="min-height: 100px">
                @foreach ($project-> projectTasks as $task)
                @if ($task->status_id==3)
                <div class="draggable card-body border border-danger m-2 rounded-lg task{{$task->id}}" draggable="true">
                    <h5>{{$task->title}}</h5>
                    <div class="d-inline-flex ">
                        <button class="btn btn-dark font-weight-bolder rounded-circle px-3 first-user-letter" title="{{$task->taskUser->name}}">{{substr($task->taskUser->name,0,1)}}</button>
                    </div>
                    <div class="d-inline-flex justify-content-end">
                        <button type="button" class="btn text-primary border-primary btn-sm show-task" data-bs-toggle="modal" data-bs-target="#showTaskModal" data-taskid="{{$task->id}}" title="Quick view task">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </button>
                        <button type="button" class="btn text-success border-success btn-sm edit-task" data-bs-toggle="modal" data-bs-target="#editTaskModal" data-taskid="{{$task->id}}" title="Edit task">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </button>
                        <button type="submit" class="btn text-danger border-danger btn-sm delete-task" data-taskid="{{$task->id}}" title="Delete task">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {

        //AJAX STORE DALIS:
        $("#add-new-task").click(function() {
            let projectid;
            projectid = $(this).attr('data-projectid');
            $.ajax({
                type: 'GET',
                url: '/projects/showAjax/' + projectid,
                success: function(data) {
                    $('#project_id').val(data.projectId)
                    $('#task_user').empty();
                    $.each(data.projectUsers, function(index, value) {
                        $('#task_user').append('<option value="' + index + '">' + value + '</option>');
                    });
                }
            });
        });


        $("#submit-ajax-form-task").click(function() {
            let project_id;
            let task_title;
            let task_description;
            let task_user;
            let task_priority;
            let task_status;

            project_id = $('#project_id').val();
            task_title = $('#task_title').val();
            task_description = $('#task_description').val();
            task_user = $('#task_user').val();
            task_priority = $('#task_priority').val();
            task_status = $('#task_status').val();

            $.ajax({
                type: 'POST',
                url: ' {{route("project.storeTask")}}',
                data: {
                    project_id: project_id,
                    task_title: task_title,
                    task_description: task_description,
                    task_user: task_user,
                    task_priority: task_priority,
                    task_status: task_status,
                },
                success: function(data) {
                    let templateCard = `<div class="template-card draggable card-body border border-danger m-2 rounded-lg" draggable="true">
                    <h5></h5>
                    <div class="d-inline-flex ">
                        <button class="btn btn-dark font-weight-bolder rounded-circle px-3 task-user" title=""></button>
                    </div>
                    <div class="d-inline-flex justify-content-end">
                        <button type="button" class="btn text-primary border-primary btn-sm show-task" data-bs-toggle="modal" data-bs-target="#showTaskModal" data-taskid="" title="Quick view task">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </button>
                        <button type="button" class="btn text-success border-success btn-sm edit-task" data-bs-toggle="modal" data-bs-target="#editTaskModal" data-taskid="" title="Edit task">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </button>
                        <button type="submit" class="btn text-danger border-danger btn-sm delete-task" data-taskid="" title="Delete task">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>`;


                    if (data.taskStatus == 1) {
                        $("#to-do").append(templateCard);
                    } else if (data.taskStatus == 2) {
                        $("#in-progress").append(templateCard);
                    } else {
                        $("#done").append(templateCard);
                    }

                    $(".template-card").addClass("task" + data.taskId);
                    $(".template-card .show-task").attr('data-taskid', data.taskId);
                    $(".template-card .edit-task").attr('data-taskid', data.taskId);
                    $(".template-card .delete-task").attr('data-taskid', data.taskId);
                    $(".template-card h5").html(data.taskTitle);
                    $(".template-card .task-user").attr('titleUser', data.taskUser);
                    let initialLetter = data.taskUser.slice(0,1);
                    $(".template-card .task-user").html(initialLetter);
                    $("#createTaskModal").hide();
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    $('body').css({
                        overflow: 'auto'
                    });
                    $('#task_title').val('');
                    $('#task_description').val('');
                    $('#task_status').val('');
                    $('#task_priority').val('');
                    alert(data.successMessage);
                }
            });
        });

        // SHOW AJAX dalis
        $(document).on('click', '.show-task', function() {
            let taskid;
            taskid = $(this).attr('data-taskid');
            $.ajax({
                type: 'GET',
                url: '/projects/showTask/' + taskid,
                success: function(data) {
                    $('.show-task-title').html("Task title: " + data.taskTitle);
                    $('.show-task-id').html("<b>Task id:</b> " + data.taskId);
                    $('.show-task-description').html("<b>Task description:</b> " + data.taskDescription);
                    $('.show-task-user').html("<b>User assigned to:</b> " + data.taskUserName);
                    $('.show-task-status').html("<b>Task status:</b> " + data.taskStatus);
                    $('.show-task-priority').html("<b>Task priority:</b> " + data.taskPriority);                  
                }
            });
        });

        // EDIT UPDATE AJAX dalis         
        $(document).on('click', '.edit-task', function() {
            let taskid;
            taskid = $(this).attr('data-taskid');
            $.ajax({
                type: 'GET',
                url: '/projects/showTask/' + taskid,
                success: function(data) {
                    $('#edit_task_id').val(data.taskId);
                    $('#edit_task_title').val(data.taskTitle);
                    $('#edit_task_description').val(data.taskDescription);

                    $.each(data.projectUsers, function(index, value) {
                        if (data.taskUserId == index) {
                        $('#edit_task_user').append('<option selected value="'+index+'">' + value + '</option>');
                        } else {
                            $('#edit_task_user').append('<option value="'+index+'">' + value + '</option>');
                        }
                    });
                    
                    if (data.taskPriority === 'Medium') {
                        $( "select#edit_task_priority option:eq(1)" ).attr("selected","");
                    } else if (data.taskPriority === 'High') {
                        $( "select#edit_task_priority option:eq(2)" ).attr("selected","");
                    }                       
                   
                    if (data.taskStatus === 'In progress') {
                        $( "select#edit_task_status option:eq(1)" ).attr("selected","");
                    } else if (data.taskStatus === 'Done') {
                        $( "select#edit_task_status option:eq(2)" ).attr("selected","");
                    }                
                }
            });
        });


        $(document).on('click', '.close-task-edit', function() {
            $('#edit_task_user').children('option').remove();
            $( "select#edit_task_priority option:eq(1)" ).removeAttr("selected","");
            $( "select#edit_task_priority option:eq(2)" ).removeAttr("selected","");
            $( "select#edit_task_status option:eq(1)" ).removeAttr("selected","");
            $( "select#edit_task_status option:eq(2)" ).removeAttr("selected","");
        })

        $(document).on('click', '#update-task', function() {            
            let taskid;
            let task_title;
            let task_description;
            let task_user;
            let task_priority;
            let task_status;

            taskid = $('#edit_task_id').val();
            task_title = $('#edit_task_title').val();
            task_description = $('#edit_task_description').val();
            task_user = $('#edit_task_user').val();
            task_status = $('#edit_task_status').val();
            task_priority = $('#edit_task_priority').val();
            $.ajax({
                type: 'POST',
                url: '/projects/updateTask/' + taskid,
                data: {
                    task_title: task_title,
                    task_description: task_description,
                    task_user: task_user,
                    task_status: task_status,
                    task_priority: task_priority
                },
                success: function(data) {
                    $("#editTaskModal").hide();
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    $('body').css({
                        overflow: 'auto'
                    });
                    $(".task" + taskid + " " + "h5").html(data.taskTitle);
                    let initialLetter = data.taskUser.slice(0,1);                    
                    $(".task" + taskid + " " + ".first-user-letter").html(initialLetter);
                    let element = $(".task" + taskid)[0];                                      
                    if (data.taskStatus==1) {
                        $("#to-do").append(element);
                    } else if (data.taskStatus==2) {
                        $("#in-progress").append(element);
                    } else {
                        $("#done").append(element);
                    }                    
                    alert(data.successMessage);
                }
            });
        })

        //DELETE TASK CONFIRMATION
        $(document).on('click', '.delete-task', function() {
            var dialog = confirm('Are you sure that you want to delete this task?');

            if (dialog) {
                let taskid;
                taskid = $(this).attr('data-taskid');
                $.ajax({
                    type: 'POST',
                    url: '/projects/destroyTask/' + taskid,
                    success: function(data) {
                        $('.task' + taskid).remove();
                        alert(data.destroyMessage);

                    }
                });
            }
        });
    })
</script>

@endsection