<?php

/**
 * Created by PhpStorm.
 * User: Razvan
 * Date: 6/3/2017
 * Time: 00:47
 */
require_once("PL/Helpers/Template.php");
class BaseController
{
    private $template;
    private $base_url = "http://localhost:8181/tw/";
    public function __construct()
    {
        $this->template = new Template();
    }

    public function getFromPost($key, $is_int = false){
        if($is_int)
            return (int)$_POST[$key];
        return $_POST[$key];
    }

    public function getFromGet($key, $is_int = false){
        if($is_int)
            return (int)$_GET[$key];
        return $_GET[$key];
    }

    public function redirect($url){
        header("Location: {$this->base_url}{$url}");
    }

    public function renderView($view, $data){
        $this->template->setFile($view);
        $this->template->setParams($data);
        return $this->template->render();
    }

    public function loadView($view, $data=[]){
        echo $this->renderView($view, $data);
    }
}