<?php

/**
 * Created by PhpStorm.
 * User: Razvan
 * Date: 6/3/2017
 * Time: 00:05
 */
include("DAL/OracleDB.php");
include ("DAL/Contracts/IDomainsRepository.php");

class DomainsRepository implements IDomainsRepository
{
    private $oracleDB;
    private $table = "domains";
    private $fields = "*";
    public function __construct()
    {
        $this->oracleDB = new OracleDB();
    }

    public function getAll()
    {
        return $this->oracleDB->getRows($this->table, $this->fields, '', []);
//        return $this->oracleDB->getRows("kids_users k", "k.username, k.first_name, p.first_name as parent_first_name", "where kid_user_id = :id and parent_user_id = :id2", array("id"=>2, "id2"=>5), "join parents_users p on p.parent_user_id = k.parent_user_id");
    }

    public function getById($id)
    {
        return $this->oracleDB->getRows($this->table, $this->fields, "id=:id", array("id"=>$id));
    }

    public function insert($domain)
    {
        return $this->oracleDB->insertRow($this->table, $domain);
    }

    public function update($domain, $id)
    {
        return $this->oracleDB->updateRow($this->table, $domain, array("id"=>$id));
    }

    public function delete($id)
    {
        return $this->oracleDB->deleteRow($this->table, "id=:id", array("id"=>$id));
    }


    public function getAllMateriiDistributie(){
        return $this->oracleDB->getRows("materii_distributie", "*", '', []);
    }

    public function getPercentagesForDomain($domainName){
        return $this->oracleDB->getRows("MATERII_DISTRIBUTIE", "procentaj, nivel_dificultate", "nume_materie = :numeMaterie", array("numeMaterie" => $domainName));
    }
}