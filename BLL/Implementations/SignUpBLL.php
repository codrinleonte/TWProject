<?php

/**
 * Created by PhpStorm.
 * User: Razvan
 * Date: 6/9/2017
 * Time: 9:09 AM
 */

require_once ("DAL/Implementations/UserRepository.php");
include ("BLL/Contracts/ISignUpBLL.php");
class SignUpBLL implements  ISignUpBLL
{
    private $userRepo;

    public function __construct()
    {
        $this->userRepo = new UserRepository();
    }

    public function signUpKid($KID_USR , $KID_PASS, $KID_FIRST_NAME ,$KID_LAST_NAME , $KID_BIRTH_DATE){
        $this->userRepo->signUpKid($KID_USR , $KID_PASS, $KID_FIRST_NAME ,$KID_LAST_NAME , $KID_BIRTH_DATE);
    }

    public function signUpParent($PARENT_USR , $PARENT_PASS , $PARENT_FIRST_NAME , $PARENT_LAST_NAME , $PARENT_MAIL , $PARENT_PHONE ){
        $this->userRepo->signUpParent($PARENT_USR , $PARENT_PASS , $PARENT_FIRST_NAME , $PARENT_LAST_NAME , $PARENT_MAIL , $PARENT_PHONE );
    }




}