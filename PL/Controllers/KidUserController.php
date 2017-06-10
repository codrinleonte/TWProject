<?php

/**
 * Created by PhpStorm.
 * User: codry
 * Date: 6/8/2017
 * Time: 11:45 AM
 */
require_once("BaseController.php");
require_once("BLL/Implementations/UserBLL.php");
require_once("BLL/Implementations/TestsBLL.php");

class KidUserController extends BaseController
{
    private $userBll;
    private $testBll;

    public function __construct()
    {
        parent::__construct();
        $this->userBll = new UserBLL();
        $this->testBll = new TestsBLL();
        if(!isset($_SESSION['user']))
            $this->redirect("");
    }

    public function index()
    {
        return $this->loadView("html/KidUser/kids-user-first-page");
    }

    public function getTestData()
    {

        $domain = $_POST['domain'];
        $difficulty = $_POST['difficulty'];
        $kidID = $_SESSION['user']['KID_USER_ID'];
        $testData = array("domain" => $domain, "difficulty" => $difficulty, "id" => $kidID);


        if (isset($_POST['start'])) {


            $test = $this->userBll->getAvailableTest($testData["domain"], $testData["difficulty"], $testData["id"]);
            $questionsAndAnswers = $this->testBll->getQuestionsAndAnswersFromTest($test['TEST_ID']);

            $jsonTestData = json_encode($questionsAndAnswers);
            $jsBottom = $this->buildTestPageJS($jsonTestData, $test['TEST_ID']);


            $this->loadView("html/KidUser/kids-test-page", array("jsBottom"=>$jsBottom));
        }

    }


    private function buildTestPageJS($jsonTestData, $testId){
        return <<<EOF
    <script>
        var testData = {$jsonTestData};
        var questionContainer = document.getElementById('quest');
        var answerA = document.getElementById("answerALabel");
        var answerB = document.getElementById("answerBLabel");
        var answerC = document.getElementById("answerCLabel");
        var answerD = document.getElementById("answerDLabel");
        var currentQuestion = -1;

        testId = "{$testId}";
        testData = formatTestData(testData);
        console.log(testData);
        document.addEventListener('DOMContentLoaded', function() {
          setCharacterImage(getDomain());
          
        }, true);
        
        

    </script>
EOF;

    }

}