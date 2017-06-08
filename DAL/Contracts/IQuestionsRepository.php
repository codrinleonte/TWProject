<?php

/**
 * Created by PhpStorm.
 * User: codry
 * Date: 6/4/2017
 * Time: 8:19 PM
 */
interface IQuestionsRepository{

    public function getQuestionById($idQuestion);
    public function getQuestionsFromTest($idTest);


}