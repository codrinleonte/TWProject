<?php

/**
 * Created by PhpStorm.
 * User: Razvan
 * Date: 6/4/2017
 * Time: 5:09 PM
 */
require_once ("BaseController.php");
require_once ("BLL/Implementations/TestBLL.php");
class AddTestController extends BaseController
{
    public $question1,$answer_good1,$answer_wrong11,$answer_wrong21,$answer_wrong31;
    public $question2,$answer_good2,$answer_wrong12,$answer_wrong22,$answer_wrong32;
    public $question3,$answer_good3,$answer_wrong13,$answer_wrong23,$answer_wrong33;
    public $question4,$answer_good4,$answer_wrong14,$answer_wrong24,$answer_wrong34;
    public $question5,$answer_good5,$answer_wrong15,$answer_wrong25,$answer_wrong35;
    public $question6,$answer_good6,$answer_wrong16,$answer_wrong26,$answer_wrong36;
    public $question7,$answer_good7,$answer_wrong17,$answer_wrong27,$answer_wrong37;
    public $domeniu,$dificultate;
    private $testBll;

    public function __construct()
    {
        parent::__construct();
        $this->testBll = new TestBLL();

    }

    public function index(){
       $this->loadView("html/ParentUser/formular");

       // print_r($_SESSION['user']['PARENT_USER_ID']);
    }

