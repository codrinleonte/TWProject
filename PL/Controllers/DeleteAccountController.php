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


       // print_r( $currentPassword);
        if (isset($_POST['submit'])) {
            $typedUsername = $_POST['username'];
            $typedPassword = $_POST['password'];
            $retypedPassword = $_POST['passwordRetyped'];

            /*  print_r( $typedUsername);
              print_r( $typedPassword );
              print_r(  $retypedPassword );*/

            if ($_SESSION['user']['type'] == 2) {
                $currentId = $_SESSION['user']['PARENT_USER_ID'];
                $response = $this->userBll->deleteParentAccount($typedUsername, $typedPassword, $retypedPassword, $currentId);
            }
            else if ($_SESSION['user']['type'] == 1){
                $currentId = $_SESSION['user']['KID_USER_ID'];
                $response = $this->userBll->deleteKidAccount($typedUsername, $typedPassword, $retypedPassword, $currentId);
            }

            if($response == -1 ) {
                $message="Username gresit!";
            }
            else if($response == -2){
                $message="Parola incorecta!";
            }
            else if($response == -3){
                $message="Parolele nu coincid!";
            }
            else{
                $message="Ati sters conturile cu succes!";
                echo "<script type='text/javascript' >alert('$message') ;location.href='/tw/user/showlogin'</script>";
            }
            echo "<script type='text/javascript' >alert('$message') ;location.href='/tw/user/profile'</script>";


        }

    }

}