<?php session_start();
	if (!isset($_SESSION['login']))
	{
		header("Location: index.php");    
	}
	else
	{
		
?>
<html>
     <head>
	 <meta http-equiv="Content-type" content="text/html; charset=utf-8">
	 <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <title>Башҡорт теленән республика Интернет-олимпиадаһы</title>
	 <base href="/fbf-test/">
	 
	 <link href="../assets/css/jquery.checkradios.min.css" rel="stylesheet"> 
	 <link href="../assets/css/jquery.checkradios.css" rel="stylesheet"> 
	
	 <link href='new_style.css' rel='stylesheet' type="text/css" />
	 <link href='../assets/font-awesome/css/font-awesome.min.css' rel='stylesheet'>
	 
	 <script src="/fbf-test/js/jquery-3.3.1.min.js"></script>
	 <script src="/fbf-test/js/script.js"></script>
	 <script src="/fbf-test/js/timer.js"></script>
	 
	 <script type="text/javascript" src="../assets/js/jquery.checkradios.min.js"></script>  
	 <script type="text/javascript" src="../assets/js/jquery.checkradios.js"></script>  
	
	 </head>
     <body>
	 
	<?php			
	//print_r($_SESSION);
					include '../functions.php';
	
					if (isset($_GET['category']))
						if ($_GET['category']==5)
						{
							//меняем категорию и кол-во вопросов
							
							 unset($_SESSION['category']);unset($_SESSION['count_questions']);unset($_SESSION['sort_questions']);
							 $_SESSION['category']=5;
							 $_SESSION['count_questions']=count(get_raw("SELECT * FROM `questions` WHERE `category`=".$_SESSION['category']));
		 
							 $count_question=$_SESSION['count_questions'];
					  
							 $arr=array();
							 for ($i=1;$i<=$count_question;$i++)
							  {
								  array_push($arr,$i);
							  }
								
							 shuffle($arr);
							 $_SESSION['sort_questions']=$arr;//отсортированные эелемнты массива
		 
							
						}
						
					if (!isset($_SESSION['start_time']))
					{
						$_SESSION['start_time']=date( 'G i s', time() ); 
						$start_date=$_SESSION['start_time'];
						$ht=0;//время тестирования в часах
						
						if ($_SESSION['category']==1)
						{
							$mt=30;//время тестирования в минутах
						}
						
						if ($_SESSION['category']==2)
						{
							$mt=40;//время тестирования в минутах
						}
						
						if (($_SESSION['category']==3) | ($_SESSION['category']==4) | ($_SESSION['category']==5))
						{
							$mt=50;//время тестирования в минутах
						}
						
						$st=0;//время тестирования в секундах 
						
						$test_time=$ht*3600+$mt*60+$st;
						$start_time=time_to_mls($start_date);//текущее время
						$end_time=$start_time+$test_time;
						$_SESSION['end_test']=time_to_clock($end_time);
						
						//сохраняем в базе время входа в систему
						save_time_open_of_student();
					}
					else
					{
						$start_date=date( 'G i s', time());
						$start_date=time_to_mls($start_date);
						
						$end_time=$_SESSION['end_test'];
						$end_time=time_to_mls($end_time);
						
						$test_time=$end_time-$start_date;
						//echo '$test_time '.$test_time;
						$hh=(integer)($test_time/3600);
						$mm=(integer)(($test_time-$hh*3600)/60);
						$ss=$test_time-$hh*3600-$mm*60;
						
					}
	//print_r($_SESSION);
	
	?>
	 
	 <div class="main">
	 <div class="close_window">
	 У вас осталось меньше минуты времени!
	 </div>
	 
	 <div class="header" style="display: flex;justify-content: space-between;">
	 

		<div class="block_num_quest">
			Һорау <span id="number_question"></span>
		</div>
		
		<div class="time">
				Һеҙҙең ҡалған ваҡытығыҙ 
				<?php 
								
								$hh=(integer)($test_time/3600);	
							    $mm=(integer)(($test_time-$hh*3600)/60);
							    $ss=$test_time-$hh*3600-$mm*60;
								if ($hh<10) {$hh='0'.$hh;}
								if ($mm<10) {$mm='0'.$mm;}
								if ($ss<10) {$ss='0'.$ss;}
				 ?>&nbsp;&nbsp;&nbsp;
				<span  id="s_hour"><?php echo $hh;?></span>:<span  id="s_minute"><?php echo $mm;?></span>:<span  id="s_second"><?php echo $ss;?></span>		
				<img src="images/clock-64.png">
		</div>
		
	 </div>

	 
	 <div class="block_with_question">
	 
		
		
	 </div>

	 <div class="footer" style="height:80px;padding: 20px 0px;display: flex;flex-direction:row;justify-content:space-between">
	 
	 <div id="close_test">
	 <p style="text-align:center;margin:0px;">
	 Һеҙ ысынлап та тесты тамамларға теләйһегеҙме?	
	 </p>
	 <div class="small_button" id="yes">да</div> 
	 
	 <div class="small_button" id="no">нет</div>
	 
	 </div>
	 
	 <?php 
	 if (isset($_SESSION['number_of_questions']))
	 {
		$number_of_question=$_SESSION['number_of_questions']; 
	 }
	 else
	 {
		$number_of_question=1; 
	 }
	 ?>
	 <input type="hidden" name="number_of_question" value="<?php echo $number_of_question;?>"/>
	 <div class="left_block">
		
		<div class="angle-left">
		
			 <i class="fa fa-angle-double-left" aria-hidden="true"></i>
			 <i class="fa fa-angle-left" aria-hidden="true"></i>
		
		</div>
		
		
		<?php
		
		$k=1;
		
		while ($k<=($_SESSION['count_questions']/10))
		{
			echo '<ul class="navigation" style="display:none;">';
			for ($i=1;$i<=10;$i++)
			{
				echo '<li data-num-question="'.(($k-1)*10+$i).'">'.(($k-1)*10+$i).'</li>';
			}
			$k++;
			echo '</ul>';
		}
		
		?>
		
		
		<div class="angle-right">
			 <i class="fa fa-angle-right" aria-hidden="true"></i>
			 <i class="fa fa-angle-double-right" aria-hidden="true"></i>
		</div>	 
	</div>	
	
	<div class="right_block">	
		<div type='submit' id='zavershit' class='push_button_two'>
				тесты тамамларға
		</div>
	</div>
	 </div>
	 
</body>
</html>
<?php
	}
?>