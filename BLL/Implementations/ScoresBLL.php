<?php

/**
 * Created by PhpStorm.
 * User: Razvan
 * Date: 6/3/2017
 * Time: 02:43
 */

require_once("BLL/Contracts/IScoresBLL.php");
require_once("DAL/Implementations/ScoresRepository.php");

class ScoresBLL implements IScoresBll
{
    private $scoresRepo;

    public function __construct()
    {
        $this->scoresRepo = new ScoresRepository();
    }

    public function getAll()
    {
        $allScores = $this->scoresRepo->getAll();

        // print_r ($_SESSION['user']['USERNAME']);
        $userScores = $this->scoresRepo->getByUsername($_SESSION['user']['USERNAME']);

        $todayScores = $this->scoresRepo->getByDate(strtoupper(date("d-M-Y")));
//        print_r(strtoupper(date("d-M-y")));exit();
        return array("allScores" => $allScores, "userScores" => $userScores, "todayScores" => $todayScores);
    }

    public function getLastFiveScores(){
        return $this->scoresRepo->getLastScores();
    }


    public function getTopKids(){
        return $this->scoresRepo->getTopKids();
    }

    public function getTopDomains(){
        return $this->scoresRepo->getTopDomains();
    }


}