<!DOCTYPE html>
<!--
All request are gothrough the index.php
-->
<?php include_once './controller/control.php';
$cont = control::getInst();
$segments = $cont->getUriSegments();
$cont->call($segments);