<?php 
	session_start();
    include "../Open_db.php";
    //print_r($_POST);
	$number=$_POST['number'];
	
	$question=get_raw("SELECT * FROM `questions` WHERE `category`=".$_SESSION['category']." AND `number`=".$_SESSION['sort_questions'][$number-1]);
	//print_r($question);
	$question=$question[0];
	//сохраняем номер текущего вопроса
	$_SESSION['number_of_questions']=$_SESSION['sort_questions'][$number-1];
	
	//ищем ответ на этот вопрос
	$query="SELECT * FROM `answers` WHERE `id_students` = ".$_SESSION['id_students']." AND `id_questions` = ".$question['id_questions'];
	$res=get_raw($query);
	
	$checked_one='';$checked_two='';$checked_three='';$checked_four='';
	
	if (count($res)!==0)
	{
		if ($res[0]['answer']=='1') 
		{
			$checked_one=' checked ';
		}
		
		if ($res[0]['answer']=='2') 
		{
			$checked_two=' checked ';
		}
		
		if ($res[0]['answer']=='3') 
		{
			$checked_three=' checked ';
		}
		
		if ($res[0]['answer']=='4') 
		{
			$checked_four=' checked ';
		}
	}

	$str='<div id="question" data-id-question="'.$question['id_questions'].'">'.$question['question'].'</div>';
		
	$str.='<div class="answer">
		<input id="1_1" name="category" type="radio" value="1" class="checkradios custom-style" '.$checked_one.'/>
				<label for="1_1">'.$question['one'].'</label>
		</div>';
	
	$str.='<div class="answer">
		<input id="1_2" name="category" type="radio" value="2" class="checkradios custom-style" '.$checked_two.'/>
				<label for="1_2">'.$question['two'].'</label>
		</div>';
		
	$str.='<div class="answer">
		<input id="1_3" name="category" type="radio" value="3" class="checkradios custom-style" '.$checked_three.'/>
				<label for="1_3">'.$question['three'].'</label>
		</div>';
		
	$str.='<div class="answer">
		<input id="1_4" name="category" type="radio" value="4" class="checkradios custom-style" '.$checked_four.'/>
				<label for="1_4">'.$question['four'].'</label>
		</div>';
		
	echo $str;
		
?>
