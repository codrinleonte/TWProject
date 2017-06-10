<?php

/**
 * Created by PhpStorm.
 * User: Razvan
 * Date: 6/9/2017
 * Time: 12:09 AM
 */


require_once("DAL/OracleDB.php");
require_once ("DAL/Contracts/IUserRepository.php");
class UserRepository
{
    private $oracleDB;

    public function __construct()
    {
        $this->oracleDB = new OracleDB();
    }


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