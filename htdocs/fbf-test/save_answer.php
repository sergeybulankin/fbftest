<?php 
	session_start();
    include "../Open_db.php";
    print_r($_POST);
	
	$answer=$_POST['answer'];
	$id_question=$_POST['id_question'];
	
	
	//ищем ответ на этот вопрос
	$query="SELECT * FROM `answers` WHERE `id_students` = ".$_SESSION['id_students']." AND `id_questions` = ".$id_question;
	$res=get_raw($query);
	
	if (count($res)!==0)
	{
		//редактируем запись
		$query="UPDATE `answers` SET `answer` = '".$answer."' WHERE `answers`.`id_answers` =".$res[0]['id_answers'];
		set_raw($query);
	}
	else
	{	//добавляем новую запись
		$query="INSERT INTO `answers` (`id_answers`, `id_students`, `id_questions`, `answer`) ";
		$query.=" VALUES (NULL, '".$_SESSION['id_students']."', '".$id_question."', '".$answer."');";
		set_raw($query);
	}
	
	
		
?>
