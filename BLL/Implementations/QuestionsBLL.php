<?php

/**
 * Created by PhpStorm.
 * User: codry
 * Date: 6/4/2017
 * Time: 10:06 PM
 */
class QuestionsBLL implements IQuestionsBLL
{
    private $questionsRepo;

    public function __construct()
    {
        $this->questionsRepo = new QuestionsRepository();
    }

    public function getQuestionById($idQuestion){
        return $this->getQuestionById($idQuestion);
    }

    public function getQuestionsFromTest($idTest){
        return $this -> getQuestionsFromTest($idTest);
    }
}