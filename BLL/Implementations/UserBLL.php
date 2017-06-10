<?php

/**
 * Created by PhpStorm.
 * User: Razvan
 * Date: 6/3/2017
 * Time: 11:32
 */

include ("BLL/Contracts/IUserBLL.php");
include ("DAL/Implementations/KidsUsersRepository.php");
include ("DAL/Implementations/ParentsUsersRepository.php");
include ("DAL/Implementations/TestRepository.php");
class UserBLL implements IUserBLL
{

    private $kidsUserRepo;
    private $testRepo;
    private $parentRepo;

    public function __construct()
    {
        $this->kidsUserRepo = new KidsUsersRepository();
        $this->testRepo = new TestRepository();
        $this->parentRepo = new ParentsUsersRepository();
    }

    public function checkKidsLogin($user, $pass)
    {
        $user = $this->kidsUserRepo->getByUsernamePass(" username=:myuser and pass =:mypass and active = 1", array("myuser" => $user, "mypass" => $pass));
//        $user = $this->userRepo->getOneWhere("username = :username and pass= :pass", array("username"=>"patras.scortanu", "pass" => "PATRAS1"));
        return $user ? $user : false;
    }
    public function checkParentsLogin($user, $pass)
    {
        $user = $this->parentRepo->getByUsernamePass(" username=:myuser and pass =:mypass and active = 1", array("myuser" => $user, "mypass" => $pass));
//
        return $user ? $user : false;
    }


    /**
     * @param $id
     * @param $pass
     * @return bool|null
     */
    public function validateKidPassword($id, $pass)
    {
        $user = $this->kidsUserRepo->validateKidPassword(" kid_user_id=:myid and pass =:mypass" , array("myid" => $id, "mypass" => $pass));
        return $user ? $user : false;
    }
    public function validateParentPassword($id, $pass)
    {
        $user = $this->parentRepo->validateParentPassword(" parent_user_id=:myid and pass =:mypass" , array("myid" => $id, "mypass" => $pass));
        return $user ? $user : false;
    }

    public function validateParentUsername($id, $username)
    {
        $user = $this->parentRepo->validateParentUsername(" parent_user_id=:myid and username =:myusername", array("myid" => $id, "myusername" => $username));
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

    public function updateParentPassword($id, $password)
    {
        $parentUser = array("PASS" => $password);

        return $this->parentRepo->updatePassword($parentUser, array("PARENT_USER_ID" => $id));

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


    /**
     * @param $username
     * @param $pass
     * @param $passRet
     * @param $idParent
     * @return int
     */
    public function  deleteParentAccount($username, $pass, $passRet, $idParent){
        if($pass != $passRet){
            return -3;
        }
        else if(!$this->parentRepo->validateParentPassword(" parent_user_id =: myid and pass =:mypass" ,
            array("myid"=>$idParent,"mypass"=>$pass))){
            return -2;
        }
        else if(!$this->parentRepo->validateParentUsername(" parent_user_id =: myid and username =:myusername" ,
            array("myid"=>$idParent,"myusername"=>$username))) {
            return -1;
        }
        else {
            $user = array("active" => 0);
            $this->parentRepo->deleteParentAccount($user,array("parent_user_id"=>$idParent));
            return 0;
        }


    }



    public function  deleteKidAccount($username, $pass, $passRet, $idKid){
        if($pass != $passRet){
            return -3;
        }
        else if(!$this->kidsUserRepo->validateKidPassword(" kid_user_id =: myid and pass =:mypass" ,
            array("myid"=> $idKid,"mypass"=>$pass))){
            return -2;
        }
        else if(!$this->kidsUserRepo->validateKidUsername(" kid_user_id =: myid and username =:myusername" ,
            array("myid"=> $idKid,"myusername"=>$username))) {
            return -1;
        }
        else {
            $user = array("active" => 0);
            $this->kidsUserRepo->deleteKidAccount($user,array("kid_user_id"=> $idKid));
            return 0;
        }


    }
}



