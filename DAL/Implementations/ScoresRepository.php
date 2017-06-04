<?php

/**
 * Created by PhpStorm.
 * User: codry
 * Date: 6/3/2017
 * Time: 11:55 PM
 */
include("DAL/OracleDB.php");
include ("DAL/Contracts/IScoresRepository.php");

class ScoresRepository implements IScoresRepository
{
    private $oracleDB;
    private $table = "scores";
    private $fields = "KIDS_USERS.USERNAME,SCORES.SCORE,DOMAINS.DOMAIN,DOMAINS.DIFFICULTY,SCORES.TEST_DATE";
    private $join=    "JOIN PROPOSED_TESTS ON SCORES.TEST_ID=PROPOSED_TESTS.TEST_ID 
				       JOIN DOMAINS ON PROPOSED_TESTS.DOMAIN_ID = DOMAINS.DOMAIN_ID 
				       JOIN KIDS_USERS ON SCORES.KID_USER_ID = KIDS_USERS.KID_USER_ID 
				       order by SCORES.TEST_DATE DESC";

    public function __construct()
    {
        $this->oracleDB = new OracleDB();
    }


    public function getAll()
    {
        return $this->oracleDB->getRows($this->table, $this->fields, " ",[],$this->join );
//        return $this->oracleDB->getRows("kids_users k", "k.username, k.first_name, p.first_name as parent_first_name", "where kid_user_id = :id and parent_user_id = :id2", array("id"=>2, "id2"=>5), "join parents_users p on p.parent_user_id = k.parent_user_id");
    }

    public function getById($id)
    {
        return $this->oracleDB->getRows($this->table, $this->fields, "id=:id", array("id"=>$id));
    }


    public function insert($domain)
    {
        return $this->oracleDB->insertRow($this->table, $domain);
    }

    public function delete($id)
    {
        return $this->oracleDB->deleteRow($this->table, "id=:id", array("id"=>$id));
    }

    public function getByUserId($id){
        return $this->oracleDB->deleteRow($this->table, "kid_user_id=:id", array("id"=>$id));
    }

    public function getByDate($date){
        return $this->oracleDB->deleteRow($this->table, "test_date=:date", array("date"=>$date));
    }
}