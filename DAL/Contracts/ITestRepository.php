<?php

/**
 * Created by PhpStorm.
 * User: codry
 * Date: 6/4/2017
 * Time: 10:18 PM
 */
interface ITestRepository
{
    public function getAll();
    public function getById($id);
    public function insert($test);
    public function delete($id);
    public function getTestId();
    public function getQuestionId();
    public function getAnswerId();
    public function getAvailableTests($domain,$difficulty,$kidID);


    public function insertTest($testId,$proposerId,$domainId);
    public function insertQuestion($questionId,$testId,$domainId,$question);
    public function insertAnswer($answerId,$questionId,$corect,$wrong1,$wrong2,$wrong3);

    public function getDomainIdByDomainDifficulty($domain,$difficulty);
}