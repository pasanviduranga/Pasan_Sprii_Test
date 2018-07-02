<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of class
 *
 * @author User
 */

include_once './model/utility/db.php';
class Subject {
    
    private $con = "";
    private $inst = "";
    public function __construct() {
        $this->inst = Database::inst();
        $this->con = $this->inst->dbConnect();
    }
    
    public function loadSubject(){
        
        $query = "SELECT id,subject FROM subject WHERE status='ACTIVE'";
        
        $res = $this->inst->execute_query($query, $this->con);
        if(!$res){
            echo $this->con->error;
        }else{
			return $res;
        }
        
    }
}
