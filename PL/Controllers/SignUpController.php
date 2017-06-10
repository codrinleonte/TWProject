<?php

/**
 * Created by PhpStorm.
 * User: Razvan
 * Date: 6/9/2017
 * Time: 9:49 AM
 */

require_once ("BaseController.php");
require_once ("BLL/Implementations/SignUpBLL.php");
class SignUpController extends BaseController
{
    private $SignUpBLL;
    private $P_username,$P_pass,$P_firstname,$P_lastname,$P_mail,$P_phone;
    private $K_username,$K_pass,$K_firstname,$K_lastname,$K_birthdate;
    public function __construct()
    {
        parent::__construct();
        $this->SignUpBLL = new SignUpBLL();
    }

    public function index(){
        $this->loadView("html/Shared/signUp");
    }

    public function signUpFamilly(){
        if(isset($_POST['parentFirstName'])){
            $this->P_firstname = $_POST['parentFirstName'];

        }
        if(isset($_POST['parentLastName'])){
            $this->P_lastname = $_POST['parentLastName'];
        }
        if(isset($_POST['parentEmail'])){
            $this->P_mail = $_POST['parentEmail'];
        }
        if(isset($_POST['parentFirstName'])){
            $this->P_username = $_POST['parentUname'];
        }
        if(isset($_POST['parentFirstName'])){
            $this->P_pass = $_POST['parentPsw'];
        }
        if(isset($_POST['parentFirstName'])){
            $this->P_phone = $_POST['parentNumber'];
        }



        if(isset($_POST['kidFirstname'])){
            $this->K_firstname = $_POST['kidFirstname'];
        }
        if(isset($_POST['kidLastname'])){
            $this->K_lastname = $_POST['kidLastname'];
        }
        if(isset($_POST['kidUname'])){
            $this->K_username = $_POST['kidUname'];
        }
        if(isset($_POST['kidPsw'])){
            $this->K_pass = $_POST['kidPsw'];
        }
        if(isset($_POST['kidDate'])){
            $this->K_birthdate = $_POST['kidDate'];
        }



        if(isset($_POST['signUp'])) {

            try {
              $this->SignUpBLL->signUpParent($this->P_username, $this->P_pass, $this->P_firstname, $this->P_lastname, $this->P_mail, $this->P_phone);
                $this->SignUpBLL->signUpKid($this->K_username, $this->K_pass, $this->K_firstname, $this->K_lastname, $this->K_birthdate);
            } catch (Exception $e) {
                //print_r($e);
                echo $e->getMessage();
                echo "Atentie la inroducerea datelor, mail-ul, data sau/si numarul de telefon este/sunt invalide!<br />";
            }
           $this->loadView("html/shared/login");


        }
    }


}