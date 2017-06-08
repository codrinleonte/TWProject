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
<<<<<<< HEAD
    private $testRepo;
    public function __construct()
    {
=======
    public function __construct(){
>>>>>>> dadc836a9364850c83abe9285bf9c6d167a9977c
        $this->kidsUserRepo = new KidsUsersRepository();
        $this->testRepo = new TestRepository();
    }

<<<<<<< HEAD
    public function checkKidsLogin($user, $pass)
    {
        $user = $this->kidsUserRepo->getByUsernamePass(" username=:myuser and pass =:mypass", array("myuser" => $user, "mypass" => $pass));
=======
    public function checkKidsLogin($user, $pass){
        $user = $this->kidsUserRepo->getByUsernamePass(" username=:myuser and pass =:mypass", array("myuser"=>$user, "mypass"=>$pass));
>>>>>>> dadc836a9364850c83abe9285bf9c6d167a9977c
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



