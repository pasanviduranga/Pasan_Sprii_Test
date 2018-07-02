<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of studentController
 *
 * @author User
 */
include_once './model/utility/db.php';
class studentController {
    function index(){
        include_once './view/studentView.php';
    }
    
    function process(){
        echo "<pre>";
        print_r($_POST);
    }
}
