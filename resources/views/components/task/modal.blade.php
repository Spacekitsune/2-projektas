<div class="modal fade" id="createTaskModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="ajaxForm">
                    <div class="form-group">
                        <input id="project_id" type="hidden" name="project_id" />
                    </div>
                    <div class="form-group">
                        <label for="task_title">Task title</label>
                        <input id="task_title" class="form-control" type="text" name="task_title" placeholder="Enter your task title here..." />
                    </div>
                    <div class="form-group">
                        <label for="task_description">Task description</label>
                        <textarea class="form-control" name="task_description" id="task_description" cols="30" rows="5" placeholder="Enter task description here..."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="task_user">Responsible user</label>
                        <select class="form-control" name="task_user" id="task_user"></select>
                    </div>
                    <div class="form-group">
                        <label for="task_priority">Task priority</label>
                        <select class="form-control" name="task_priority" id="task_priority">
                            <option value="1">Low</option>
                            <option value="2">Medium</option>
                            <option value="3">High</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="task_status">Task progress</label>
                        <select class="form-control" name="task_status" id="task_status">
                            <option value="1">To do</option>
                            <option value="2">In progress</option>
                            <option value="3">Done</option>
                        </select>
                    </div>
                </div>
            <!-- </div> -->
        </div>
        <div class="modal-footer">
            <button id="submit-ajax-form-task" type="button" class="btn btn-success">Add new task</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="showTaskModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Task Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3 class="show-task-title"></h3>
                <h6 class="show-task-id"></h6>
                <p class="show-task-description">
                </p>
                <h6 class="show-task-user"></h6>
                <h6 class="show-task-status"></h6>
                <h6 class="show-task-priority"></h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editTaskModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Task</h5>
                <button type="button" class="btn-close close-task-edit" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="ajaxForm">
                    <div class="form-group">
                        <input id="edit_task_id" class="form-control" type="text" name="task_id" hidden />
                    </div>
                    <div class="form-group">
                        <label for="task_title">Task title</label>
                        <input id="edit_task_title" class="form-control" type="text" name="task_title" />
                    </div>
                    <div class="form-group">
                        <label for="task_description">Task Description</label>
                        <textarea id="edit_task_description" class="form-control" name="task_description" cols="30" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="task_user">Respomsible user</label>
                        <select class="form-control" name="task_user" id="edit_task_user"></select>
                    </div>
                    <div class="form-group">
                        <label for="task_priority">Task priority</label>
                        <select class="form-control" name="task_priority" id="edit_task_priority">
                            <option value="1">Low</option>
                            <option value="2">Medium</option>
                            <option value="3">High</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="task_status">Task progress</label>
                        <select class="form-control" name="task_status" id="edit_task_status">
                            <option value="1">To do</option>
                            <option value="2">In progress</option>
                            <option value="3">Done</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="update-task" type="button" class="btn btn-primary">Update task</button>
                <button type="button" class="btn btn-secondary close-task-edit" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>