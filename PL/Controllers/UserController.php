<?php

/**
 * Created by PhpStorm.
 * User: Razvan
 * Date: 6/3/2017
 * Time: 11:34
 */
require_once ("BaseController.php");
require_once ("BLL/Implementations/UserBLL.php");
class UserController extends BaseController
{
    private $userBll;
    public function __construct()
    {
        parent::__construct();
        $this->userBll = new UserBLL();
    }

    public function showLogin(){
        $this->loadView("html/login");
    }

    public function profile(){
        $this->loadView("html/kids-user-first-page");
    }

    public function login(){
        
        $username = $this->getFromPost("username");
        $password = $this->getFromPost("password");

       // echo($username . " " . $password);
       // echo("\n");
        //$user = $this->userBll->checkKidsLogin($username, $password);
        //echo($user);
        if($user = $this->userBll->checkKidsLogin($username, $password)){

            $_SESSION['user'] = $user[0];
            $this->redirect("user/profile");
//            $this->loadView("html/kids-user-first-page");

        } else {
            exit("Wrong input data.Try again");
        }
    }

    public function logout(){
        session_destroy();
        $this->redirect("user/showlogin");
    }
}