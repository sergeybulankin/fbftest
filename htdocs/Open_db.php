<?php 
define("DBName","strbsuru_fbftest");
define("HostName","localhost");
define("UserName","root"); 
define("Password",""); 

$mysqli = mysqli_connect(HostName, UserName, Password, DBName);
@mysqli_query($mysqli, 'SET NAMES utf8');
/* проверка соединения */
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}

/*
echo "Соединение с MySQL установлено!" . PHP_EOL;
echo "Информация о сервере: " . mysqli_get_host_info($link) . PHP_EOL;

mysqli_close($link);

if(!@mysql_connect(HostName,UserName,Password)) 
	{
		echo "Не могу соединиться с базой!<br>"; 
		echo mysql_error();
		exit; 
	} 
	else 
	{
		$db=mysql_connect('localhost', 'root', '');
        mysql_query('SET NAMES utf8'); 
	    mysql_select_db('strbsuru_fbftest', $db);
	} 
*/			  
function get_raw($query) 
	{
		global $mysqli;
		$result = false;
		$null = NULL;
        $tmp=array();
		$result = @mysqli_query($mysqli, $query);
		if (!$result)
		{
			return $null;
		}
		while ($row = mysqli_fetch_assoc($result))
			$tmp[] = $row;
		mysqli_free_result($result);
		return $tmp;
	}
	
function set_raw($query)
	{	
		global $mysqli;
		$true = true; 
		$null = NULL;
		$result = mysqli_query($mysqli, $query); 

		if (!$result)
		{
			return $null;
		}
		return mysqli_insert_id($mysqli);  
	}
	
?>