<?php
	include '../functions.php';
	echo '<style>';
	echo '
	body
	{
		padding:30px;
	}
	
	.my_table
	{
		border-collapse: collapse;
	}
	
	.my_table td
	{
		border:1px solid black;
		padding:5px;
	}';
	echo '</style>';
					$students=get_raw("SELECT * FROM `students`");
					echo '<b>РЕЗУЛЬТАТЫ</b> <br> (для обновления данных нажмите ctrl+r)<br><br>';
					echo '<table class="my_table">';
					echo '<tr>';
					
						echo '<td>';
						echo '<b>№</b>';
						echo '</td>';
						
						echo '<td>';
						echo '<b>id в базе </b>';
						echo '</td>';
						
						echo '<td>';
						echo '<b>оплачено</b>';
						echo '</td>';
						
						echo '<td>';
						echo '<b>ФИО</b>';
						echo '</td>';
						
						echo '<td>';
						echo '<b>Email</b>';
						echo '</td>';
						
						echo '<td style="width:120px;" >';
						echo '<b>Телефон</b>';
						echo '</td>';
						
						echo '<td>';
						echo '<b>Город/Район</b>';
						echo '</td>';
						
						echo '<td>';
						echo '<b>Школа</b>';
						echo '</td>';
						
						echo '<td>';
						echo '<b>Руководитель</b>';
						echo '</td>';
						
						echo '<td>';
						echo '<b>Класс</b>';
						echo '</td>';
						
						echo '<td>';
						echo '<b>Балл (из 100)</b>';
						echo '</td>';
						
					echo '</tr>';
					$col=0;
					for ($i=0;$i<count($students);$i++)
					{
						
						$query="SELECT `questions`.`id_questions`,`questions`.`number_true`, `answers`.`answer` ";
						$query.=" FROM `questions` INNER JOIN `answers` ON `questions`.id_questions = `answers`.id_questions ";
						$query.=" WHERE `answers`.`id_students`=".$students[$i]['id_students']." AND `answers`.`answer`=`questions`.`number_true`";
						$count_true_answers_student=count(get_raw($query));//кол-во верных ответов
						
						 $class=$students[$i]['class'];
						 if ($class<=4) {$category=1;}
						 if (($class>=5) & ($class<=8))	 {$category=2;}
						 if (($class>=9) & ($class<=11)) {$category=3;}
						 if ($students[$i]['cat']==2) {
							$category=4;
							$this_answer=get_raw("SELECT * FROM `answers` WHERE `id_students`='".$students[$i]['id_students']."'");
							
							if (count($this_answer)!==0)
								{
								$new_cat=get_raw("SELECT * FROM `questions` WHERE `id_questions` IN (SELECT `id_questions` FROM `answers` WHERE `id_students`='".$students[$i]['id_students']."')");
								$category=$new_cat[0]['category'];
								}
							}
						$query="SELECT * FROM `questions` WHERE `category`=".$category;
						$count_questions=count(get_raw($query));
						
						$ball=round(($count_true_answers_student/$count_questions)*100, 2);
						
						$new_ball=str_replace(".", ",", (string)$ball);
						
						$payment=get_raw("SELECT * FROM `payment` WHERE `id_students`=".$students[$i]['id_students']);
						
						if (!(($new_ball==0) && (count($payment)==0)))
						{$col=$col+1;
						echo '<tr';
							if (($new_ball==0) && (count($payment)==0)) echo " style='color:#9e9e9ea8;'";
							if (($new_ball!=0) && (count($payment)==0)) echo " style='color:red;'";
							if (($new_ball==0) && (count($payment)!=0)) echo " style='color:green;'";
						echo '>';
						echo '<td>';
						//echo ($i+1);
						echo $col;
						echo '</td>';
						
						echo '<td>';
						echo $students[$i]['id_students'];
						echo '</td>';
						
						echo '<td>';
						
						if (count($payment)==0)
						{
							echo '<b>нет</b>';
						}
						else
						{
							echo 'ДА';	
						}
						echo '</td>';
						
						echo '<td>';
						echo $students[$i]['fam'].'  '.$students[$i]['name'].'  '.$students[$i]['otch'];
						echo '</td>';
						
						
						
						$parents=get_raw("SELECT * FROM `parents` WHERE `id_srudents`=".$students[$i]['id_students']);
						echo '<td>';
						echo $parents[0]['email'];
						echo '</td>';
						
						echo '<td>';
						echo $students[$i]['tel'];
						echo '</td>';
						
						echo '<td>';
						echo $students[$i]['city'];
						echo '</td>';
						
						echo '<td>';
						echo $students[$i]['school'];
						echo '</td>';
						
						echo '<td>';
						echo $students[$i]['ruk'];
						echo '</td>';
						
						
						if ($students[$i]['cat']!=='2')
						{
							echo '<td>';
							echo $students[$i]['class'];
							echo '</td>';
						}
						else
						{
							echo '<td>';
							echo 'студент';
							echo '</td>';
						}
						
						echo '<td>';
						
						echo $new_ball.'</td>';
						
						echo '</tr>';
						
						}
					}
					echo '</table>';
	
	?>