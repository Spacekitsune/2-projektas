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
        <h1>{{ $project->title }}</h1>
        <button id="add-new-task" data-projectid="{{$project->id}}" type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#createTaskModal">
            <i class="fa fa-plus" aria-hidden="true"></i>
            Add new task
        </button>
    </div>

    <div id="alert" class="alert d-none mt-2">
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
        @endif
    </div>



</div>

<script>
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {



        function createRowFromHtml(projectId, projectTitle, projectDescription, projectStatus, projectTasks, projectPending) {
            $(".template tr").addClass("project" + projectId);
            $(".template .show-project").attr('data-projectid', projectId);
            $(".template .edit-project").attr('data-projectid', projectId);
            $(".template .delete-project").attr('data-projectid', projectId);
            $(".template .col-project-id").html(projectId);
            $(".template .col-project-title").html(projectTitle);
            $(".template .col-project-description").html(projectDescription);
            $(".template .col-project-status").html(projectStatus);
            $(".template .col-project-tasks").html(projectTasks);
            $(".template .col-project-pending").html(projectPending);
            return $(".template tbody").html();
        }

        //AJAX STORE DALIS:

        $("#add-new-task").click(function() {
            let projectid;
            projectid = $(this).attr('data-projectid');
            $.ajax({
                type: 'GET',
                url: '/projects/showAjax/' + projectid,
                success: function(data) {
                    for (i = 0; i < data.projectUsers.length; i++) {
                        $('#task_user').append("<option>" + data.projectUsers[i] + "</option>");
                    }
                }
            });
        });


        $("#submit-ajax-form-task").click(function() {
            let task_title;
            let task_description;

            task_title = $('#task_title').val();
            task_description = $('#task_description').val();

            $.ajax({
                type: 'POST',
                url: '{{route("project.storeTask")}}',
                data: {
                    project_title: project_title,
                    project_description: project_description
                },
                success: function(data) {
                    let html;
                    html = createRowFromHtml(data.projectId, data.projectTitle, data.projectDescription, data.projectStatus, data.projectTasks, data.projectPending);
                    $("#projects-table").append(html);
                    $("#createProjectModal").hide();
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    $('body').css({
                        overflow: 'auto'
                    });
                    $("#alert").removeClass("d-none");
                    $("#alert").html(data.projectTitle + " " + data.successMessage);
                    $('#project_title').val('');
                    $('#project_description').val('');
                    $('.clear-inpput').empty();
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