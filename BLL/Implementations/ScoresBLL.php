<?php

/**
 * Created by PhpStorm.
 * User: Razvan
 * Date: 6/3/2017
 * Time: 02:43
 */

require_once ("BLL/Contracts/IScoresBLL.php");
require_once ("DAL/Implementations/ScoresRepository.php");
class ScoresBLL implements IScoresBll
{
    private $scoresRepo;
    public function __construct()
    {
        $this->scoresRepo = new ScoresRepository();
    }

    public function getAll(){
        $allScores = $this->scoresRepo->getAll();
        $userScores = null;
            //$this->scoresRepo->getByUserId($_SESSION['user']['id']);
       $todayScores = null;//$this->scoresRepo->getByDate(date("dd-MMM-YY"));

        return array("allScores" => $allScores, "userScores"=>$userScores, "todayScores" => $todayScores);
    }
}