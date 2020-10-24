<?php

namespace App\Repositories\Interfaces;

interface UserRepositoryInterface{

    public function getDefaultColumnsLatest();

    public function getByColumnsLatest(Array $columns);

    public function getBy($column, $data);
    
    public function getById($id);
    
    public function create(Array $data);

    public function update(Array $data, $id);

    public function destroy($id);
}