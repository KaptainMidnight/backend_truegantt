<?php

namespace App\Http\Controllers;

use App\Projects;
use App\UsersData;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function list()
    {
        $data = [];
        $users = UsersData::all();

        foreach ($users as $user) {
            $data[] = [
                'id' => $user->id,
                'firstname' => $user->firstname,
                'lastname' => $user->lastname,
                'img' => env('DOMAIN') . $user->img,
            ];
        }
        return $data;
    }

    public function show($id)
    {
        return UsersData::find($id);
    }

    public function create(Request $request)
    {
        $model = new UsersData();

        $model->firstname = $request->post('firstname');
        $model->lastname = $request->post('lastname');
        $model->img = $request->file('photo')->store('storage');
        $model->save();
        return [
            'id' => $model->id,
            'firstname' => $model->firstname,
            'lastname' => $model->lastname,
            'img' => $model->img,
        ];
    }

    public function show_project($id)
    {
        return Projects::find($id);
    }

    public function create_project(Request $request)
    {
        $model = new Projects();
        $model->name = $request->post('name');
        $model->date_start = $request->post('date_start');
        $model->date_end = $request->post('date_end');
        $model->save();
        return [
            'id' => $model->id,
            'name' => $model->name,
            'date_start' => $model->date_start,
            'date_end' => $model->date_end
        ];
    }

    public function projects_list()
    {
        $data = [];
        $projects = Projects::all();

        foreach ($projects as $project)
        {
            $data[] = [
                'id' => $project->id,
                'name' => $project->name,
                'date_start' => $project->date_start,
                'date_end' => $project->date_end
            ];
        }

        return $data;
    }

    public function users_projects(Request $request)
    {
        $user = new UsersData();

        return $user->projects();
    }

}
