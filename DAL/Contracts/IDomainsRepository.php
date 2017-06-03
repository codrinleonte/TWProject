<?php
/**
 * Created by PhpStorm.
 * User: Razvan
 * Date: 6/3/2017
 * Time: 00:04
 */
interface IDomainsRepository{
    public function getAll();
    public function getById($id);
    public function insert($domain);
    public function update($domain, $id);
    public function delete($id);
}