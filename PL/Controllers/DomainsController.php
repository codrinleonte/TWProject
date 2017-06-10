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
        $statistics = "";
        $domainsStatistics = $this->domainsBll->getDomainsStatistics();
        foreach($domainsStatistics as$domainName => $domainPercentages){
            $statistics .= $this->renderStatistic($domainName, $domainPercentages);
        }
        $this->loadView("html/ParentUser/parentsHome", array("statistics"=> $statistics));//, "geography"=>$geography, "biology"=>$biology,"english"=>$english,"history"=>$history));
    }


    private function renderStatistic($domain, $percentages){
        return $this->renderView("templates/statistics/statistics.container", array(
            "domain" => $domain,
            "percentageEasy" =>$percentages[0]["PROCENTAJ"],
            "percentageMedium" =>$percentages[1]["PROCENTAJ"],
            "percentageHard" =>$percentages[2]["PROCENTAJ"],
        ));
    }

}