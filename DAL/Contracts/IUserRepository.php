<?php

/**
 * Created by PhpStorm.
 * User: codry
 * Date: 6/3/2017
 * Time: 2:28 PM
 */
interface IUserRepository
{
    public function getAll();
    public function getById($id);
    public function getByUsernamePass($conditionString, $conditionParams);
    public function insert($user);
    public function update($user, $id);
    public function delete($id);
}