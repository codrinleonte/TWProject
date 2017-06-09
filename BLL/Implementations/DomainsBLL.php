<?php

/**
 * Created by PhpStorm.
 * User: Razvan
 * Date: 6/3/2017
 * Time: 00:21
 */
include ("BLL/Contracts/IDomainsBLL.php");
include ("DAL/Implementations/DomainsRepository.php");
class DomainsBLL implements IDomainsBLL
{
    private $repo;
    public function __construct(){
        $this->repo = new DomainsRepository();
    }

    public function getAll()
    {
        return $this->repo->getAll();
    }


//    public function get

}