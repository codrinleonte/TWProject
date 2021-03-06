<?php
/**
 * Created by PhpStorm.
 * User: codry
 * Date: 6/4/2017
 * Time: 10:27 PM
 */
require_once  ("BLL/Contracts/ITestBLL.php");
require_once  ("DAL/Implementations/QuestionsRepository.php");
require_once  ("DAL/Implementations/AnswersRepository.php");
require_once  ("DAL/Implementations/TestRepository.php");
require_once  ("DAL/Implementations/ScoresRepository.php");
class TestsBLL implements ITestBLL
{

    private $questionsRepo;
    private $answersRepo;
    private $testRepo;
    private $scoreRepo;

    public function __construct(){

        $this->questionsRepo=new QuestionsRepository();
        $this->answersRepo=new AnswersRepository();
        $this->testRepo=new TestRepository();
        $this->scoreRepo = new ScoresRepository();

    }

    public function isCorrectAnswer($idQuestion,$answer){
        if($this->answersRepo->getCorrectAnswer($idQuestion) == $answer)
            return true;
        return false;
    }

    public function scoreCalculator($questionsList,$answersGiven){
        $score = 0;
        foreach ($questionsList as $question){
            if($this->answersRepo->getCorrectAnswer($question["id"]) == $answersGiven)
                $score += 10;
        }
        return $score;
    }


    /**
     * @param $answers
     * @return bool
     */

    public function shuffleAnswers($answers){
        return shuffle($answers);
    }

    public function getAvailableTest($domain,$difficulty,$kidID){
        $availableTestList = $this->testRepo->getAvailableTests($domain,$difficulty,$kidID);
        if($availableTestList== null )
            return false;
        else
            return $availableTestList[0];
    }

    public function getQuestionsAndAnswersFromTest($testId){
        $questions = $this->questionsRepo->getQuestionsFromTest($testId);
        $questionAndAnswers = array();
        $index = 0;
        if(!empty($questions))
            foreach($questions as $question){
            $answers = $this->answersRepo->getAnswers($question['QUESTION_ID']);

            array_push($questionAndAnswers,array("QUESTION_ID"=>$question["QUESTION_ID"],"QUESTION"=>$question['QUESTION'],
            "CORECT_ANSWER"=>$answers[$index]['CORECT_ANSWER'], "WRONG_ANSWER_1"=>$answers[$index]["WRONG_ANSWER_1"],
                "WRONG_ANSWER_2"=>$answers[$index]["WRONG_ANSWER_2"], "WRONG_ANSWER_3"=>$answers[$index]["WRONG_ANSWER_3"]));

        }

         return $questionAndAnswers;
    }


    public function insertScore($score, $testId, $kidId)
    {
        $lastScoreId = $this->scoreRepo->getLastId();

        (int )$scoreId = (int)$lastScoreId[0]['SCORE_ID'] + 1 ;
        $this->scoreRepo->insert(array("SCORE_ID" => $scoreId, "TEST_ID" => "'".$testId."'" , "KID_USER_ID" => $kidId, "SCORE" => $score,
            "TEST_DATE" => "SYSDATE"));
    }


}