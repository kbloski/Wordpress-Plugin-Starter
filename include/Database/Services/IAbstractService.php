<?php

namespace Inc\Database\Services;

interface IAbstractService {
    public function create(array $data);
    public function getById($id);
    public function getAll($orderby = 'id', $order = 'DESC');
    public function updateById($id, array $data);
    public function deleteById($id);
}
