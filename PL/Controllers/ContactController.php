<?php

/**
 * Created by PhpStorm.
 * User: codry
 * Date: 6/4/2017
 * Time: 11:14 AM
 */

require_once ("BaseController.php");
class ContactController extends BaseController
{
    public function index(){

        $this->loadView("html/Shared/contact");
    }
}


