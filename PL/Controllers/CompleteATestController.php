<?php

/**
 * Created by PhpStorm.
 * User: codry
 * Date: 6/4/2017
 * Time: 10:24 PM
 */
require_once ("BaseController.php");
<<<<<<< HEAD
require_once ("BLL/Implementations/TestsBLL.php");
=======
require_once ("BLL/Implementations/TestMaker.php");
>>>>>>> dadc836a9364850c83abe9285bf9c6d167a9977c
class CompleteATestController  extends BaseController
{
    private $testMaker;

<<<<<<< HEAD

    public function __construct(){
        parent::__construct();
        $this->testMaker = new TestsBLL();

=======
    public function __construct(){
        parent::__construct();
        $this->testMaker = new TestMaker();
>>>>>>> dadc836a9364850c83abe9285bf9c6d167a9977c
}


    public function index(){
        $this->loadView("html/KidUser/kids-test-page");
    }

<<<<<<< HEAD
    public function getValidTest(){

    }

    public function displayQuestions(){
    
=======
    public function displayQuestions(){

>>>>>>> dadc836a9364850c83abe9285bf9c6d167a9977c
    }

    public function displayAnswers(){

    }

}