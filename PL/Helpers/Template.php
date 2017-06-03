<?php

/**
 * Created by PhpStorm.
 * User: Razvan
 * Date: 6/3/2017
 * Time: 00:49
 */
class Template
{
    private $templateFile;
    private $paramsArray;

    private $startingDelimiter = "{";
    private $endingDelimiter = "}";
    public function __construct($file = ""){
        if($file != ""){
            $this->setFile($file);
        }
        $this->paramsArray = [];
    }
    public function setParams($params){
        $this->paramsArray = $params;
    }

    public function render(){
        if(!empty($this->paramsArray)){
            $explosion = $this->explodeParamsArray();
            $flags = $explosion['flags'];
            $values = $explosion['values'];
            return str_replace($flags, $values, $this->templateFile);
        }
        return $this->templateFile;
    }

    public function setFile($file){
        $fileName = "PL/Interface/".$file.".html";
        if(!file_exists($fileName)) exit("Template error: File {$fileName} doesn't exist!");
        $this->templateFile = file_get_contents($fileName);
    }

    private function explodeParamsArray(){
        $flags = $values = array();
        foreach($this->paramsArray as $key=>$value){
            array_push($flags, $this->startingDelimiter.$key.$this->endingDelimiter);
            array_push($values, $value);
        }
        return array('flags'=>$flags, 'values'=>$values);
    }
}