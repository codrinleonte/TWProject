<?php

/**
 * Created by PhpStorm.
 * User: codry
 * Date: 6/7/2017
 * Time: 9:27 PM
 */
require_once ("BaseController.php");
require_once ("BLL/Implementations/UserBLL.php");
class DeleteAccountController extends  BaseController
{
    private $userBll;
    public function __construct()
    {
        parent::__construct();
        $this->userBll = new UserBLL();
    }

    public function index(){
        $this->loadView("html/Shared/delete-account");
    }

    public function deleteAccount(){
        $currentUsername=$_SESSION['user']['USERNAME'];
        $currentPassword=$_SESSION['user']['PASS'];
        print_r(  $currentPassword);
        if (isset($_POST['submit'])) {
            $typedUsername= $_POST['username'];
            $typedPassword = $_POST['password'];
            print_r( $typedUsername);
            print_r( $typedPassword );
            $retypedPassword = $_POST['passwordRetyped'];
            print_r(  $retypedPassword );
            if( $currentUsername !=  $typedUsername){
                print_r("Username gresit!");
            }
            else if($typedPassword  !=  $currentPassword){
                print_r("Parola incorecta!");
            }
            else if($typedPassword !=$retypedPassword){
                print_r("Parolele nu coincid!");
            }
            else{
                $this->userBll->deleteKidAccound($typedUsername,$typedPassword);
               // $this->redirect("user/showlogin") ;
            }

        }

    }

}