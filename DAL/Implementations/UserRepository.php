<?php

/**
 * Created by PhpStorm.
 * User: Razvan
 * Date: 6/9/2017
 * Time: 12:09 AM
 */


require_once("DAL/OracleDB.php");
require_once ("DAL/Contracts/IUserRepository.php");
class UserRepository implements IUserRepository
{
    private $oracleDB;
    private $table = "domains";
    private $fields = "*";
    public function __construct()
    {
        $this->oracleDB = new OracleDB();
    }

    public function getAll()
    {
        return $this->oracleDB->getRows($this->table, $this->fields, '', []);
//        return $this->oracleDB->getRows("kids_users k", "k.username, k.first_name, p.first_name as parent_first_name", "where kid_user_id = :id and parent_user_id = :id2", array("id"=>2, "id2"=>5), "join parents_users p on p.parent_user_id = k.parent_user_id");
    }

    public function getById($id)
    {
        return $this->oracleDB->getRows($this->table, $this->fields, "id=:id", array("id"=>$id));
    }

    public function insert($domain)
    {
        return $this->oracleDB->insertRow($this->table, $domain);
    }

    public function update($domain, $id)
    {
        return $this->oracleDB->updateRow($this->table, $domain, array("id"=>$id));
    }

    public function delete($id)
    {
        return $this->oracleDB->deleteRow($this->table, "id=:id", array("id"=>$id));
    }


    public function getByUsernamePass($conditionString, $conditionParams){}

    public function updatePassword($updates, $conditionParams){}

    public function signUpKid($KID_USR , $KID_PASS, $KID_FIRST_NAME ,$KID_LAST_NAME , $KID_BIRTH_DATE ){
        $signUP = 'begin
PRELUCRARE_DATE_JFK.SIGN_UP(:KID_USR,:KID_PASS,:KID_FIRST_NAME,:KID_LAST_NAME,:KID_BIRTH_DATE);
end;';


        $compiled = oci_parse($this->oracleDB->getConn(), $signUP);
        oci_bind_by_name($compiled, ':KID_USR', $KID_USR);
        oci_bind_by_name($compiled, ':KID_PASS',$KID_PASS);
        oci_bind_by_name($compiled, ':KID_FIRST_NAME', $KID_FIRST_NAME);
        oci_bind_by_name($compiled, ':KID_LAST_NAME', $KID_LAST_NAME);
        oci_bind_by_name($compiled, ':KID_BIRTH_DATE', $KID_BIRTH_DATE);
        oci_execute($compiled);
    }


    public function signUpParent($PARENT_USR , $PARENT_PASS , $PARENT_FIRST_NAME , $PARENT_LAST_NAME , $PARENT_MAIL , $PARENT_PHONE ){
        $signUP = 'begin
PRELUCRARE_DATE_JFK.SIGN_UP(:PARENT_USR ,:PARENT_PASS ,:PARENT_FIRST_NAME ,:PARENT_LAST_NAME ,:PARENT_MAIL ,:PARENT_PHONE);
end;';


        $compiled = oci_parse($this->oracleDB->getConn(), $signUP);
        oci_bind_by_name($compiled, ':PARENT_USR', $PARENT_USR);
        oci_bind_by_name($compiled, ':PARENT_PASS',$PARENT_PASS);
        oci_bind_by_name($compiled, ':PARENT_FIRST_NAME', $PARENT_FIRST_NAME);
        oci_bind_by_name($compiled, ':PARENT_LAST_NAME', $PARENT_LAST_NAME);
        oci_bind_by_name($compiled, ':PARENT_MAIL', $PARENT_MAIL);
        oci_bind_by_name($compiled, ':PARENT_PHONE', $PARENT_PHONE);
        oci_execute($compiled);
    }

}