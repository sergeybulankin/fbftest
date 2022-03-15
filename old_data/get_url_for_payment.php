<?php 
require_once("functions.php");

$setting=get_setting();

$url="https://strbsu.ru/payment/api";
$data=json_decode(json_encode($_POST),true);

$post["CBC"]="00000000000000000130";
$post["Category"]=2;//За курсы

$post["SUM"]=$setting['amount'];

$post["LastName"]=$data["fam_parent"].' '.$data["name_parent"].' '.$data["pat_parent"];
$post["email"]=$data["email"];

$post["ChildFio"]=$data["fam"].' '.$data["name"].' '.$data["pat"];

$post["Form"]="";
$post["Fac"]="";
$post["Sp"]="";
$post["Kurs"]="";

$post["KursName"]='Республиканская интернет-олимпиада по башкирскому языку. Оргвзнос участника мероприятия.';

$post["DocNo"]=$setting["DocNo"];
$post["PayerAddress"]="";
$post["token"]=$setting["token"]; 

//отпарвляем на strbsu.ru запрос на добавление заказа в базу strbsu.ru 
//и получаем ответ от сервера банка со ссылкой на платежную форму
$res=file_get_contents_curl($url,$post); 

$data_res=json_decode($res,true);

if ($data_res["result"]=="ok")
{	
	//сохраняем orderId в базе strbsuru_fbftest, чтобы в дальнейшем указать успешность оплаты
	$orderId=$data_res["orderId"];
	$id_payment_online=set_raw("INSERT INTO `payment_online` (`id_student`, `orderId`) VALUES ('".$data['id_students']."', '$orderId')");
} 
 
print_r(json_encode($res)); 

?>