<?php

/**
 * Created by PhpStorm.
 * User: codry
 * Date: 6/3/2017
 * Time: 12:16 PM
 */

include("DAL/OracleDB.php");
include ("DAL/Contracts/IKidsUsersRepository.php");

class KidsUsersRepository implements IKidsUsersRepository
{
    private $oracleDB;
    private $table = "kids_users";
    private $fields = "*";
    private $selectableFields = "kid_user_id, parent_user_id, username, first_name, last_name, birth_date";

    public function __construct()
    {
        $this->oracleDB = new OracleDB();
    }

    public function getAll()
    {
        return $this->oracleDB->getRows($this->table, $this->fields, '', []);
//        return $this->oracleDB->getRows("kids_users k", "k.username, k.first_name, p.first_name as parent_first_name", "where kid_user_id = :id and parent_user_id = :id2", array("id"=>2, "id2"=>5), "join parents_users p on p.parent_user_id = k.parent_user_id");
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

    public function insert($domain)
    {
        return $this->oracleDB->insertRow($this->table, $domain);
    }

    public function update($domain, $id)
    {
        return $this->oracleDB->updateRow($this->table, $domain, array("id"=>$id));
    }

    public function delete($id)
    {
        return $this->oracleDB->deleteRow($this->table, "id=:id", array("id"=>$id));
    }

    public function  deleteKidAccound($conditionString, $conditionParams)
    {
        return $this->oracleDB->deleteRow($this->table, $conditionString, $conditionParams);
    }



    public function validatePassword($conditionString, $conditionParams){
        $user = $this->oracleDB->getRows($this->table,$this->fields,$conditionString, $conditionParams);
        return $user?$user:false;
    }


    public function updatePassword($kidUser, $conditionParams)
    {
        return $this->oracleDB->updateRow($this->table, $kidUser,$conditionParams);
    }



}