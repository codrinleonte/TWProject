<?php

/**
 * Created by PhpStorm.
 * User: Razvan
 * Date: 6/3/2017
 * Time: 11:32
 */

include ("BLL/Contracts/IUserBLL.php");
include ("DAL/Implementations/KidsUsersRepository.php");
include ("DAL/Implementations/TestRepository.php");
class UserBLL implements IUserBLL
{

    private $kidsUserRepo;
    private $testRepo;
    public function __construct()
    {
        $this->kidsUserRepo = new KidsUsersRepository();
        $this->testRepo = new TestRepository();
    }

    public function checkKidsLogin($user, $pass)
    {
        $user = $this->kidsUserRepo->getByUsernamePass(" username=:myuser and pass =:mypass", array("myuser" => $user, "mypass" => $pass));
//        $user = $this->userRepo->getOneWhere("username = :username and pass= :pass", array("username"=>"patras.scortanu", "pass" => "PATRAS1"));
        return $user ? $user : false;
    }

    public function validateKidPassword($id, $pass)
    {
        $user = $this->kidsUserRepo->validatePassword(" kid_user_id=:myid and pass =:mypass", array("myid" => $id, "mypass" => $pass));
        return $user ? $user : false;
    }

    /**
     * @param $id
     * @param $password
     * @return bool|null
     */
    public function updateKidPassword($id, $password)
    {
        $kidUser = array("PASS" => $password);

        return $this->kidsUserRepo->updatePassword($kidUser, array("KID_USER_ID" => $id));

    }

    /**
     * @param $username
     * @param $password
     * @return bool
     */
    public function getAvailableTest($domain, $difficulty, $kidID)
    {
        $questions = $this->testRepo->getAvailableTests($domain, $difficulty, $kidID);
        if ($questions == null)
            return false;
        else
            return $questions[0];
    }
}



