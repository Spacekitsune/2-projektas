<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function statusProject() {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }

    use HasFactory;
    public function projectTasks() {
        return $this->hasMany(Task::class, 'project_id', 'id');
    }

    public function users() {
        return $this->belongsToMany(User::class, 'project_user')
        ->withTimestamps();
   }
}
