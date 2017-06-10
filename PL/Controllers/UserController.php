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
            $template = "kidUser/index";
        }
        else{
            $template = "domains/index";
        }
        $this->redirect($template);
    }

    public function login(){


        $username = $this->getFromPost("username");
        $password = $this->getFromPost("password");
        $type = $this->getFromPost("userType");

       // echo($username . " " . $password);
       // echo("\n");
        //$user = $this->userBll->checkKidsLogin($username, $password);
        //echo($user);


        if( $type == 1){
            $user = $this->userBll->checkKidsLogin($username, $password);
            if($user) {
                $_SESSION['user'] = $user[0];
                $_SESSION['user']['type'] = $type;

                $this->redirect("user/profile");
//            $this->loadView("html/kids-user-first-page");
            }
            else {
                exit("Wrong input data.Try again");
            }
        }
        else if ($type == 2){
            $user = $this->userBll->checkParentsLogin($username, $password);
            if($user) {
                $_SESSION['user'] = $user[0];
                $_SESSION['user']['type'] = $type;

                $this->redirect("user/profile");
            }
            else {
                exit("Wrong input data.Try again");
            }
        }

    }

    public function logout(){
        session_destroy();
        $this->redirect("user/showlogin");
    }

    public function changePassword(){
        $this->redirect("changePassword/index");
    }
    public function deleteAccount(){
        $this->redirect("deleteAccount/index");
    }

    public function admin(){
        $this->redirect();
    }
}