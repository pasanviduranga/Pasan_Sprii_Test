<?php

/*
 * All the functions related to the student
 */

include_once './model/utility/db.php';
class Student {
    
    private $con = "";
    private $inst = "";
	private $error = "";
    public function __construct() {
        $this->inst = Database::inst();
        $this->con = $this->inst->dbConnect();
    }
    /**
	* Save Student Details
	* @param mixed[] $post Form Values
	* @return string Return error or success
	*/
    public function saveDetail($post){
		
		$fname = $this->inst->escape_unwanted_string($post['txtFname'], $this->con);
		$lname = $this->inst->escape_unwanted_string($post['txtLname'], $this->con);
		if(isset($post['selSubject'])){
			$subjects = $post['selSubject'];
		}else{
			$subjects = "";
		}
		
		$validate = $this->validate($fname,$lname,$subjects);
		if($validate){
        
			$query = "INSERT INTO student(first_name,last_name) VALUES('$fname','$lname')";
			
			$studet_id = $this->inst->execute_query_with_last_id($query, $this->con);
			
			$suject_count = count($subjects);
			for($i=0;$i < $suject_count; $i++){
				$suject_id = $subjects[$i];
				$query = "INSERT INTO student_subject(student_id,subject_id) VALUES('$studet_id','$suject_id')";
				$this->inst->execute_query($query, $this->con);
			}
			unset($_SESSION["fname"]);
			unset($_SESSION["lname"]);
			unset($_SESSION["subjects"]);
			$this->error = "";
			$ret = "success";
		}else{
			$_SESSION["fname"] = $fname;
			$_SESSION["lname"] = $lname;
			$_SESSION["subjects"] = $subjects;
			$ret = $this->error;
		}
		
		return $ret;
    }
    
	/**
	* Validate form values
	*
	* @param string $fname First Name value
	* @param string $lname Lanst Name value
	* @param mixed[] $subjects Array or text
	*
	* @return boolean
	*/
    private function validate($fname,$lname,$subjects){
		
		$ret = true;
		
		if(empty($fname)){
			$this->error .= "First Name is required field<br />";
			$ret = false;
		}
		
		if (!preg_match("/^[a-zA-Z ]*$/", $fname)) {
			$this->error .= "Only letters and white space are allowed in First Name<br />";
			$ret = false;
		}
		if(empty($lname)){
			$this->error .= "Last Name is required field<br />";
			$ret = false;
		}
		
		if (!preg_match("/^[a-zA-Z ]*$/", $lname)) {
			$this->error .= "Only letters and white space are allowed in Last Name<br />";
			$ret = false;
		}
		if(empty($subjects)){
			$this->error .= "Subjects is required field<br />";
			$ret = false;
		}
		return $ret;
	}
	
	/**
	* Load all active student list
	*
	* @return result $res
	*/
	public function loadStudentList(){
		$query = "SELECT id,first_name,last_name FROM student WHERE status='ACTIVE'";
        
        $res = $this->inst->execute_query($query, $this->con);
        if(!$res){
            echo $this->con->error;
        }else{
			return $res;
        }
	}
}
