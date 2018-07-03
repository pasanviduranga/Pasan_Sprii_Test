<?php

/*
 * Routh the related controller
 */

class control {

    private static $inst;

    protected function __construct() {
        
    }

    public static function getInst() {
        if (null === static::$inst) {
            static::$inst = new control();
        }

        return static::$inst;
    }

    public function call($segments) {

        $contoller = isset($segments[1]) ? $segments[1] : "";
        $action = isset($segments[2]) ? $segments[2] : "";
        
        switch ($contoller){
            case 'student' :
                require_once 'studentController.php';
                $student = new studentController();
                switch ($action) {
                    default:
                        $student->index();
                        break;
                }
        }
    }
    
    function getUriSegments() {
        return explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    }
}
