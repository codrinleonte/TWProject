<?php

/**
 * Created by PhpStorm.
 * User: codry
 * Date: 6/3/2017
 * Time: 10:56 PM
 */
require_once("BaseController.php");
require_once("BLL/Implementations/TestsBLL.php");

class TestController extends BaseController
{
    private $testBLL;

    public function __construct()
    {
        $this->testBLL = new TestsBLL();
        if(!isset($_SESSION['user']))
            $this->redirect("error/index");
    }

    public function index()
    {

        $this->loadView("html/KidUser/kids-test-page");
    }

    public function insertScore()
    {


        if (!isset($_POST['score']) || !isset($_POST['testId']) || empty($_POST['score']) || empty($_POST['testId'])) {
           exit("");
        }

        $score = $this->getFromPost('score');
        $testId = $this->getFromPost('testId');
        $kidId = $_SESSION['user']['KID_USER_ID'];


        $this->testBLL->insertScore($score, $testId,$kidId);


    }

}