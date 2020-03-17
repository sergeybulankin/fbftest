<?php
		require 'autoload.php'; 
		$_POST['fam']='Саитгараев';
		$_POST['name']='Ильназ';
		$_POST['pat']='Наилевич';
		$_POST['fam_parent']='Татлыбаева';
		$_POST['name_parent']='Гулькай';
		$_POST['pat_parent']='Нурисламовна';
		$_POST['adress']='г.Мелеуз,ул.Акмуллы,16/А'; 
		
		
		$html = '
		<style>
		body
		{
			font-size:10pt;
			font-family: Times New Roman;
			max-width:900px;
		}
		
		h1
		{
			color:black;
			font-size:10pt;
			margin:0px;
			text-align:center;
			font-weight:normal;
			line-height:20px;
		}
		
		p
		{
			text-indent: 0px;
			margin-top:5px;
			margin-bottom:5px;
			font-size:8pt;
		}
		
		.footer 
		p
		{
			text-indent: 0px;
		}
		</style>
		
		<h1 style="text-align:right;font-size:8pt;">Приложение №2</h1>';
		
		$html.='<div style="width:28%;float:left;border-right:1px solid black;border-bottom:1px solid black;">';
			$html.='<p style="text-align:center;">Извещение</p><br><br><br><br><br><br><br><br><br><br>';
			$html.='<p style="text-align:center;">Кассир</p><br><br><br>';
		$html.='</div>';
		
		$add_style='border-bottom:1px solid black; ';
		$block_begin='<div style="width:70%;float:left;';
			$block='padding-left:10px;">';
			$block.='<p>Наименование получателя платежа: <span style="text-decoration:underline;font-weight:bold">';
			$block.='Управление Федерального  казначейства по Республике Башкортостан ';
			$block.='(Стерлитамакский филиал БашГУ,  СФ БашГУ,   л/с 20016Х52360).</p>';
		
			$block.='<table style="width:100%;">';
				$block.='<tr>';
				
					$block.='<td style="width:60%">';
						$block.='<div style="font-weight:bold;display: block;text-align: center;">';
							$block.='<span style="text-decoration:underline;display:inline-block;">ИНН  0274011237</span>';
							$block.='&nbsp;&nbsp;&nbsp;';
							$block.='<span style="text-decoration:underline;display:inline-block;">КПП  026802001</span>';
							
							$block.='<div style="text-align:center;font-size:8pt;margin: 0 auto;display:block;font-weight:normal;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(ИНН/КПП получателя платежа)</div>';
						$block.='</div>';
					$block.='</td>';
					
					$block.='<td style="width:40%;">';
						$block.='<div style="text-align:center;width:100%;font-weight:bold;text-decoration:underline;">40501810500002000002.</div>';
						$block.='<div style="text-align:center;font-size:8pt;width:100%;">(номер счета получателя платежа)</div>';
					$block.='</td>';
				
				$block.='</tr>';
			$block.='</table>';
		
			$block.='<table style="width:100%;display:inline:block">';
				$block.='<tr>';
					$block.='<td style="width:70%">';
						$block.='<span style="text-decoration:underline;">в Отделение-НБ Республика Башкортостан г.Уфы  </span>';
						$block.='<br><span style="font-size:8pt;">&nbsp;&nbsp;&nbsp;(наименование банка получателя платежа)</span>';
					$block.='</td>';
		
					$block.='<td style="width:30%;">';
						$block.='<span>БИК&nbsp;&nbsp;</span><span style="font-weight:bold;text-decoration:underline;">048073001</span><br>';
					$block.='</td>';
				$block.='</tr>';
			$block.='</table>';
		
			$block.='<table style="width:100%;">';
				$block.='<tr>';
					$block.='<td style="width:25%">л/с <span style="font-weight:bold;">20016Х52360</span></td>';
					$block.='<td style="width:30%;">ОКТМО <span style="font-weight:bold;">80745000</span></td>';
					$block.='<td style="width:45%;">КБК <span style="font-weight:bold;">000 000 00000 00 0000 130</span></td>';
				$block.='</tr>';
			$block.='</table>';
		
			$block.='<div style="text-align:center;width:100%;margin-bottom:0px;">'.$_POST['fam'].' '.$_POST['name'].' '.$_POST['pat'].'</div>';
			$block.='<div style="text-align:center;font-size:8pt;width:100%">(фио ученика/студента)</div>';
		
			$block.='<p style="text-decoration:underline;">Договор  (019/03)<span style="text-decoration:none;text-indent:60px;"> ОРГВЗНОС УЧАСТНИКА МЕРОПРИЯТИЯ</span></p>';
			$block.='<p>Плательщик (ФИО) '.$_POST['fam_parent'].' '.$_POST['name_parent'].' '.$_POST['pat_parent'].'</p>';
			$block.='<p>Адрес плательщика '.$_POST['adress'].'</p>';
			$block.='<p>Дата ___________________________ Сумма платежа: 200  руб. 00 коп.</p>';
			$block.='<p style="margin-bottom:19px;">Плательщик (подпись) ________________________________________</p>';
		$block.='</div>';
		$html.=$block_begin.$add_style.$block;
		
		$html.='<div style="width:28%;float:left;border-right:1px solid black;">';
			$html.='<p style="text-align:center;"><br><br><br><br><br><br><br><br><br><br>Квитанция</p><br><br><br><br>';
			$html.='<p style="text-align:center;">Кассир</p><br><br>';
		$html.='</div>';

		$html.=$block_begin.$block;
		
		//echo $html;
		$mpdf = new \Mpdf\Mpdf([
			'mode' => 'utf-8', // кодировка (по умолчанию UTF-8)
			'format' => 'A4', // - формат документа
			'orientation' => 'L' // - альбомная ориентация
		]);
		
		/*$mpdf->WriteHTML($html); 
		$mpdf->Output("Квитанция.pdf",'D');
		
		/*
		include "mpdf60/mpdf.php";
		$mpdf = new mPDF('ru-RU','A4','','',5,5,5,10,1,1);
		$mpdf->setHTMLFooter('<span float="right" style="font-size:10pt;font-family:Arial;"> Страница {PAGENO} из {nbpg}</span>') ;

		$mpdf->WriteHTML($html);
		$mpdf->Output('Квитанция.pdf',D);  
		*/
		
	