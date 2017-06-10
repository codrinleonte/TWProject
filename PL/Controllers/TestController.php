<?php

/**
 * Created by PhpStorm.
 * User: codry
 * Date: 6/3/2017
 * Time: 10:56 PM
 */
require_once("BaseController.php");

class TestController extends BaseController
{
    private $testBLL;
    public function __construct()
    {
        $this->testBLL = new TestsBLL();
    }
    public function index()
    {

        $this->loadView("html/KidUser/kids-test-page");
    }

    public function insert(){
        if(!isset($_POST['score']) || !isset($_POST['testId']) || empty($_POST['score']) || empty($_POST['testId']) ){
            exit();
        }
        $score = $this->getFromPost('score');
        $testId = $this->getFromPost('testId');
        $this->testBLL->insertScore($score, $testId);
    }

}