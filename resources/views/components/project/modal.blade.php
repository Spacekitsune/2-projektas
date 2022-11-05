<div class="modal fade" id="createProjectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Project</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="ajaxForm">
                    <div class="form-group">
                        <label for="project_title">Project title</label>
                        <input id="project_title" class="form-control" type="text" name="project_title" placeholder="Enter your project title here..." />
                    </div>
                    <div class="form-group">
                        <label for="project_description">Project description</label>
                        <textarea class="form-control" name="project_description" id="project_description" cols="30" rows="5" placeholder="Enter project description here..."></textarea>
                    </div>
                    <div class="inputs-field-wrap">
                        <button id="project-add-users" class="btn btn-primary my-2">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            Add more users
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="submit-ajax-form-project" type="button" class="btn btn-success">Save changes</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="showProjectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3 class="show-project-title"></h3>
                <h6 class="show-project-id">
                </h6>
                <p class="show-project-description">
                </p>
                <h6 class="show-project-tasks"></h6>
                <ul class="show-project-users"></ul>
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary" id="open-ajax-form-project">Open project</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editProjectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Project</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="ajaxForm">
                    <div class="form-group">
                        <input id="edit_project_id" class="form-control" type="text" name="project_id" hidden />
                    </div>
                    <div class="form-group">
                        <label for="project_title">Project title</label>
                        <input id="edit_project_title" class="form-control" type="text" name="project_title" />
                    </div>
                    <div class="form-group">
                        <label for="project_description">Project Description</label>
                        <textarea id="edit_project_description" class="form-control" name="project_description" cols="30" rows="5"></textarea>
                    </div>
                    <div class="edit-inputs-field-wrap form-group">
                        <div class="edit-project-users"></div>
                        <button id="edit-project-add-users" class="btn btn-primary my-2">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            Add more users
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="update-project" type="button" class="btn btn-primary">Update project</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>