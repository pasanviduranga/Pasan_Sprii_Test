<?php

/*
 * All Subject related functionalities
 */

include_once './model/utility/db.php';
class Subject {
    
    private $con = "";
    private $inst = "";
    public function __construct() {
        $this->inst = Database::inst();
        $this->con = $this->inst->dbConnect();
    }
    
	/**
	* Load all active subject list
	*
	* @return result
	*/
    public function loadSubject(){
        
        $query = "SELECT id,subject FROM subject WHERE status='ACTIVE'";
        
        $res = $this->inst->execute_query($query, $this->con);
        if(!$res){
            echo $this->con->error;
        }else{
			return $res;
        }
        
    }
	
	/**
	* Load subjects by student id
	*
	* @paran int $stdId Student id
	* @return result
	*/	
	public function loadSubjectByStudentId($stdId){
		$query = "SELECT s.subject as subject FROM student_subject ss INNER JOIN subject s ON ss.subject_id=s.id WHERE ss.student_id=$stdId AND s.status='ACTIVE'";
        
        $res = $this->inst->execute_query($query, $this->con);
        if(!$res){
            echo $this->con->error;
        }else{
			return $res;
        }
	}
}
