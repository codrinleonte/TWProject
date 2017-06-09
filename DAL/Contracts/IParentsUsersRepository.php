<?php

/**
 * Created by PhpStorm.
 * User: codry
 * Date: 6/9/2017
 * Time: 8:49 AM
 */
require_once("DAL/Contracts/IUserRepository.php");
interface IParentsUsersRepository extends IUserRepository
{
    public function  deleteParentAccount($conditionString, $conditionParams);
    public function validateParentPassword($conditionString, $conditionParams);
    public function validateParentUsername($conditionString, $conditionParams);
}