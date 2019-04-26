<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersData extends Model
{
    public function projects()
    {
        return $this->belongsToMany('App\Projects', 'users_projects', 'user_id', 'project_id');
    }
}
