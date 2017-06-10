<?php

/**
 * Created by PhpStorm.
 * User: codry
 * Date: 6/4/2017
 * Time: 10:13 PM
 */
class AnswersBLL implements IAnswersBLL
{
    private $answersRepo;
    public function __construct(){
        $this->answersRepo = new AnswersRepository();
    }

    public function getAnswers($idQuestion)
    {
        return $this->getAnswers($idQuestion);
    }
    public function getCorrectAnswer($idQuestion)
    {
        return $this->getCorrectAnswer($idQuestion);
    }

}