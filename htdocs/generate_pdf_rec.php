<?php
include 'functions.php'; 
$student = get_raw("SELECT * FROM `students` WHERE `id_students` = ".$_GET["id_students"])[0];
$parent =  get_raw("SELECT * FROM `parents` WHERE `id_srudents` = ".$_GET["id_students"])[0];
make_pdf_rec(array('fam' => $student['fam'], 'name' => $student['name'], 'pat' => $student['otch'], 
					'fam_parent' => $parent['fam'], 'name_parent' => $parent['name'], 'pat_parent' => $parent['otch'], 
					'adress' => $parent['adress']), false);  
?>