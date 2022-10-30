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


    let wrapper = $(".inputs-field-wrap");
    let add_button = $("#project-add-users");
    let append_text = `<div class="input-group mb-3 clear-inpput">
                        <input type="text" class="project_user form-control" placeholder="Enter user email here..." aria-label="Add user" aria-describedby="button-addon2">
                        <button class="btn btn-outline-danger remove_project-user" type="button" title="Remove">
                            <i class="fa fa-times d-inline-block" aria-hidden="true"></i>
                        </button>
                    </div>`;

    let max_fields = 10;
    let x = 0;

    $(add_button).click(function(e) {
        e.preventDefault();
        if (x < max_fields) {
            x++;
            wrapper.append(append_text);
        } else {
            alert('Maximum project users limit was reached');
        }
    })

    $(wrapper).on("click", ".remove_project-user", function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
        x--;

    })

    $('.modal-footer').on("click", ".empty-value", function(e) {
        e.preventDefault();
        $(wrapper).innerHTML = '';
    })

    //AJAX STORE DALIS:
    $("#submit-ajax-form-project").click(function() {
        let project_title;
        let project_description;

        project_title = $('#project_title').val();
        project_description = $('#project_description').val();

        var project_user = new Array();
        $('.project_user').each(function() {
            project_user.push($(this).val());
        });

        $.ajax({
            type: 'POST',
            url: '{{route("project.store")}}',
            data: {
                project_title: project_title,
                project_description: project_description,
                project_user: project_user
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

    $(document).on('click', '.delete-project', function() {

        let projectid;

        projectid = $(this).attr('data-projectid');


        $.ajax({
            type: 'POST',
            url: '/projects/destroy/' + projectid,
            success: function(data) {
                let answer = data.answer
                if (answer) {
                    // $("#alert").addClass("alert-success");
                    $('.project' + projectid).remove();
                    alert(data.destroyMessage);
                } else {
                    // $("#alert").addClass("alert-danger");
                    var dialog = confirm(data.destroyMessage);
                    if (dialog) {
                        $.ajax({
                            type: 'POST',
                            url: '/projects/destroyWithTasks/' + projectid,
                            success: function(data) {
                                $('.project' + projectid).remove();
                            }
                        })
                    } else {

                    }
                }
                // $("#alert").removeClass("d-none");
                // $("#alert").html(data.destroyMessage);
            }
        });
    });

})