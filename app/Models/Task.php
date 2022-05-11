<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    public function taskProject() {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }

    public function taskUser() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function taskStatus() {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }

    public function taskPriority() {
        return $this->belongsTo(Priority::class, 'priority_id', 'id');
    }
}
