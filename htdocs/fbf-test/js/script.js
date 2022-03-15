
$('document').ready(function()
	{
	//авторизуемся	
	$('.sendsubmit').click(function(){
		var login=$('input[name="login"]').val();
		var pas=$('input[name="pas"]').val();
		
		console.log(login);
		console.log(pas);
		
		$.ajax({
		  type: "POST",
		  url: '../fbf-test/avtorization.php',
		  data: { login: login, pas: pas },
		  success: function(data){
			  data=JSON.parse(data);
			  console.log(data); 
			  if (data.result=='error')//пользователь не найден
			  {
				 $('.my_error').css('display','block').text('Неверно введены логин/пароль');
			  }
			  else//пользователь найден, перекидываем на страницу с вопросами
			  {
				if(data.payment!=0)
				{
					window.location.reload('../fbf-test/protected.php');
				}
				{
					$('.my_error').css({'display':'block','position': 'absolute', 'top': '-85px'}).html('Уважаемый участник! <br><b>Факт оплаты Вами оргвзноса не установлен. </b><br>Пожалуйста, зарегистрируйтесь повторно, оплатив онлайн, либо отправьте скан-копию чека на почту fbftest.strbsu@yandex.ru.');
				}
				  
			  }
		  },
		  dataType: 'html',
		  error:function(){
			  console.log('Ошибка отправки формы');
		  }
		});

									});
									
									
									
	  $('.block_log').find('input').focus(function(){
		  $('.my_error').css('display','none');
	  });
	  
	  
	  
	  //начинаем тестирование
	  $('.push_button').click(function(){
		  console.log($(this).attr('data-category'));
		  if ($(this).is('[data-category]'))
		  {
			  console.log('есть такой атрибут');
			  location.href="page_test.php?category="+$(this).attr('data-category');
		  }
		  else
		  {
			  console.log('нет такого атрибута');
			  location.href="page_test.php";
		  }
		  
	  });
	  
	  
	  
	  
	  if ($('.navigation').length!==0)//на странице отображения вопросов
	  {
		  //ВЫБРАЛИ ВОПРОС
		  $('li[data-num-question]').click(function()
		  {
			  //выделяем вопрос
			  $('li[data-num-question]').removeClass('select_num_question');
			  $(this).addClass('select_num_question');
			  //выделяем страницу
			  var number=$(this).attr('data-num-question');
			  $('#number_question').html(number);
			  var page_num=Math.floor((number-1)/10);
			  $('.navigation').css('display','none');
			  $('.navigation:eq('+page_num+')').css('display','block');
			  
			  if (($('.navigation').length-1)==page_num)
			  {
				  $('.fa-angle-right').css('visibility','hidden');
				  $('.fa-angle-double-right').css('visibility','hidden');
			  }
			  else
			  {
				  $('.fa-angle-right').css('visibility','visible');
				  $('.fa-angle-double-right').css('visibility','visible');
			  }
			  
			  if (page_num==0)
			  {
				  $('.fa-angle-left').css('visibility','hidden');
				  $('.fa-angle-double-left').css('visibility','hidden');
			  }
			  else
			  {
				  $('.fa-angle-left').css('visibility','visible');
				  $('.fa-angle-double-left').css('visibility','visible');
			  }
			  
			  $('.block_with_question').html('');
			  //ОТОБРАЖАЕМ ВОПРОС
			  		$.ajax({
					  type: "POST",
					  url: '../fbf-test/get_question.php',
					  data: { number:number },
					  success: function(data){
						  //console.log(data);
						  $('.block_with_question').html(data);
						  $('.checkradios').checkradios();
						  
						  //ОТВЕЧАЕМ НА ВОПРОСЫ
						  $('.answer').click(function(){
							  var answer=$(this).find('input:eq(0)').val();
							  var id_question=$(this).parent('div').find('[data-id-question]:eq(0)').attr('data-id-question');
							 
							 $.ajax({
									  type: "POST",
									  url: '../fbf-test/save_answer.php',
									  data: { answer:answer, id_question:id_question },
									  success: function(data){
										  console.log(data);
										 },
									  dataType: 'html',
									  error:function(){
										  console.log('Ошибка отправки формы');
									  }
									});
					
						  });
		  
					  },
					  dataType: 'html',
					  error:function(){
						  console.log('Ошибка отправки формы');
					  }
					});
		
		  });
		  
		  //СЛЕДУЮЩАЯ СТРАНИЦА
		   $('.fa-angle-right').click(function(){
			   //номер выделенного вопроса
			   var num_question=$('.select_num_question:eq(0)').attr('data-num-question');
			   var page_num=Math.floor((num_question-1)/10)+1;
			   $('li[data-num-question="'+(page_num*10+1)+'"]').click();
		   });
		   
		   //КОНЕЧНАЯ СТРАНИЦА
		   $('.fa-angle-double-right').click(function(){
			   $('.navigation:last').children('li:eq(0)').click();
		   });
		   
		   //ПРЕДЫДУЩАЯ СТРАНИЦА
		   $('.fa-angle-left').click(function(){
			   //номер выделенного вопроса
			   var num_question=$('.select_num_question:eq(0)').attr('data-num-question');
			   var page_num=Math.floor((num_question-1)/10)-1;
			   $('li[data-num-question="'+(page_num*10+1)+'"]').click();
		   });
		   
		   //ПЕРВАЯ СТРАНИЦА
		   $('.fa-angle-double-left').click(function(){
			   $('li[data-num-question="1"]').click();
		   });
		  
		 
		 
		 var number_of_question=$('input[name="number_of_question"]:eq(0)').val();
		 $('li[data-num-question="'+number_of_question+'"]').click(); 
		 
		 
		 $('#zavershit').click(function(){
			  $('#close_test').fadeIn(500);
		 });
		 
		 //ВЫХОД
		 $('#yes').click(function(){
			 console.log('выход');
			 window.location.href="../fbf-test/exit.php";
		 });
		 
		 //ОТМЕНА ВЫХОДА
		 $('#no').click(function(){
			$('#close_test').fadeOut(500);
		 });
	  }
	  
	});