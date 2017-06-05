<?php

/**
 * Created by PhpStorm.
 * User: codry
 * Date: 6/4/2017
 * Time: 10:24 PM
 */
require_once ("BaseController.php");
require_once ("BLL/Implementations/TestMaker.php");
class CompleteATestController  extends BaseController
{
    private $testMaker;

    public function __construct(){
        parent::__construct();
        $this->testMaker = new TestMaker();
}


    public function index(){
        $this->loadView("html/KidUser/kids-test-page");
    }

    public function displayQuestions(){

    }

    public function displayAnswers(){

    }

}