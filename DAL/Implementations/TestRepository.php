
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

<<<<<<< HEAD

    public function __construct()
    {
        $this->oracleDB = new OracleDB();
=======
    public function __construct()
    {
        $this->oracleDb = new OracleDB();
>>>>>>> dadc836a9364850c83abe9285bf9c6d167a9977c
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
        return $this->oracleDB->getRows($this->table, "substr(max(test_id),1,1)||to_char(max(CAST (substr(test_id,2) as int))+1)");
    }

    public function getQuestionId(){
        return $this->oracleDB->getRows($this->table, "substr(max(question_id),1,1)||to_char(max(CAST (substr(question_id,2) as int))+1)");
    }

    public function getAnswerId(){
        return $this->oracleDB->getRows($this->table, "substr(max(answer_id),1,1)||to_char(max(CAST (substr(answer_id,2) as int))+1)");
    }

<<<<<<< HEAD
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
=======
>>>>>>> dadc836a9364850c83abe9285bf9c6d167a9977c


}