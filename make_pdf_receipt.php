<?php

		$html = '
		<style>
		body{font-size:10pt;font-family: Times New Roman;}
		h1{color:black;font-size:10pt;margin:0px;text-align:center;font-weight:normal;line-height:20px;}
		p{text-indent: 0px;margin-top:5px;margin-bottom:5px;font-size:8pt;}
		.footer p{text-indent: 0px;}
		</style>
		<h1 style="text-align:right;font-size:8pt;">Приложение №2</h1>';
		
		$html.='<div style="width:28%;float:left;border-right:1px solid black;border-bottom:1px solid black;">';
		$html.='<p style="text-align:center;">Извещение</p><br><br><br><br><br><br><br><br><br><br>';
		$html.='<p style="text-align:center;">Кассир</p><br><br><br>';
		$html.='</div>';
		$html.='<div style="width:70%;float:left;border-bottom:1px solid black;padding-left:10px;">';
		$html.='<p>Наименование получателя платежа: <span style="text-decoration:underline;font-weight:bold">';
		$html.='Управление Федерального  казначейства по Республике Башкортостан ';
		$html.='(Стерлитамакский филиал БашГУ,  СФ БашГУ,   л/с 20016Х52360).</p>';
		$html.='<table style="width:100%;">';
		$html.='<tr>';
		$html.='<td style="width:60%">';
		$html.='<div style="font-weight:bold;display: block;text-align: center;">';
		$html.='<span style="text-decoration:underline;display:inline-block;">ИНН  0274011237</span>';
		$html.='&nbsp;&nbsp;&nbsp;';
		$html.='<span style="text-decoration:underline;display:inline-block;">КПП  026802001</span>';
		$html.='<div style="text-align:center;font-size:8pt;margin: 0 auto;display:block;font-weight:normal;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(ИНН/КПП получателя платежа)</div>';
		$html.='</div></td>';
		$html.='<td style="width:40%;">';
		$html.='<div style="text-align:center;width:100%;font-weight:bold;text-decoration:underline;">40501810500002000002.</div>';
		$html.='<div style="text-align:center;font-size:8pt;width:100%;">(номер счета получателя платежа)</div>';
		$html.='</td>';
		$html.='</tr>';
		$html.='</table>';
		
		$html.='<table style="width:100%;display:inline:block">';
		$html.='<tr>';
		$html.='<td style="width:70%">';
		$html.='<span style="text-decoration:underline;">в Отделение-НБ Республика Башкортостан г.Уфы  </span>';
		$html.='<br><span style="font-size:8pt;">&nbsp;&nbsp;&nbsp;(наименование банка получателя платежа)</span>';
		$html.='</td>';
		$html.='<td style="width:30%;">';
		$html.='<span>БИК&nbsp;&nbsp;</span><span style="font-weight:bold;text-decoration:underline;">048073001</span><br>';
		$html.='</td>';
		$html.='</tr>';
		$html.='</table>';
		
		$html.='<table style="width:100%;">';
		$html.='<tr>';
		$html.='<td style="width:25%">';
		$html.='л/с <span style="font-weight:bold;">20016Х52360</span>';
		$html.='</td>';
		$html.='<td style="width:30%;">';
		$html.='ОКТМО <span style="font-weight:bold;">80745000</span>';
		$html.='</td>';
		$html.='<td style="width:45%;">';
		$html.='КБК <span style="font-weight:bold;">000 000 00000 00 0000 130</span>';
		$html.='</td>';
		$html.='</tr>';
		$html.='</table>';
		
		$html.='<div style="text-align:center;width:100%;margin-bottom:0px;">'.$_POST['fam'].' '.$_POST['name'].' '.$_POST['pat'].'</div>';
		//$html.='<div style="text-align:center;width:100%;margin-bottom:0px;">'.$_GET['fam'].' '.$_GET['name'].' '.$_GET['pat'].'</div>';
		$html.='<div style="text-align:center;font-size:8pt;width:100%">(фио ученика/студента)</div>';
		
		$html.='<p style="text-decoration:underline;">Договор  (019/03)<span style="text-decoration:none;text-indent:60px;"> ОРГВЗНОС УЧАСТНИКА МЕРОПРИЯТИЯ</span></p>';
		//$html.='<div style="text-align:center;font-size:8pt;width:100%">(курс, форма обучения, факультет)</div>'; 
		
		//$html.='<p>Плательщик (ФИО) ______________________________________________________________________________________</p>';
		$html.='<p>Плательщик (ФИО) '.$_POST['fam_parent'].' '.$_POST['name_parent'].' '.$_POST['pat_parent'].'</p>';
		$html.='<p>Адрес плательщика '.$_POST['adress'].'</p>';
		//$html.='<p>ИНН плательщика _______________________________________________________________________________________</p>';
		$html.='<p>Дата ___________________________ Сумма платежа: 200  руб. 00 коп.</p>';
		$html.='<p style="margin-bottom:19px;">Плательщик (подпись) ________________________________________</p>';
		$html.='</div>';
		
		$html.='<div style="width:28%;float:left;border-right:1px solid black;">';
		$html.='<p style="text-align:center;"><br><br><br><br><br><br><br><br><br><br>Квитанция</p><br><br><br><br>';
		$html.='<p style="text-align:center;">Кассир</p><br><br>';
		$html.='</div>';
		$html.='<div style="width:70%;float:left;padding-left:10px;">';
		$html.='<p>Наименование получателя платежа: <span style="text-decoration:underline;font-weight:bold">';
		$html.='Управление Федерального  казначейства по Республике Башкортостан ';
		$html.='(Стерлитамакский филиал БашГУ,  СФ БашГУ,   л/с 20016Х52360).</p>';
		$html.='<table style="width:100%;">';
		$html.='<tr>';
		$html.='<td style="width:60%">';
		$html.='<div style="font-weight:bold;display: block;text-align: center;">';
		$html.='<span style="text-decoration:underline;display:inline-block;">ИНН  0274011237</span>';
		$html.='&nbsp;&nbsp;&nbsp;';
		$html.='<span style="text-decoration:underline;display:inline-block;">КПП  026802001</span>';
		$html.='<div style="text-align:center;font-size:8pt;margin: 0 auto;display:block;font-weight:normal;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(ИНН/КПП получателя платежа)</div>';
		$html.='</div></td>';
		$html.='<td style="width:40%;">';
		$html.='<div style="text-align:center;width:100%;font-weight:bold;text-decoration:underline;">40501810500002000002.</div>';
		$html.='<div style="text-align:center;font-size:8pt;width:100%;">(номер счета получателя платежа)</div>';
		$html.='</td>';
		$html.='</tr>';
		$html.='</table>';
		
		$html.='<table style="width:100%;display:inline:block">';
		$html.='<tr>';
		$html.='<td style="width:70%">';
		$html.='<span style="text-decoration:underline;">в Отделение-НБ Республика Башкортостан г.Уфы  </span>';
		$html.='<br><span style="font-size:8pt;">&nbsp;&nbsp;&nbsp;(наименование банка получателя платежа)</span>';
		$html.='</td>';
		$html.='<td style="width:30%;">';
		$html.='<span>БИК&nbsp;&nbsp;</span><span style="font-weight:bold;text-decoration:underline;">048073001</span><br>';
		$html.='</td>';
		$html.='</tr>';
		$html.='</table>';
		
		$html.='<table style="width:100%;">';
		$html.='<tr>';
		$html.='<td style="width:25%">';
		$html.='л/с <span style="font-weight:bold;">20016Х52360</span>';
		$html.='</td>';
		$html.='<td style="width:30%;">';
		$html.='ОКТМО <span style="font-weight:bold;">80745000</span>';
		$html.='</td>';
		$html.='<td style="width:45%;">';
		$html.='КБК <span style="font-weight:bold;">000 000 00000 00 0000 130</span>';
		$html.='</td>';
		$html.='</tr>';
		$html.='</table>';
		
		$html.='<div style="text-align:center;width:100%;margin-bottom:0px;">'.$_POST['fam'].' '.$_POST['name'].' '.$_POST['pat'].'</div>';
		$html.='<div style="text-align:center;font-size:8pt;width:100%">(фио ученика/студента)</div>';
		
		$html.='<p style="text-decoration:underline;">Договор  (019/03)<span style="text-decoration:none;text-indent:60px;"> ОРГВЗНОС УЧАСТНИКА МЕРОПРИЯТИЯ</span></p>';
		//$html.='<div style="text-align:center;font-size:8pt;width:100%">(курс, форма обучения, факультет)</div>';
		
		$html.='<p>Плательщик (ФИО) '.$_POST['fam_parent'].' '.$_POST['name_parent'].' '.$_POST['pat_parent'].'</p>';
		$html.='<p>Адрес плательщика '.$_POST['adress'].'</p>';
		//$html.='<p>ИНН плательщика _______________________________________________________________________________________</p>';
		$html.='<p>Дата ___________________________ Сумма платежа: 200  руб. 00 коп.</p>';
		$html.='<p style="margin-bottom:15px;">Плательщик (подпись) ________________________________________</p>';
		$html.='</div>';
		/*
		echo $html; 
		*/
		include "mpdf60/mpdf.php";
		//define('_MPDF_TTFONTDATAPATH',Yii::getAlias('@runtime/mpdf'));
		$mpdf = new mPDF('ru-RU','A4','','',5,5,5,10,1,1);//(left,right,top,bottom)
		$mpdf->setHTMLFooter('<span float="right" style="font-size:10pt;font-family:Arial;"> Страница {PAGENO} из {nbpg}</span>') ;

		$mpdf->WriteHTML($html);
		$mpdf->Output('Квитанция.pdf',D);  
	