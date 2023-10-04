<?php

namespace App\Repositories\Base;

use App\Repositories\Base\BaseRepositoryInterface;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function all($columns = array('*'))
    {
        return $this->model::select($columns)->get();
    }

    public function create(array $data)
    {
        return $this->model::create($data);
    }

    public function update($id, array $data)
    {
        return $this->model::where('id', $id)
        ->update($data);
    }

    public function show($id, $columns = array('*'))
    {
        return $this->model::select($columns)
        ->where('id', $id)
        ->first();
    }

    public function delete($id)
    {
        return $this->model::destroy($id);
    }
}
