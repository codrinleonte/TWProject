<?php
/**
 * Created by PhpStorm.
 * User: Razvan
 * Date: 6/3/2017
 * Time: 11:31
 */

interface IUserBLL{

    public function checkParentsLogin($user, $pass);
    public function validateParentPassword($id, $pass);
    public function validateParentUsername($id, $username);
    public function  deleteParentAccount($username,$pass,$passRet, $idParent);

    public function checkKidsLogin($user, $pass);
    public function updateKidPassword($id, $password);
    public function  deleteKidAccount($username,$pass,$passRet, $idParent);

    public function getAvailableTest($domain, $difficulty, $kidID);
}