<?php

/**
 * Created by PhpStorm.
 * User: Razvan
 * Date: 6/4/2017
 * Time: 5:49 PM
 */


include ("BLL/Contracts/ITestBLL.php");
include ("DAL/Implementations/TestRepository.php");
class TestBLL
{

    private $testRepo;


   public function  __construct()
   {
      $this->testRepo = new TestRepository();

   }

    public function insertTest($testId,$domain,$difficulty,$proposerId){
       $domainId = $this->testRepo->getDomainIdByDomainDifficulty($domain,$difficulty);
        
        $this->testRepo->insertTest($testId[0]["SUBSTR(MAX(TEST_ID),1,1)||TO_CHAR(MAX(CAST(SUBSTR(TEST_ID,2)ASINT))+1)"],$proposerId,$domainId[0]['DOMAIN_ID']);
   }

   public function insertQuestion($questionId,$testId,$domain,$difficulty,$question){
       $domainId = $this->testRepo->getDomainIdByDomainDifficulty($domain,$difficulty);

     //  print("something");
      // print_r( $domainId[0]['DOMAIN_ID']);

      $this->testRepo->insertQuestion($questionId[0]["SUBSTR(MAX(QUESTION_ID),1,1)||TO_CHAR(MAX(CAST(SUBSTR(QUESTION_ID,2)ASINT))+1)"],$testId[0]["SUBSTR(MAX(TEST_ID),1,1)||TO_CHAR(MAX(CAST(SUBSTR(TEST_ID,2)ASINT))+1)"],$domainId[0]['DOMAIN_ID'],$question);
   }

   public function insertAnswer($answerId,$questionId,$corect,$wrong1,$wrong2,$wrong3){

        //  print_r($answerId[0]["SUBSTR(MAX(ANSWER_ID),1,1)||TO_CHAR(MAX(CAST(SUBSTR(ANSWER_ID,2)ASINT))+1)"]);
          $this->testRepo->insertAnswer($answerId[0]["SUBSTR(MAX(ANSWER_ID),1,1)||TO_CHAR(MAX(CAST(SUBSTR(ANSWER_ID,2)ASINT))+1)"],$questionId[0]["SUBSTR(MAX(QUESTION_ID),1,1)||TO_CHAR(MAX(CAST(SUBSTR(QUESTION_ID,2)ASINT))+1)"],$corect,$wrong1,$wrong2,$wrong3);
   }

    public function getIdQuestion(){
       return $this->testRepo->getQuestionId();
    }

    public function getIdAnswer(){
        return $this->testRepo->getAnswerId();
    }

    public function getIdTest(){
        return $this->testRepo->getTestId();
    }


}