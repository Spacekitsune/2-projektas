@extends('layouts.app')

@section('content')

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
                            <h3 class="m-0 p-0">0</h3>
                            <i class="fa fa-archive fs-4" aria-hidden="true"></i>
                        </div>
                        <h5 class="card-title">Total projects</h5>
                        <div class="container-fluid bg-info" style="height: 3px;"></div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-3">
            <a href="{{route('project.index')}}">
                <div class="card">
                    <div class="card-body">
                        <div class="container-fluid px-0 my-2" style="display: flex; justify-content: space-between; align-items: center">
                            <h3 class="m-0 p-0">0</h3>
                            <i class="fa fa-check fs-4" aria-hidden="true"></i>
                        </div>
                        <h5 class="card-title">Completed projects</h5>
                        <div class="container-fluid bg-info" style="height: 3px;"></div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-3">
            <a href="{{route('project.index')}}">
                <div class="card">
                    <div class="card-body">
                        <div class="container-fluid px-0 my-2" style="display: flex; justify-content: space-between; align-items: center">
                            <h3 class="m-0 p-0">0</h3>
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
            <button class="btn btn-success me-1" title="Download .csv file">
                <i class="fa fa-download" aria-hidden="true"></i>
            </button>

            <button type="button" class="btn btn-success " data-bs-toggle="modal" data-bs-target="#createProjectModal">
                <i class="fa fa-plus" aria-hidden="true"></i>
                Add project
            </button>
        </div>
        <div class="input-group mb-3" style="width: 30%">
            <input type="text" class="form-control" placeholder="Search.." aria-describedby="button-addon2">
            <button class="btn btn-primary" id="button-addon2">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
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
            <td class="col-project-projectTasks">{{count($project->projectTasks)}}</td>
            <td></td>
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
                <button type="submit" class="btn btn-danger delete-project" data-projectid="{{$project->id}}" title="Delete project">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                </button>
            </td>
        </tr>
    </table>


</div>

<script>
    // Užklausos nustatymai (headeriai) ajax priėjimui prie serverio (analogas @csrf)
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
        $("#submit-ajax-form-project").click(function() {
            //sukurti naujus kintamuosius
            let project_title;
            let project_description;
            let project_user=[];            

            //užpildyti kintamuosius reikšmėmis iš nurodytų id input'ų
            project_title = $('#project_title').val();
            project_description = $('#project_description').val();
            //užklausa į serverį
            $.ajax({
                type: 'POST', // nurodyti siuntimo metodą (POST, GET)
                url: '{{route("project.store")}}', // nurodyti action nuorodą
                //sukuriamas objektas su naujais kintamaisias
                //ar išsisiuntė sėkmingai, inspect>network>storeAjax>Headers (200 OK reiškia, kad išsisiuntė)
                data: {
                    project_title: project_title,
                    project_description: project_description
                },
                // success atributas patikrina ar užklausa nuėjo į serverį t.y. ieško 200 OK
                // data kintamasis yra atsakymas t.y. ką gražina storeAjax metodas
                // inspect>network>storeAjax>Response
                success: function(data) {
                    // sėkmės atveju sukuriamas kintamasis html, kuris yra f-cijos grą-inama reikšmė
                    let html;
                    html = createRowFromHtml(data.projectId, data.projectTitle, data.projectDescription, data.projectStatus, data.projectTasks, data.projectPending);
                    // html kintamasis prisegamas prie pagrindinės lentelės
                    $("#projects-table").append(html);
                    $("#createProjectModal").hide();
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    $('body').css({
                        overflow: 'auto'
                    });
                    // #alert div padaromas matomu
                    $("#alert").removeClass("d-none");
                    $("#alert").html(data.projectTitle + " " + data.successMessage);
                    //ištuštinami inputų laukeliai 
                    $('#project_title').val('');
                    $('#project_description').val('');
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
                    $('#open-ajax-form-project').attr("href", "/projects/show/" + projectid);

                }
            });
        });

        // EDIT UPDATE AJAX dalis 
        // edit atidaro modalą su su duomenimis (edit mygtukas)
        // updateAjax išsaugo db ir grąžina atnaujintus duomenis (update mygtukas modale)
        $(document).on('click', '.edit-project', function() {
            let projectid;
            projectid = $(this).attr('data-projectid');
            $.ajax({
                type: 'GET',
                //galima naudotis showAjax metodu, nes jis gražina duomenis apie pasirinktą id
                url: '/projects/showAjax/' + projectid,
                success: function(data) {
                    $('#edit_project_id').val(data.projectId);
                    $('#edit_project_title').val(data.projectTitle);
                    $('#edit_project_description').val(data.projectDescription);
                }
            });
        });


        $(document).on('click', '#update-project', function() {
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
                    project_description: project_description
                },
                // sėkmės atveju pasirenkami atitinkamos article id klasės eilutės elementai ir jų reikšmė keičiama į naują
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

        $(document).on('click', '.delete-project', function() {
            // naujas kintamasis, kuris bus id
            let projectid;
            //this mato kuris mygtukas buvo paspaustas ir pasiima jo id
            projectid = $(this).attr('data-projectid');
            //užklausa serveriui
            $.ajax({
                type: 'POST',
                url: '/projects/destroy/' + projectid, // action kelias + id kintamasis
                success: function(data) {
                    // data yra return'as iš deleteAjax metodo
                    let answer = data.answer
                    if (answer) {

                        // #alert div padaromas matomu
                        
                        $("#alert").addClass("alert-success");
                        // į #alert įdedama žinutė iš data atsakymo objekto 
                        

                        // ištrinama lentelės eilutė <tr> su klase article+id
                        $('.project' + projectid).remove();
                    } else {          
                        $("#alert").addClass("alert-danger");
                    }
                    $("#alert").removeClass("d-none");
                    $("#alert").html(data.destroyMessage);
                }
            });
        });

    })
</script>

@endsection