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
        $this->loadView("html/Shared/login");
    }

    public function profile(){

        if($_SESSION['user']['type'] == 1){
            $template = "html/KidUser/kids-user-first-page";
        }
        else{
            $template = "html/ParentsUser/parentsHome";
        }
        $this->loadView($template);
    }

    public function login(){
        
        $username = $this->getFromPost("username");
        $password = $this->getFromPost("password");
        $type = $this->getFromPost("userType");

       // echo($username . " " . $password);
       // echo("\n");
        //$user = $this->userBll->checkKidsLogin($username, $password);
        //echo($user);
        if($user = $this->userBll->checkKidsLogin($username, $password)){

            $_SESSION['user'] = $user[0];
            $_SESSION['user']['type']=$type;
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