<?php

/**
 * Created by PhpStorm.
 * User: codry
 * Date: 6/4/2017
 * Time: 9:51 PM
 */
require_once ("DAL/OracleDB.php");
require_once ("DAL/Contracts/IAnswersRepository.php");

class AnswersRepository implements IAnswersRepository
{
    private $oracleDB;
    private $table = "ANSWERS_JFK";
    private $fields = "*";

    public function __construct()
    {
        $this->oracleDb = new OracleDB();
    }
    public function getCorrectAnswer($idQuestion){
        return $this->oracleDB->getRows($this->table, "CORECT_ANSWER", "QUESTION_ID=:id", array("id"=>$idQuestion));
    }

    public function getAnswers($idQuestion){
        return $this->oracleDB->getRows($this->table, $this->fields , "QUESTION_ID=:id", array("id"=>$idQuestion));
    }
}