<?php

/**
 * Created by PhpStorm.
 * User: Razvan
 * Date: 6/3/2017
 * Time: 11:32
 */

include ("BLL/Contracts/IUserBLL.php");
include ("DAL/Implementations/KidsUsersRepository.php");
class UserBLL implements IUserBLL
{

    private $kidsUserRepo;
    public function __construct()
    {
        $this->kidsUserRepo = new KidsUsersRepository();
    }

    public function checkKidsLogin($user, $pass)
    {
        $user = $this->kidsUserRepo->getByUsernamePass(" username=:myuser and pass =:mypass", array("myuser"=>$user, "mypass"=>$pass));
//        $user = $this->userRepo->getOneWhere("username = :username and pass= :pass", array("username"=>"patras.scortanu", "pass" => "PATRAS1"));
        return $user?$user:false;
    }
}