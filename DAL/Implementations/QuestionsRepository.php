<?php

/**
 * Created by PhpStorm.
 * User: codry
 * Date: 6/4/2017
 * Time: 9:46 PM
 */
require_once ("DAL/OracleDB.php");
require_once  ("DAL/Contracts/IQuestionsRepository.php");
class QuestionsRepository implements IQuestionsRepository
{
    private $oracleDB;
    private $table = "questions_jfk";
    private $fields = "*";

    public function __construct()
    {
        $this->oracleDB = new OracleDB();
    }

    public function getQuestionById($idQuestion){
        return $this->oracleDB->getRows($this->table, $this->fields, "QUESTION_ID=:id", array("id"=>$idQuestion));
    }


    public function getQuestionsFromTest($idTest){
        return $this->oracleDB->getRows($this->table, $this->fields, "QUESTIONS_JFK.TEST_ID=:id", array("id"=>$idTest),"JOIN PROPOSED_TESTS  ON QUESTIONS_JFK.TEST_ID = PROPOSED_TESTS.TEST_ID ");
    }


}