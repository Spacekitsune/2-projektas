@extends('layouts.app')
@section('content')

<div class="container">

    <div class="container" style="position: sticky; top: 10px">
        <a type="button" class="btn btn-secondary mb-2" href="{{route('project.index')}}">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            Back to projects
        </a>
    </div>


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
    </div>



    <!-- <div class="container">
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
                <td class="col-task-priority row-color">{{$task->taskPriority->title}}</td>
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
        <table class="template d-none">
        <tr>
        <td class="col-task-user"></td>
            <td class="col-task-id"></td>
            <td class="col-task-title"></td>
            <td class="col-task-description"></td>
            <td class="col-task-priority"></td>
            <td class="col-task-status"></td>
            <td class="col-task-created"></td>
            <td class="col-task-updated"></td>
            <td>
                <button type="button" class="btn btn-primary show-task" data-bs-toggle="modal" data-bs-target="#showTaskModal" data-tasktid="" title="Quick view task">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </button>
                <button type="button" class="btn btn-success edit-task" data-bs-toggle="modal" data-bs-target="#editTaskModal" data-tasktid="" title="Edit task">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                </button>
                <button type="submit" class="btn btn-danger delete-task" data-tasktid="" title="Delete task">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                </button>
            </td>
        </tr>
    </table>
        @endif
    </div> -->



</div>

<!-- <script>
    const draggables = document.querySelectorAll('.draggable');
    const containers = document.querySelectorAll('.draggable-container');

    draggables.forEach(draggable => {
        draggable.addEventListener('dragstart', () => {
            console.log('hello');
            draggable.classList.add('dragging');
        })

        draggable.addEventListener('dragend', () => {
            draggable.classList.remove('dragging');
        })
    })

    containers.forEach(container => {
        container.addEventListener('dragover', e => {
            e.preventDefault();
            const afterElement = getDragAfterElement(container, e.clientY);
            const draggable = document.querySelector('.dragging');
            if (afterElement == null) {
                container.appendChild(draggable);
            } else {
                container.insertBefore(draggable, afterElement);
            }
        })
    })

    function getDragAfterElement(container, y) {
        const draggableElements = [...container.querySelectorAll('.draggable:not(.dragging)')];

        return draggableElements.reduce((closest, child) => {
            const box = child.getBoundingClientRect();
            const offset = y - box.top - box.height / 2;
            if (offset < 0 && offset > closest.offset) {
                return {
                    offset: offset,
                    element: child
                }
            } else {
                return closest
            }
        }, {
            offset: Number.NEGATIVE_INFINITY
        }).element
    }

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
        }
    });
</script> -->

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
                url: ' {{ route("project.storeTask") }}',
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
                    let  initialLetter='{{substr(' +data.taskUser+ ',0,1)}}';
                    $(".template-card .task-user").html(initialLetter);


                    $("#alert").removeClass("d-none");
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



                }
            });
        });

        // SHOW AJAX dalis

        $(document).on('click', '.show-project', function() {
            let projectid;
            projectid = $(this).attr('data-projectid');
            $.ajax({
                type: 'GET',
                url: '/projects/showAjax/' + projectid,
                success: function(data) {
                    $('.show-project-title').html("Project title: " + data.projectTitle);
                    $('.show-project-id').html("Project id: " + data.projectId);
                    $('.show-project-description').html("Project description: " + data.projectDescription);
                    $('.show-project-tasks').html("Total tasks: " + data.projectTasks);
                    $('.show-project-users').html("<h6>Project participants:</h6>")
                    for (i = 0; i < data.projectUsers.length; i++) {
                        $('.show-project-users').append("<li>" + data.projectUsers[i] + "</li>");
                    }
                    $('#open-ajax-form-project').attr("href", "/projects/show/" + projectid);

                }
            });
        });

        // EDIT UPDATE AJAX dalis         
        $(document).on('click', '.edit-project', function() {

            let projectid;
            projectid = $(this).attr('data-projectid');
            $.ajax({
                type: 'GET',
                url: '/projects/showAjax/' + projectid,
                success: function(data) {
                    $('#edit_project_id').val(data.projectId);
                    $('#edit_project_title').val(data.projectTitle);
                    $('#edit_project_description').val(data.projectDescription);
                    $.each(data.projectUsers, function(index, value) {
                        $('.edit-inputs-field-wrap').prepend('<div class="input-group mb-3 clear-inpput"><input type="text" class="project_user form-control" value="' + value + '" aria-label="Add user" aria-describedby="button-addon2"><button class="btn btn-outline-danger remove_project-user" type="button" title="Remove"><i class="fa fa-times d-inline-block" aria-hidden="true"></i></button></div>');
                    });
                    $('.edit-inputs-field-wrap').prepend('<label for="project_description">Project participants</label>');

                    let max_fields = 10;
                    let x = data.projectUsers.length;

                    $('#edit-project-add-users').click(function(e) {
                        e.preventDefault();
                        if (x < max_fields) {
                            x++;
                            $('.edit-inputs-field-wrap').append(append_text);
                        } else {
                            alert('Maximum project users limit was reached');
                        }
                    })

                    $('.edit-inputs-field-wrap').on("click", ".remove_project-user", function(e) {
                        e.preventDefault();
                        $(this).parent('div').remove();
                        x--;

                    })
                }
            });
        });


        $(document).on('click', '#update-project', function() {
            var project_user = new Array();
            $('.project_user').each(function() {
                project_user.push($(this).val());
            });

            project_user = project_user.filter(distinct);

            let projectid;
            let project_title;
            let project_description;
            projectid = $('#edit_project_id').val();
            project_title = $('#edit_project_title').val();
            project_description = $('#edit_project_description').val();
            $.ajax({
                type: 'POST',
                url: '/projects/update/' + projectid,
                data: {
                    project_title: project_title,
                    project_description: project_description,
                    project_user: project_user
                },
                success: function(data) {
                    $(".project" + projectid + " " + ".col-project-title").html(data.projectTitle)
                    $(".project" + projectid + " " + ".col-project-description").html(data.projectDescription)
                    $("#alert").removeClass("d-none");
                    $("#alert").html(data.successMessage);
                    $("#editProjectModal").hide();
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    $('body').css({
                        overflow: 'auto'
                    });
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