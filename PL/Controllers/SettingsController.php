<?php

/**
 * Created by PhpStorm.
 * User: codry
 * Date: 6/4/2017
 * Time: 11:17 AM
 */
require_once ("BaseController.php");
class SettingsController  extends BaseController
{
    public function deleteAccount(){
        $this->loadView("html/Shared/delete-account");
    }

    public function changePassword(){
        $this->loadView("html/Shared/change-password");
    }

    public function logout(){
        $this->loadView("html/Shared/login");
    }
}