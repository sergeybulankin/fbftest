<?php
// TODO данные бд
define("DBName","strbsuru_fbftest");
define("HostName","localhost");
define("UserName","root"); 
define("Password","");

$mysqli = mysqli_connect(HostName, UserName, Password, DBName);
@mysqli_query($mysqli, 'SET NAMES utf8');
@mysqli_query($mysqli, 'SET SESSION sql_mode=\'ALLOW_INVALID_DATES\' ');
/* проверка соединения */
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}

/**
 * @param $query
 * @return array|null
 */
function get_raw($query) 
{
    global $mysqli;
    $result = false;
    $null = NULL;
    $tmp=array();
    $result = @mysqli_query($mysqli, $query);

    if (!$result) {
        return $null;
    }

    while ($row = mysqli_fetch_assoc($result))
    $tmp[] = $row;
    mysqli_free_result($result);

    return $tmp;
}

/**
 * @param $query
 * @return int|string|null
 */
function set_raw($query)
{
    global $mysqli;
    $true = true;
    $null = NULL;
    $result = mysqli_query($mysqli, $query);

    if (!$result) {
        return $null;
    }

    return mysqli_insert_id($mysqli);
}
	
?>