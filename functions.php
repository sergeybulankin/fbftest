<?php
include 'Open_db.php';

function generate_log($fam, $imya, $otch) //формируем логин по ФИО
	{
		mb_internal_encoding("UTF-8");

		$log = $fam.mb_substr($imya, 0, 1, "UTF-8").mb_substr($otch, 0, 1, "UTF-8");
		$log_start = $log;
		
		if (test_login($log) != 0) //Меняем логин, если такой уже в базе есть
		{
			$i = 1;
			
			while (test_login($log_start) != 0)
			{
				$log_start = $log.$i;
				$i++;
			}
			
			$log = $log_start;
		}
		
		return $log;
	}
	
	
function generate_pas($fam, $imya, $otch) //формируем пароль по ФИО
	{
		$pas = substr(md5($fam.$imya.$otch), 0, 7);
		
		$one = mt_rand(1, 6);
		$two = mt_rand(1, 6);
		$three = mt_rand(1, 6);
		$pas[$one] = strtoupper($pas[$one]);
		$pas[$two] = strtoupper($pas[$two]);
		$pas[$three] = strtoupper($pas[$three]);
		$pas[7] = mt_rand(1, 9);
		
		return $pas;
	}

function test_login($login) //проверка на наличие такого логина в бд
	{
		$res = get_raw("SELECT * FROM `students` WHERE `log` ='".$login."'");
		
		if (count($res)!= 0) 
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	
	
	function time_to_mls($time)//перевести время 22 02 22 в милисекунды
{
	$date_elements  = explode(" ",$time);
	$h=$date_elements[0];
	$m=$date_elements[1];
	$s=$date_elements[2];
	$this_time=$h*3600+$m*60+$s;//текущее время
	return $this_time;
	
}


function time_to_clock($time)//перевести время из милисекунд в 22 02 22
{
	$hh=(integer)($time/3600);
	$mm=(integer)(($time-$hh*3600)/60);
	$ss=$time-$hh*3600-$mm*60;
						
	return $hh." ".$mm." ".$ss;
	
}

function save_time_open_of_student()
{
	$query=" INSERT INTO `authorization` ";
	$query.=" (`id_authorization`, `id_students`, `time_open`, `time_close`) VALUES ";
	$query.=" (NULL, '".$_SESSION['id_students']."', '".current_time()."', '');";
	set_raw($query);
}

function current_time()
{
	mysql_query("SET time_zone='+05:00'");
	$res=get_raw("SELECT now()");
	return $res[0]['now()'];
}


function save_time_close_of_student()
{
	$query="UPDATE `authorization` SET `time_close` = '".current_time()."' WHERE ";
	$query.=" `id_students` = ".$_SESSION['id_students'];
	set_raw($query);
}

function has_answer()//проверяем отвечал ли пользователь на вопросы
{
	$query="SELECT * FROM `authorization` WHERE `id_students` =".$_SESSION['id_students'];
	$res=get_raw($query);
	
	if (count($res)!==0)
	{
		return true;//отвечал уже
	}
	else
	{
		return false;//не отвечал
	}
}

?>