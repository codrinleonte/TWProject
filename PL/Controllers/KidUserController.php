<?php

/**
 * Created by PhpStorm.
 * User: codry
 * Date: 6/8/2017
 * Time: 11:45 AM
 */
require_once ("BaseController.php");
require_once ("BLL/Implementations/UserBLL.php");

class KidUserController extends BaseController
{
    private $userBll;

    public function __construct()
    {
        parent::__construct();
        $this->userBll = new UserBLL();
    }

    public function index(){
        return $this->loadView("html/KidUser/kids-user-first-page");
    }

    public function getTestData()
    {

        $domain =   $_POST['domain'] ;
        $difficulty=$_POST['difficulty'] ;
        $kidID = $_SESSION['user']['KID_USER_ID'];
        $testData= array("domain" => $domain,"difficulty"=>$difficulty,"id"=>$kidID);


        if (isset($_POST['start'])) {


                $test = $this->userBll->getAvailableTest($testData["domain"],$testData["difficulty"],$testData["id"]);
                print_r($test);
                exit(1);
                return $testData;
            }

    }



}