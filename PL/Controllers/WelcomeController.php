<?php

/**
 * Created by PhpStorm.
 * User: Razvan
 * Date: 6/3/2017
 * Time: 00:33
 */
require_once ("BaseController.php");
class WelcomeController extends BaseController
{
    public function index(){

        $this->loadView("html/login");
    }
}