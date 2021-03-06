<?php

/**
 * Created by PhpStorm.
 * User: codry
 * Date: 6/3/2017
 * Time: 11:54 PM
 */
interface IScoresRepository
{
    public function getAll();
    public function getById($id);
    public function insert($score);
    public function delete($id);
    public function getByUsername($id);
    public function getByDate($date);
    public function getLastId();
    public function getLastScores();
    public function getTopKids();
    public function getTopDomains();

}