<?php

namespace App\Repositories\Base;

interface BaseRepositoryInterface {
    
    public function create(array $data);

    public function update($id, array $data);

    public function all($columns = array('*'));

    public function show($id, $columns = array('*'));

    public function delete($id);

}