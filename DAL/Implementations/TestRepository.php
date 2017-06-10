
<?php

/**
 * Created by PhpStorm.
 * User: Razvan
 * Date: 6/4/2017
 * Time: 5:29 PM
 */
require_once ("DAL/OracleDB.php");
require_once  ("DAL/Contracts/ITestRepository.php");
class TestRepository implements ITestRepository
{
    private $oracleDB;
    private $table = "PROPOSED_TESTS";
    private $fields = "*";


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


    public function insert($test)
    {
        return $this->oracleDB->insertRow($this->table, $test);
    }


    public function delete($id)
    {
        return $this->oracleDB->deleteRow($this->table, "id=:id", array("id"=>$id));
    }

    public function getTestId(){
        return $this->oracleDB->getRows($this->table, "substr(max(test_id),1,1)||to_char(max(CAST (substr(test_id,2) as int))+1)","",[]);
    }

    public function getQuestionId(){
        return $this->oracleDB->getRows("QUESTIONS_JFK", "substr(max(question_id),1,1)||to_char(max(CAST (substr(question_id,2) as int))+1)","",'');
    }

    public function getAnswerId(){
        return $this->oracleDB->getRows("ANSWERS_JFK", "substr(max(answer_id),1,1)||to_char(max(CAST (substr(answer_id,2) as int))+1)","",'');
    }



    public function getAvailableTests($domain,$difficulty,$kidID){
        $query = "SELECT " . $this->fields .
            " FROM PROPOSED_TESTS JOIN DOMAINS ON PROPOSED_TESTS.DOMAIN_ID=DOMAINS.DOMAIN_ID WHERE PROPOSED_TESTS.TEST_ID 
              NOT IN(SELECT distinct PROPOSED_TESTS.TEST_ID FROM PROPOSED_TESTS 
              JOIN DOMAINS ON PROPOSED_TESTS.DOMAIN_ID=DOMAINS.DOMAIN_ID
              JOIN SCORES ON PROPOSED_TESTS.TEST_ID = SCORES.TEST_ID 
              WHERE DOMAINS.DOMAIN = :domain AND DOMAINS.DIFFICULTY=:difficulty AND SCORES.KID_USER_ID =:id
               ) AND DOMAINS.DOMAIN = :domain AND DOMAINS.DIFFICULTY=:difficulty" ;

        $params = array("difficulty"=>$difficulty, "domain" =>$domain , "id"=>"$kidID");

      return $this->oracleDB->doQuery($query,$params);
    }


    public function insertTest($testId,$proposerId,$domainId)
    {
        $insert = 'INSERT INTO PROPOSED_TESTS (TEST_ID,PROPOSER_ID,DOMAIN_ID) values (:testId , :proposerId , :domainId )';
        //  print_r($testId);
        //  print_r($proposerId);
        //print_r($domainId);
        $compiled = oci_parse($this->oracleDB->getConn(), $insert);
        oci_bind_by_name($compiled, ':testId', $testId);
        oci_bind_by_name($compiled, ':proposerId', $proposerId);
        oci_bind_by_name($compiled, ':domainId', $domainId);

        oci_execute($compiled);
        //return $this->oracleDB->insertRow($this->table, $test);
    }

    public function insertQuestion($questionId,$testId,$domainId,$question)
    {
        $insert = 'INSERT INTO QUESTIONS_JFK (QUESTION_ID,DOMAIN_ID,TEST_ID,QUESTION) values (:questionId ,:domainId,:testId ,:question )';
        // print_r($testId);
        // print_r($questionId);
        // print_r($domainId);
        //  print("ceva");
        $compiled = oci_parse($this->oracleDB->getConn(), $insert);
        oci_bind_by_name($compiled, ':questionId', $questionId);
        oci_bind_by_name($compiled, ':domainId', $domainId);
        oci_bind_by_name($compiled, ':testId', $testId);
        oci_bind_by_name($compiled, ':question', $question);

        oci_execute($compiled);
        //return $this->oracleDB->insertRow($this->table, $test);
    }

    public function insertAnswer($answerId,$questionId,$corect,$wrong1,$wrong2,$wrong3)
    {
        $insert = 'INSERT INTO ANSWERS_JFK (ANSWER_ID,QUESTION_ID,CORECT_ANSWER,WRONG_ANSWER_1,WRONG_ANSWER_2,WRONG_ANSWER_3) values (:answerId,:questionId ,:corect,:wrong1 ,:wrong2,:wrong3)';
        //  print("ola my amore");
        // print_r($answerId);
        // print_r($questionId);

        $compiled = oci_parse($this->oracleDB->getConn(), $insert);
        oci_bind_by_name($compiled, ':answerId', $answerId);
        oci_bind_by_name($compiled, ':questionId',$questionId);
        oci_bind_by_name($compiled, ':corect', $corect);
        oci_bind_by_name($compiled, ':wrong1', $wrong1);
        oci_bind_by_name($compiled, ':wrong2', $wrong2);
        oci_bind_by_name($compiled, ':wrong3', $wrong3);


        oci_execute($compiled);
        //return $this->oracleDB->insertRow($this->table, $test);
    }


    public function getDomainIdByDomainDifficulty($domain,$difficulty){
        return $this->oracleDB->getRows("DOMAINS","DOMAIN_ID","DOMAIN=:DOMAIN and DIFFICULTY=:DIFFICULTY",array("DIFFICULTY"=>$difficulty,"DOMAIN"=>$domain));
    }



}