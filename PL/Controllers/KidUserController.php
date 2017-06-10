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
require_once("BLL/Implementations/ScoresBLL.php");

class KidUserController extends BaseController
{
    private $userBll;
    private $testBll;
    private $scoreBll;

    public function __construct()
    {

        parent::__construct();
        $this->userBll = new UserBLL();
        $this->testBll = new TestsBLL();
        $this->scoreBll = new ScoresBLL();
        if(!isset($_SESSION['user']))
            $this->redirect("error/index");

    }

    public function index()
    {
        $tableLastScores = $this->renderTable($this->getLastScores());
        $topKids = $this->renderTopKids($this->getTopKids());

        $domains = $this->renderDomains($this->getTopDomains());

        $this->loadView("html/KidUser/kids-user-first-page",array("lastScores"=> $tableLastScores,"topKids"=>$topKids,
                   "topDomains"=>$domains     ));

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

            if(!$questionsAndAnswers){
                echo "<script type='text/javascript' >alert('Momentan nu exista teste noi in domeniul selectat!') ;
            location.href='/tw/user/profile'</script>";

            }
            else{
            $jsonTestData = json_encode($questionsAndAnswers);
            $jsBottom = $this->buildTestPageJS($jsonTestData, $test['TEST_ID']);


            $this->loadView("html/KidUser/kids-test-page", array("jsBottom"=>$jsBottom));

            }
        }


    }

    private function renderTable($table)
    {
        $tableRows = "";
        if (!empty($table)) {

            foreach ($table as $tableData) {
                $tableRows .= $this->renderView("templates/tables/table.row",
                    array("username" => $tableData['USERNAME'],
                        "score" => $tableData['SCORE'],
                        "domain" => $tableData['DOMAIN'],
                        "difficulty" => $tableData['DIFFICULTY'],
                        "date" => $tableData['TEST_DATE']));
            }
        }
        $table = $this->renderView("templates/tables/template.tabel.scoruri", array("rows"=>$tableRows));
        return $table;
    }

    private function renderTopKids($kids)
    {
        $topKids ="";
        if (!empty($kids)) {


                $topKids  .= $this->renderView("templates/labels/template.b.top.kids",
                    array("loc1Kid" => $kids[0]['KID_NUME'] . " " .
                                    $kids[0]['KID_PRENUME']  . " : MEDIE : " . $kids[0]['PUNCTAJ']. " PCTS" ,
                          "loc2Kid" => $kids[1]['KID_NUME'] . " " .
                                     $kids[1]['KID_PRENUME']  . " : MEDIE : " . $kids[1]['PUNCTAJ']. " PCTS" ,
                        "loc3Kid" => $kids[2]['KID_NUME'] . " " .
                                      $kids[2]['KID_PRENUME']  . " : MEDIE : " . $kids[2]['PUNCTAJ']. " PCTS" ));

            }

        return $topKids;
    }

    private function renderDomains($domains)
    {
        $topDomains ="";
        if (!empty($domains)) {


            $topDomains  .= $this->renderView("templates/labels/template.b.top.domains",
                array("loc1Domain" => $domains[0]['NUME_MATERIE'] . " - " .
                    $domains[0]['NIVEL_DIFICULTATE'] ,
                    "loc2Domain" => $domains[1]['NUME_MATERIE'] . " - " .
                        $domains[1]['NIVEL_DIFICULTATE'] ,
                    "loc3Domain" => $domains[2]['NUME_MATERIE'] . " - " .
                        $domains[2]['NIVEL_DIFICULTATE']  ));


        }

        return $topDomains;
    }


    private function getLastScores()
    {
        return $this->scoreBll->getLastFiveScores();
    }

    private function getTopKids()
    {
        return $this->scoreBll->getTopKids();
    }

    private function getTopDomains()
    {
        return $this->scoreBll->getTopDomains();
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