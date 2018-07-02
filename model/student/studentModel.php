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

include 'class.database.php';
include 'class.utility.php';
class User {
    
    private $con = "";
    private $inst = "";
    public function __construct() {
        $this->inst = Database::inst();
        $this->con = $this->inst->dbConnect();
    }
    
    public function register($post){
        $util = Utility::Inst();
        
        $fname = $util->escape_unwanted_string($post['txtFname'], $this->con);
        $lname = $util->escape_unwanted_string($post['txtLname'], $this->con);
        $email = $util->escape_unwanted_string($post['txtEmail'], $this->con);
        $tele = $util->escape_unwanted_string($post['txtPhone'], $this->con);
        $pass = md5($util->escape_unwanted_string($post['txtPassword'], $this->con));
        
        $query = "INSERT INTO user(email,status,first_name,password,phone,last_name) VALUES('$email','ACTIVE','$fname','$pass','$tele','$lname')";
        
        $res = $this->inst->execute_query($query, $this->con);
        if(!$res){
            echo $this->con->error;
        }
    }
    
    public function authenticate($post){
        
        $util = new Utility();
        $uname = $util->escape_unwanted_string($post['txtUser'], $this->con);
        $pass = md5($util->escape_unwanted_string($post['txtPassword'], $this->con));
        
        $query = "SELECT first_name,last_name,email,password FROM user WHERE email='$uname' AND status='ACTIVE'";
        
        $res = $this->inst->execute_query($query, $this->con);
        if(!$res){
            echo $this->con->error;
        }else{
            $rec = $res->fetch_object();
            echo "<pre>";
            print_r($rec);
            if($pass === $rec->password){
                echo "login";
            }else{
                echo "error";
            }
        }
        
    }
}
