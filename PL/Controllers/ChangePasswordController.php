<?php

/**
 * Created by PhpStorm.
 * User: codry
 * Date: 6/7/2017
 * Time: 12:54 AM
 */

require_once ("BaseController.php");
require_once ("BLL/Implementations/UserBLL.php");

class ChangePasswordController extends BaseController
{
    private $userBll;
    public function __construct()
    {
        parent::__construct();
        $this->userBll = new UserBLL();
        if(!isset($_SESSION['user']))
            $this->redirect("error/index");
    }

    public function index(){
        $this->loadView("html/Shared/change-password");
    }

    public function changePassword()
    {
        $type = $_SESSION['user']['type'];

        if ($type == 1) {
        $current_id = $_SESSION['user']['KID_USER_ID'];

        if (isset($_POST['submit'])) {
           $typedOldPassword = $_POST['oldPass'];
           $typedNewPassword = $_POST['newPass'];
           $retypedOldPassword = $_POST['newPassRetyped'];
               if(!$this->userBll->validateKidPassword($current_id,$typedOldPassword)){
                   $message="Parola veche introdusa este gresita!";


               }
               else if($typedNewPassword !=  $retypedOldPassword){
                   $message="Parolele nu coincid!";

               }
               else{
                    $this->userBll->updateKidPassword($current_id,$typedNewPassword);
                    $message="Parola a fost schimbata cu succes!";
               }
            echo "<script type='text/javascript' >alert('$message') ;location.href='/tw/user/profile'</script>";


    }

        }
        else if($type==2){
            $current_id = $_SESSION['user']['PARENT_USER_ID'];
            if (isset($_POST['submit'])) {
                $typedOldPassword = $_POST['oldPass'];
                $typedNewPassword = $_POST['newPass'];
                $retypedOldPassword = $_POST['newPassRetyped'];
                if(!$this->userBll->validateParentPassword($current_id,$typedOldPassword)){
                    $message="Parola veche introdusa este gresita!";


                }
                else if($typedNewPassword !=  $retypedOldPassword){
                    $message="Parolele nu coincid!";

                }
                else{
                    $this->userBll->updateParentPassword($current_id,$typedNewPassword);
                    $message="Parola a fost schimbata cu succes!";
                }
                echo "<script type='text/javascript' >alert('$message') ;location.href='/tw/user/profile'</script>";


            }
        }


    }

}