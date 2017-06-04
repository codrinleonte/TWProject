<?php

/**
 * Created by PhpStorm.
 * User: codry
 * Date: 6/3/2017
 * Time: 10:56 PM
 */
require_once ("BaseController.php");
class TestController extends BaseController
{
    public function completeTest(){
        $this->loadView("html/KidUser/kids-test-page");
    }

}