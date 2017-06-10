<?php

/**
 * Created by PhpStorm.
 * User: codry
 * Date: 6/10/2017
 * Time: 1:35 PM
 */
require_once ("BaseController.php");
class ErrorController extends BaseController
{
    public function index(){
      $this->loadView("html/Shared/errors");
    }
}