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
    public function __construct()
    {
        $this->repo = new DomainsRepository();
    }

    public function getAll()
    {
        return $this->repo->getAll();
    }

    public function getPercentagesForDomain($domainName)
    {
        return $this->repo->getPercentagesForDomain($domainName);
    }

    public function getDomainsStatistics()
    {
        $result = array();
        $domains = $this->repo->getAllMateriiDistributie();
        foreach($domains as $domain){
            $percentages = $this->repo->getPercentagesForDomain($domain['NUME_MATERIE']);
            $domainName = ucfirst(strtolower($domain['NUME_MATERIE']));
            $result[$domainName] = $percentages;
        }
        return $result;
    }
}
