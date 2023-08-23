<?php

$conn = mysqli_connect('localhost','root','','shop_db') or die('connection failed');

if(!isset($_SESSION)) 
{ 
    session_start(); 
}
?>