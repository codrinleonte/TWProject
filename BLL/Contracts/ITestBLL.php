<?php

/**
 * Created by PhpStorm.
 * User: codry
 * Date: 6/4/2017
 * Time: 10:26 PM
 */
interface ITestBLL
{

    public function scoreCalculator($questionsList,$answersGiven);
    public function shuffleAnswers($answers);
    public function isCorrectAnswer($idQuestion,$answer);
    public function insertScore($score,$testId, $kidId);


}