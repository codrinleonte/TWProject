<?php

/**
 * Created by PhpStorm.
 * User: codry
 * Date: 6/4/2017
 * Time: 10:06 PM
 */
interface IAnswersBLL
{
    public function getCorrectAnswer($idQuestion);
    public function getAnswers($idQuestion);
}