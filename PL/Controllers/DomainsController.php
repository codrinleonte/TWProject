<?php

/**
 * Created by PhpStorm.
 * User: Razvan
 * Date: 6/3/2017
 * Time: 00:26
 */
require_once ("BaseController.php");
require_once ("BLL/Implementations/DomainsBLL.php");
class DomainsController extends BaseController
{
    private $domainsBll;
    public function __construct()
    {
        parent::__construct();
        $this->domainsBll = new DomainsBLL();
    }

    public function index(){
        $domainsList = '';
        $domains = $this->domainsBll->getAll();

//        mail("radeanu.razvan99@gmail.com", "Subiect", "test");

        foreach($domains as $domain){
            $domainsList .= "<li>{$domain['DOMAIN']} is {$domain['DIFFICULTY']}</li>";
        }

//        $username = $_SESSION['user']['username'];
        $username = "Razvan";
        $data = array("domainsList" => $domainsList, "title" => "Pagina cu domenii", "user"=>$username);
        $this->loadView("domains-list", $data);
    }

    public function asd($a, $b, $c){
        echo $a, $b, $c;
    }

    public function scores(){

    }

}