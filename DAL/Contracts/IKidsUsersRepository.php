<?php

/**
 * Created by PhpStorm.
 * User: codry
 * Date: 6/3/2017
 * Time: 12:13 PM
 */
require_once("DAL/Contracts/IUserRepository.php");
interface IKidsUsersRepository extends IUserRepository
{
    public function  deleteKidAccount($conditionString, $conditionParams);
}