    public function getTest()
    {

         $TESTID = $this->testBll->getIdTest();
         $proposerId = $_SESSION["user"]["PARENT_USER_ID"];

        if (isset($_POST['domain'])) {
            if($_POST['domain']=="math")
                 $this->domeniu="MATH";
            if($_POST['domain']=="biology")
                $this->domeniu="BIOLOGY";
            if($_POST['domain']=="geography")
                $this->domeniu="GEOGRAPHY";
            if($_POST['domain']=="english")
                $this->domeniu="ENGLISH";
            if($_POST['domain']=="history")
                $this->domeniu="HISTORY";
        }
       // print("geani");
       // print_r($this->domeniu);


        if (isset($_POST['difficulty'])) {
            if($_POST['difficulty']=="easy")
                $this->dificultate="EASY";
            if($_POST['difficulty']=="medium")
                $this->dificultate="MEDIUM";
            if($_POST['difficulty']=="hard")
                $this->dificultate="HARD";
        }
        $this->testBll->insertTest($TESTID,$this->domeniu,$this->dificultate,$proposerId);
        if (isset($_POST['question1'])) {
            $this->question1 = $_POST['question1'];
        }
        if (isset($_POST['answer11'])) {
           $this->answer_good1= $_POST['answer11'];
        }
        if (isset($_POST['answer12'])) {
            $this->answer_wrong11= $_POST['answer12'];
        }
        if (isset($_POST['answer13'])) {
            $this->answer_wrong21=$_POST['answer13'];
        }
        if (isset($_POST['answer14'])) {
            $this->answer_wrong31=$_POST['answer14'];
        }

        $tempQuestionId = $this->testBll->getIdQuestion();
       // print("lubenita1");
       // print_r($tempQuestionId);
        $this->testBll->insertQuestion($tempQuestionId,$TESTID,$this->domeniu,$this->dificultate,$this->question1);
        $this->testBll->insertAnswer($this->testBll->getIdAnswer(),$tempQuestionId,$this->answer_good1,$this->answer_wrong11,$this->answer_wrong21,$this->answer_wrong31);


       if(isset($_POST["save1"])) {
            print("teava");
        }

        if (isset($_POST['question2'])) {
            $this->question2=$_POST['question2'];
        }
        if (isset($_POST['answer21'])) {
            $this->answer_good2= $_POST['answer21'];
        }
        if (isset($_POST['answer22'])) {
            $this->answer_wrong12= $_POST['answer22'];
        }
        if (isset($_POST['answer23'])) {
            $this->answer_wrong22=$_POST['answer23'];
        }
        if (isset($_POST['answer24'])) {
            $this->answer_wrong32=$_POST['answer24'];
        }
        $tempQuestionId = $this->testBll->getIdQuestion();
       // print_r("lubenita2");
       // print_r($tempQuestionId);
        $this->testBll->insertQuestion($tempQuestionId,$TESTID,$this->domeniu,$this->dificultate,$this->question2);
        $this->testBll->insertAnswer($this->testBll->getIdAnswer(),$tempQuestionId,$this->answer_good2,$this->answer_wrong12,$this->answer_wrong22,$this->answer_wrong32);





        if (isset($_POST['question3'])) {
            $this->question3=$_POST['question3'];
        }
        if (isset($_POST['answer31'])) {
            $this->answer_good3= $_POST['answer31'];
        }
        if (isset($_POST['answer32'])) {
            $this->answer_wrong13= $_POST['answer32'];
        }
        if (isset($_POST['answer33'])) {
            $this->answer_wrong23=$_POST['answer33'];
        }
        if (isset($_POST['answer34'])) {
            $this->answer_wrong33=$_POST['answer34'];
        }
        $tempQuestionId = $this->testBll->getIdQuestion();
       // print_r("lubenita3");
       // print_r($tempQuestionId);
        $this->testBll->insertQuestion($tempQuestionId,$TESTID,$this->domeniu,$this->dificultate,$this->question3);
        $this->testBll->insertAnswer($this->testBll->getIdAnswer(),$tempQuestionId,$this->answer_good3,$this->answer_wrong13,$this->answer_wrong23,$this->answer_wrong33);


        if (isset($_POST['question4'])) {
            $this->question4=$_POST['question4'];
        }
        if (isset($_POST['answer41'])) {
            $this->answer_good4= $_POST['answer41'];
        }
        if (isset($_POST['answer42'])) {
            $this->answer_wrong14=$_POST['answer42'];
        }
        if (isset($_POST['answer43'])) {
            $this->answer_wrong24=$_POST['answer43'];
        }
        if (isset($_POST['answer44'])) {
            $this->answer_wrong34=$_POST['answer44'];
        }
        $tempQuestionId = $this->testBll->getIdQuestion();
       // print_r("lubenita4");
       // print_r($tempQuestionId);
        $this->testBll->insertQuestion($tempQuestionId,$TESTID,$this->domeniu,$this->dificultate,$this->question4);
        $this->testBll->insertAnswer($this->testBll->getIdAnswer(),$tempQuestionId,$this->answer_good4,$this->answer_wrong14,$this->answer_wrong24,$this->answer_wrong34);


        if (isset($_POST['question5'])) {
            $this->question5=$_POST['question5'];
        }
        if (isset($_POST['answer51'])) {
            $this->answer_good5= $_POST['answer51'];
        }
        if (isset($_POST['answer52'])) {
            $this->answer_wrong15= $_POST['answer52'];
        }
        if (isset($_POST['answer53'])) {
            $this->answer_wrong25=$_POST['answer53'];
        }
        if (isset($_POST['answer54'])) {
            $this->answer_wrong35=$_POST['answer54'];
        }
        $tempQuestionId = $this->testBll->getIdQuestion();
       // print_r("lubenita5");
       // print_r($tempQuestionId);
        $this->testBll->insertQuestion($tempQuestionId,$TESTID,$this->domeniu,$this->dificultate,$this->question5);
        $this->testBll->insertAnswer($this->testBll->getIdAnswer(),$tempQuestionId,$this->answer_good5,$this->answer_wrong15,$this->answer_wrong25,$this->answer_wrong35);




        if (isset($_POST['question6'])) {
            $this->question6=$_POST['question6'];
        }
        if (isset($_POST['answer61'])) {
            $this->answer_good6= $_POST['answer61'];
        }
        if (isset($_POST['answer62'])) {
            $this->answer_wrong16=$_POST['answer62'];
        }
        if (isset($_POST['answer63'])) {
            $this->answer_wrong26=$_POST['answer63'];
        }
        if (isset($_POST['answer64'])) {
            $this->answer_wrong36=$_POST['answer64'];
        }
        $tempQuestionId = $this->testBll->getIdQuestion();
       // print_r("lubenita6");
       // print_r($tempQuestionId);
        $this->testBll->insertQuestion($tempQuestionId,$TESTID,$this->domeniu,$this->dificultate,$this->question6);
        $this->testBll->insertAnswer($this->testBll->getIdAnswer(),$tempQuestionId,$this->answer_good6,$this->answer_wrong16,$this->answer_wrong26,$this->answer_wrong36);



        if (isset($_POST['question7'])) {
            $this->question7=$_POST['question7'];
        }
        if (isset($_POST['answer71'])) {
            $this->answer_good7= $_POST['answer71'];
        }
        if (isset($_POST['answer72'])) {
            $this->answer_wrong17= $_POST['answer72'];
        }
        if (isset($_POST['answer73'])) {
            $this->answer_wrong27=$_POST['answer73'];
        }
        if (isset($_POST['answer74'])) {
            $this->answer_wrong37=$_POST['answer74'];
        }
        $tempQuestionId = $this->testBll->getIdQuestion();
       // print_r("lubenita7");
       // print_r($tempQuestionId);
        $this->testBll->insertQuestion($tempQuestionId,$TESTID,$this->domeniu,$this->dificultate,$this->question7);
        $this->testBll->insertAnswer($this->testBll->getIdAnswer(),$tempQuestionId,$this->answer_good7,$this->answer_wrong17,$this->answer_wrong27,$this->answer_wrong37);


        if (isset($_POST['finalBtn'])) {
            $this->redirect("domains/index");
            //exit();
        }
       // $idTest = $this->testBll->getIdTest();
       // $idAnswer = $this->testBll->getIdAnswer();
      //  $this->testBll->insertAnswer($idAnswer,"q12","nik ","ciocanus","nicioasd asd","dfffasd");
        //INSERT INTO QUESTIONS_JFK (QUESTION_ID,DOMAIN_ID,TEST_ID,QUESTION) VALUES (q106,102,T16,Que pass my amigo)

       // print("geani nebunu");
//
    }
}