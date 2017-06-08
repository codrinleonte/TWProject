<?php

/**
 * Created by PhpStorm.
 * User: codry
 * Date: 6/4/2017
 * Time: 9:51 PM
 */
interface IAnswersRepository
{
    public function getCorrectAnswer($idQuestion);
    public function getAnswers($idQuestion);
}