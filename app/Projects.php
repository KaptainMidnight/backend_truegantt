<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\UsersData', 'users_projects', 'project_id', 'user_id');
    }
}
