<?php
    session_start();

    include "../Open_DB.php";
?>
<html>

<head>
  <title>Интернет-олимпиада по башкирскому языку</title>
  <link href='login-box.css' rel='stylesheet' type=text/css />
  <meta charset="utf-8"/>
</head>

  <body style='margin:0;padding:0;width:100%;height:100%; background-color: rgb(255,255,255);'>
<?php 

    $count_q = 109;

    $res=get_raw("SELECT * FROM questions WHERE number !=0 ORDER BY number");

    $ans = array();

    //формируем массив верных ответов
    for ($i =0; $i <=(count($res)-1); $i++) {
        $ans[($i+1)][1]=$res[$i]['number'];
        $ans[($i+1)][2]=$res[$i]['number_true'];
    }

    //Формируем таблицу с данными
    $res=get_raw("SELECT * FROM answer");

    //количество участников , принимавших участие в олимпиаде
    $kol = count($res);

    echo $kol;

echo "
  <center>

  <p style='font: normal normal 800 16px/19.2px Times New Roman/Arial;margin-top:10px;'>РЕЗУЛЬТАТЫ ИНТЕРНЕТ-ОЛИМПИАДЫ ПО БАШКИРСКОМУ ЯЗЫКУ</p>

  <table style='width:1000px;border-collapse: collapse;'border='1' cellspacing='0'>

  <tr>

  <td style='width:50px;text-align:center;font: normal normal 800 16px/19.2px 'Arial';'>№</td>

  <td style='width:100px;text-align:center;font: normal normal 800 16px/19.2px 'Arial';'>Город/ Школа/ Класс</td>

  <td style='width:200px;text-align:center;font: normal normal 800 16px/19.2px 'Arial';'>Фамилия Имя Отчество</td>

  <td style='width:100px;text-align:center;font: normal normal 800 16px/19.2px 'Arial';'>Кол-во прав. отв.</td>

  <td style='width:50px;text-align:center;font: normal normal 800 16px/19.2px 'Arial';'>% выполнения</td>

  </tr>";

    for ($i =1; $i <=$kol; $i++) {
        echo "<tr><td style='padding:3px; text-align:center;'>";//номер вопроса

        echo $i;

        echo "</td><td>";

        $ID=$res[$i-1]['id'];

        $fio = get_raw("SELECT * FROM login_parol WHERE ID='". $ID."'");

        echo $fio[0]['city'].'/ '.$fio[0]['school'].'/ '.$fio[0]['class'];

        echo "</td><td style='padding:3px;padding-left:10px;'>";//ФИО участника

        echo $fio[0]["Fam"].' '.$fio[0]["Name"].' '.$fio[0]["Otch"];

        $class = $fio[0]['class'];

        echo "</td>";//вопросы с неправильными ответами

        $vsp=get_raw("SELECT * FROM answer WHERE id='".$ID."'");

        $otveti = array();

        $otveti = explode(";",$vsp[0]['ans']);

        $otvet = array();

        //формируем массив ответов участника
        for ($j =1; $j <= (count($otveti)-1); $j++) {
            $vsp = explode("-",$otveti[$j-1]);
            $otvet[$j][1] = $vsp[0];
            $otvet[$j][2] = $vsp[1];
        }

        $loc_not_true='';

        $kol_not=0;//количество неправильных ответов

        for ($j =1; $j <=(count($otveti)-1); $j++) {
            if ($otvet[$j][2] <> $ans[$j][2]) {
                $loc_not_true=$loc_not_true.$otvet[$j][1].";";

                $kol_not=$kol_not+1;
            }
        }

        echo "<td style='padding:3px;text-align:center;'>";//количество правильных ответов*/

        if ($class == '9') $count_q = 121; else $count_q = 121;

        echo ($count_q - $kol_not);

        echo "</td><td style='padding:3px;text-align:center;'>";

        echo number_format((1-$kol_not/$count_q)*100, 2, ',', '');

        echo "</td></tr>";
    }

    echo"</table></center>";

    ?>

 </body>
 </html>