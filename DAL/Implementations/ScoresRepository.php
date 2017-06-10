<?php

/**
 * Created by PhpStorm.
 * User: codry
 * Date: 6/3/2017
 * Time: 11:55 PM
 */
require_once("DAL/OracleDB.php");
include("DAL/Contracts/IScoresRepository.php");

class ScoresRepository implements IScoresRepository
{
    private $oracleDB;
    private $table = "SCORES";
    private $fields = "KIDS_USERS.USERNAME,SCORES.SCORE,DOMAINS.DOMAIN,DOMAINS.DIFFICULTY,SCORES.TEST_DATE";
    private $joinAll = "JOIN PROPOSED_TESTS ON SCORES.TEST_ID=PROPOSED_TESTS.TEST_ID 
				            JOIN DOMAINS ON PROPOSED_TESTS.DOMAIN_ID = DOMAINS.DOMAIN_ID 
				            JOIN KIDS_USERS ON SCORES.KID_USER_ID = KIDS_USERS.KID_USER_ID 
				            order by SCORES.TEST_DATE DESC";
    private $joinUsername = "  JOIN PROPOSED_TESTS ON SCORES.TEST_ID=PROPOSED_TESTS.TEST_ID " .
    " JOIN DOMAINS ON PROPOSED_TESTS.DOMAIN_ID = DOMAINS.DOMAIN_ID " .
    " JOIN KIDS_USERS ON SCORES.KID_USER_ID = KIDS_USERS.KID_USER_ID " .
    " JOIN PARENTS_USERS ON KIDS_USERS.PARENT_USER_ID=PARENTS_USERS.PARENT_USER_ID ";

    public function __construct()
    {
        $this->oracleDB = new OracleDB();
    }


    public function getAll()
    {
        return $this->oracleDB->getRows($this->table, $this->fields, " ", [], $this->joinAll);
//        return $this->oracleDB->getRows("kids_users k", "k.username, k.first_name, p.first_name as parent_first_name", "where kid_user_id = :id and parent_user_id = :id2", array("id"=>2, "id2"=>5), "join parents_users p on p.parent_user_id = k.parent_user_id");
    }

    public function getById($id)
    {
        return $this->oracleDB->getRows($this->table, $this->fields, "id=:id", array("id" => $id));
    }


    public function insert($score)
    {
        return $this->oracleDB->insertRow($this->table, $score);
    }

    public function delete($id)
    {
        return $this->oracleDB->deleteRow($this->table, "id=:id", array("id" => $id));
    }

    public function getByUsername($kidOrParent)
    {
        return $this->oracleDB->getRows($this->table, $this->fields,
            " KIDS_USERS.USERNAME =:kidUsername OR PARENTS_USERS.USERNAME =:parentUsername",
            array("kidUsername" => $kidOrParent, "parentUsername" => $kidOrParent), $this->joinUsername);
    }

    public function getByDate($date)
    {

        return $this->oracleDB->getRows($this->table, $this->fields, "test_date=:dateToday", array("dateToday" => $date), $this->joinUsername);
    }

    public function getLastId()
    {
        return $this->oracleDB->getRows($this->table, "max(SCORE_ID) as SCORE_ID", [], []);
    }

    public function getLastScores()
    {
        $query = "select*from(SELECT KIDS_USERS.USERNAME,SCORES.SCORE,DOMAINS.DOMAIN,DOMAINS.DIFFICULTY,SCORES.TEST_DATE FROM SCORES 
                   JOIN PROPOSED_TESTS ON SCORES.TEST_ID=PROPOSED_TESTS.TEST_ID 
				   JOIN DOMAINS ON PROPOSED_TESTS.DOMAIN_ID = DOMAINS.DOMAIN_ID 
				   JOIN KIDS_USERS ON SCORES.KID_USER_ID = KIDS_USERS.KID_USER_ID order by 5 desc ) where rownum <6";
        return $this->oracleDB->doQuery($query,[]);
    }

    public function getTopKids(){
        $query="select * from (select distinct *  from clasament  order by PUNCTAj  desc ) where rownum < 4";
        return $this->oracleDB->doQuery($query,[]);
    }

    public function getTopDomains(){
        $query=" select*from(SELECT  NUME_MATERIE , NIVEL_DIFICULTATE FROM MATERII_DISTRIBUTIE ORDER BY PROCENTAJ DESC) where rownum <4";
        return $this->oracleDB->doQuery($query,[]);
    }
}