<?php

/**
 * Created by PhpStorm.
 * User: codry
 * Date: 6/9/2017
 * Time: 8:49 AM
 */

require_once("DAL/OracleDB.php");
include ("DAL/Contracts/IParentsUsersRepository.php");
class ParentsUsersRepository implements IParentsUsersRepository
{
    private $oracleDB;
    private $table = "parents_users";
    private $fields = "*";
    public function __construct()
    {
        $this->oracleDB = new OracleDB();
    }

    public function getAll()
    {
        return $this->oracleDB->getRows($this->table, $this->fields, '', []);

    }

    public function getById($id)
    {
        return $this->oracleDB->getRows($this->table, $this->fields, "id=:id", array("id"=>$id));
    }

    public function getByUsernamePass($conditionString, $conditionParams)
    {
        $user = $this->oracleDB->getRows($this->table, $this->fields, $conditionString, $conditionParams);
//        var_dump($user);exit();
        return $user;
    }



    public function validateParentPassword($conditionString, $conditionParams){
        $user = $this->oracleDB->getRows($this->table,$this->fields,$conditionString, $conditionParams);
        return $user?$user:false;
    }

    public function validateParentUsername($conditionString, $conditionParams){
        $user = $this->oracleDB->getRows($this->table,$this->fields,$conditionString, $conditionParams);
        return $user?$user:false;
    }

    public function updatePassword($kidUser, $conditionParams)
    {
        return $this->oracleDB->updateRow($this->table, $kidUser,$conditionParams);
    }


    public function  deleteParentAccount($user,$conditionParams)
    {
        return $this->oracleDB->updateRow($this->table, $user,$conditionParams);
    }

}