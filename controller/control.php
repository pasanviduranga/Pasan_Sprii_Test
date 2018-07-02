<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of control
 *
 * @author User
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

        $contoller = $segments[1];
        $action = $segments[2];
        
        switch ($contoller){
            case 'student' :
                require_once 'studentController.php';
                $student = new studentController();
                switch ($action) {
                    case 'save':
                        $student->process();
                        break;

                    default:
                        $student->index();
                        break;
                }
        }
    }
    
    function getUriSegments() {
        return explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    }

    function getUriSegment($n) {
        $segs = getUriSegments();
        return count($segs) > 0 && count($segs) >= ($n - 1) ? $segs[$n] : '';
    }
}
