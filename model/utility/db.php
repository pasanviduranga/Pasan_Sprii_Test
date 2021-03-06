<?php

/**
 * Database class. All database functionality was include this class.
 *
 * @author User
 */

final class Database {

    public static function inst() {
        static $inst = null;
        if($inst===null){
            $inst = new Database();
        }
        return $inst;
    }
    
    public function dbConnect(){
		
		$xml = simplexml_load_file('./etc/dbconfig.xml');
		
        $host = $xml->host;
        $user = $xml->user;
        $pass = $xml->pass;
        $dbName = $xml->dbname;
        
        $con = new mysqli($host,$user,$pass,$dbName);
        
        if($con->connect_errno){
            die("connot connect database".$con->connect_error);
        }else{
            return $con;
        }
    }
    
    public function execute_query($query,$con){
        $res = $con->query($query);
        return $res;
    }
	
	public function execute_query_with_last_id($query,$con){
        $con->query($query);
		return $con->insert_id;
    }
	
	public function escape_unwanted_string($val,$con){
        return mysqli_real_escape_string($con,strip_tags($val));
    }

}
