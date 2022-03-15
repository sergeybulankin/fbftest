
$('document').ready(
	function(){
	 // Обработчик - после загрузки документа... 
			var a = new Date();
			var c_h = a.getHours();
			var c_min = a.getMinutes();
			var c_sec = a.getSeconds();

			var s_h = Number($("#s_hour").html());
			var s_min = Number($("#s_minute").html());
			var s_sec = Number($("#s_second").html());
	
			setInterval(sec, 1000) // использовать функцию
	
	 function sec() {//сервер
			
			if (c_sec+1 > 59)
			{
				c_sec = 0;
				if(c_min+1 > 59)
					{
						c_min = 0;
						if(c_h+1 > 23)
							{
								c_h = 0;
							}
							else
							{
								c_h++;
							}
					}
					else
					{
						c_min++;
					}
			}
			else
			{
				c_sec++;
			}
			//клиент
			if (s_sec-1 <0)
			{
				s_sec = 59;
				if(s_min-1 <0)
				{
					s_min = 59;
					if(s_h-1<0)
					{
						s_h = 0;
					}
					else
					{
						s_h--;
					}
				}
				else
				{
					s_min--;
				}
			}
			else
			{
				s_sec--;
			}
			
			
			if ((s_h+s_min)==0) if (s_sec==59) 
			{ 
				$('.close_window').fadeIn(500);
				setTimeout(function(){
					$('.close_window').fadeOut(500);
				}, 10000);
			
			}
			if (s_h==0) if (s_min==0) if (s_sec==0) {location.replace('../fbf-test/exit.php');}
			
			if (s_h<10) {s_h='0'+Number(s_h);}
			if (s_min<10) {s_min='0'+Number(s_min);}
			if (s_sec<10) {s_sec='0'+Number(s_sec);}
			
			$("#s_hour").html(s_h);
			$("#s_minute").html(s_min);
			$("#s_second").html(s_sec);	
			}
	
	
	}
);

		



