# Proact

## Database

For **database** please use following:

* database seeder (It contains 5 users, 5 projects and 11 tasks);
* create new database by importing existing projektas2.sql file (use _utf8mb4_unicode_ci_ );

## New user

Create **new user** by using register.
If you want to use **Facebook** or **Google** account, please enter your own service client id and token in _config>services.php_ file.

## Existing users

If you are using existing database you can use one of following email addresses:

* hudson.aubree@example.org
* bonita90@example.net
* eugene.gibson@example.com
* tracey.beatty@example.org
* stiedemann.lesly@example.net

**Password:** password

## Creating / Editing / Deleting Projects

User can create new projects. New project will be assigned to user. If user wants other users to be able to access this project, additional exsting user email addresses must be entered while creating new project. <br/>

User can edit existing projects. Project title and description can be changed, users can be removed or added to this project.<br/>

User can delete existing project even if it contains tasks. This project will be deleted for all users who have access to it.<br/>

User can view existing project information and its participants. Also user can access existing project tasks.

## Download .csv file

User can download .csv file that contains all projects' information available to user.

## Search and filter projects

User can filter projects by "completed" and "pending".
Also user can filter projects' titles and descriptions by using keywords in search field.

## Creating / Editing / Deleting tasks

User can add new tasks to the project. Task can have only one assigned project participant. Assigned to task user can be changed while editing task. Also task priority and status can be edited.

Tasks can be deleted.