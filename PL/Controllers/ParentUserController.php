<?php

/**
 * Created by PhpStorm.
 * User: codry
 * Date: 6/9/2017
 * Time: 10:07 AM
 */

require_once ("BaseController.php");
require_once ("BLL/Implementations/UserBLL.php");

class ParentUserController extends BaseController
{
    private $userBll;


    public function __construct()
    {
        parent::__construct();
        $this->userBll = new UserBLL();

    }

    public function index(){
        return $this->loadView("html/ParentUser/parentsHome");
    }
}