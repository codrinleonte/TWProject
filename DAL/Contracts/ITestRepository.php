<?php


interface ITestRepository
{
    
    public function getById($id);
    public function insert($test);
    public function delete($id);
   

    public function getAll();
    public function insertTest($testId,$proposerId,$domainId);
    public function insertQuestion($questionId,$testId,$domainId,$question);
    public function insertAnswer($answerId,$questionId,$corect,$wrong1,$wrong2,$wrong3);
    public function getTestId();
    public function getQuestionId();
    public function getAnswerId();
    public function getDomainIdByDomainDifficulty($domain,$difficulty);

}
