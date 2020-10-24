<?php

namespace App\Repositories;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function getDefaultColumnsLatest()
    {
        return User::select('id', 'name', 'email')->latest()->get();
    }

    public function getByColumnsLatest(Array $columns)
    {
        return User::latest($columns)->get();
    }

    public function getBy($column, $data)
    {
        return User::where($column, $data)->get();
    }
    
    public function getById($id)
    {
        return User::find($id);
    }
    
    public function create(Array $data)
    {
        return User::create($data);
    }

    public function update(Array $data, $id)
    {
        return User::find($id)->update($data);
    }

    public function destroy($id)
    {
        return User::destroy($id);
    }
}