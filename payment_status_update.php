<?php 
 
 require_once("functions.php");

 //print_r($_POST);
 
 global $mysqli;

 if($_POST["payment"]!=='false'){
 	
 	$query = "INSERT INTO `payment` (`id_payment`, `id_students`) VALUES (NULL, '".$_POST["id_students"]."')";	
 }
 else
 {
 	$query = "DELETE FROM `payment` WHERE `payment`.`id_students` = ".$_POST["id_students"];
 }
 
 
 print_r($mysqli->query($query)); 
 ?>