<?php

namespace Younes\Youdemy\DAO\Interfaces;

interface CRUDInterface
{
    public function create($instance);
    public function read($id);
    //public function index();
    public function update($instance);
    public function delete($id);

}