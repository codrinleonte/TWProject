<?php
/**
 * Created by PhpStorm.
 * User: Razvan
 * Date: 6/2/2017
 * Time: 22:56
 */


class OracleDB
{

    private $username = "JFK";
    private $password = "JFK";
    private $connectionString = "localhost";

    private $conn;

    public function __construct(){
        $this->Connect();
    }

    public function Connect(){
        $this->conn = oci_connect($this->username, $this->password, $this->connectionString);
        if (!$this->conn) {
            $m = oci_error();
            echo $m['message'], "\n";
            exit;
        }
        return 1;
    }

    public function doQuery($query, $params){ //params = array('id'=>2)
        echo $query;
        echo $params;
        $stid = oci_parse($this->conn,$query);
//        $stid = oci_parse($this->conn,"SELECT * FROM TABLE WHERE ID=:ID");
//        print_r($query);print_r($params);exit();
        if(!empty($params)){
            foreach($params as $paramName=>$paramValue){
                oci_bind_by_name($stid, ":".$paramName, $params[$paramName]); //
                //echo($stid . " " . $paramName. " " . $params[$paramName]);
            }
        }

        oci_execute($stid);
        $row = oci_fetch_all($stid, $res, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        $res = empty($res)?null:$res;
        return $res;
//        var_dump($res);
    }

    public function getRows($table, $fields, $conditionString, $conditionParams, $join =""){
        $where = "";
        if($conditionString != '' && !empty($conditionParams)){
            $where = "where {$conditionString}";
        }
        $query = "SELECT {$fields} from {$table} {$join} {$where}";


        return $this->doQuery($query, $conditionParams);
    }

    public function insertRow($table, $row){
        $columns = $values = array();
        foreach($row as $column=>$value){
            array_push($columns, $column); // columns o sa fie array(test_id, score_id, user_id)
            array_push($values, $value); // values o sa fie array (t6, 1, 534)
        }

        $columnsString = "(" . implode(",", $columns) . ")"; // (test_id,score_id,user_id)
        $valuesString = "(" . implode(",", $values) . ")"; // (t6, 1, 534)

        return $this->doQuery("INSERT INTO {$table} {$columnsString} VALUES {$valuesString}", []);
    }

    public function updateRow($table, $row, $conditionArray){
        $where ='';
        $updates = $this->getStringOfColumnsFromArrayOfValues($row);

        if(!empty($conditionArray)){
            $condition = $this->getStringOfColumnsFromArrayOfValues($conditionArray);
            $where = "WHERE {$condition}";
        }

        $params = array_merge($this->getArrayOfParams($row), $this->getArrayOfParams($conditionArray));
        return $this->doQuery("UPDATE {$table} SET {$updates} {$where}", $params);
    }

    public function deleteRow($table, $condition, $params){
        return $this->doQuery("DELETE FROM {$table} WHERE {$condition}", $params);
    }


    private function getStringOfColumnsFromArrayOfValues($array){
        $updates  = array();
        foreach($array as $key=>$value){
            array_push($updates, "{$key}=:{$key}");
        }

        return implode(",", $updates);
    }

    private function getArrayOfParams($row){
        $values  = array();
        foreach($row as $key=>$value){
            array_push($values, $values);
        }

        return $values;
    }
}