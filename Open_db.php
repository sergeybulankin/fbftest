<?php 
define("DBName","strbsuru_fbftest");
define("HostName","localhost");
define("UserName","strbsuru_fbftest"); 
define("Password","elmira123");   

 	if(!@mysql_connect(HostName,UserName,Password)) 
	{
		echo "Не могу соединиться с базой!<br>"; 
		echo mysql_error();
		exit; 
	} 
	else 
	{
		$db=mysql_connect('localhost', 'strbsuru_fbftest', 'elmira123');
        mysql_query('SET NAMES utf8'); 
	    mysql_select_db('strbsuru_fbftest', $db);
	}
			  
function get_raw($query)
	{
		$result = false;
		$null = NULL;
        $tmp=array();
		$result = @mysql_query($query);
		if (!$result)
		{
			return $null;
		}
		while ($row = mysql_fetch_assoc($result))
			$tmp[] = $row;
		mysql_free_result($result);
		return $tmp;
	}
	
function set_raw($query)
	{	$true = true; 
		$null = NULL;
		$result = mysql_query($query);


		if (!$result)
		{
			return $null;
		}
		return $true;
	}
	
?>