<?php 
	session_start();
    include "../Open_db.php";
     /*
	//Впускаем только тестовые аккаунты 
	$pos = strpos($_POST['login'], 'test');

	if ($pos === false) {
		return 0;exit;
	} else 
	{
*/
	 //проверяем есть ли пользователь с таким login'ом и password'ом
	 $query = "SELECT * FROM `students` WHERE ";
	 $query.=" `log`='".$_POST['login']."' AND ";
	 $query.=" `pas`='".$_POST['pas']."'";
     $res=get_raw($query);
	 
	 
     if (count($res)!==0)
	{   //пользователь найден
         $_SESSION['pas']=$_POST['pas'];//устанавливаем login & pass
         $_SESSION['login']=$_POST['login'];
		 $_SESSION['fam']=$res[0]['fam'];
		 $_SESSION['name']=$res[0]['name'];
		 $_SESSION['otch']=$res[0]['otch'];
		 $_SESSION['id_students']=$res[0]['id_students'];//устанавливаем login & pass
		 
		 $class=$res[0]['class'];
		 
		 if ($class<=4) 
		 {
			$_SESSION['category']=1;
		 }
		 
		 if (($class>=5) & ($class<=8))
		 {
			 $_SESSION['category']=2;
		 }
		 
		 if (($class>=9) & ($class<=11))
		 {
			 $_SESSION['category']=3;
		 }

		 if ($res[0]['cat']==2)
		 {
			 $_SESSION['category']=4;
		 }
		 
		 $_SESSION['count_questions']=count(get_raw("SELECT * FROM `questions` WHERE `category`=".$_SESSION['category']));
		 
		 $count_question=$_SESSION['count_questions'];
  
		 $arr=array();
		 for ($i=1;$i<=$count_question;$i++)
		  {
			  array_push($arr,$i);
		  }
			
		 shuffle($arr); 
		 $_SESSION['sort_questions']=$arr;//отсортированные эелемнты массива 
  
         echo '1';
    }
	 else
	 {  //пользователь не найден
		echo 0;
     }
	/*}*/
?>
