	$(document).ready(function(){

	$('.checkradios').checkradios();
	

	$('.for_checkbox').click(function(){
							$(this).prev('div').click();
	});

	$('#href_with_agreement').mouseover(function(){
		$('#agreement').css('display','block');
	});

	$('#href_with_agreement').mouseout(function(){
		$('#agreement').css('display','none');
	});
	
	//console.log(JSON.parse('{error: "false", log: "ertee", pas: "8d370799"}');

	$('input.required').focus(function(){
		$(this).next('span').addClass('error-none');
		$(this).removeClass('input-error');
	});

	
	$('#seriya').mask('99 99'); 
	$('#nomer').mask('999999'); 
	$('#inn').mask('999999999999'); 
	$('#phone').mask('+7(999)-999-99-99'); 
	
	//Первый класс отмечен по умолчанию
	$('.block_inline_class').click(function(){$(this).find('label')[0].click();});
	
	//Учение/студент
	$('.section label').click(function(){
									    var id=$(this).attr('for');	
										//console.log(id);
										if (id=="1_1")
										{
											$('.class_student').css('display','block');
										}
										else
										{
											$('.class_student').css('display','none');
										}
	});
	
	$('.section').find('.checkradios-radio').click(function(){$(this).next('label').click();}); 
	
	$('.a_href').click(function(){	/*
									console.log($(this).attr('id'));
									var fam=$('input[name=fam]:eq(0)').val();
									var name=$('input[name=name]:eq(0)').val();
									var pat=$('input[name=pat]:eq(0)').val();
									 */
									// console.log($('form:eq(0)'));
									if ($(this).attr('id')=='contract')
									{
									 $('form:eq(0)').attr('action','make_pdf_contract.php');
									 $('form:eq(0)').submit();
									}
									
									if ($(this).attr('id')=='receipt')
									{
									 //var vsp_str='<iframe src="http://fbftest.strbsu.ru/make_pdf_receipt.php?fam='+fam+'&name='+name+'&pat='+pat+'" style="visibility:hidden;"></iframe>';
									 //$('body').append(vsp_str);
									 $('form:eq(0)').attr('action','make_pdf_receipt.php');
									 $('form:eq(0)').submit();
									}
									
	});	
	
	});
	
	
	function next_step(btn){
		
		if(!$(btn).hasClass('disabled'))
		{
			if ($('.rms-current-section').length!==0)
						{
						//ищем открытый шаг
						var mas=$('.rms-current-section:eq(0)').attr("id");
						var step=mas.split("_")[1];
						switch(step) {

							 			case "1":  
										var count_of_error=0;
										//Фамилия
										var fam=$('[name="fam_parent"]').val().replace(/\s*/g,'');
										if (fam=='') { print_error("fam_parent"); count_of_error++;}
										
										//Имя
										var name=$('[name="name_parent"]').val().replace(/\s*/g,'');
										if (fam=='') { print_error("name_parent"); count_of_error++;}
										
										//Адрес
										var adress=$('[name="adress"]').val().replace(/\s*/g,'');
										if (adress=='') { print_error("adress"); count_of_error++;}
										
										//Серия
										var seriya=$('[name="seriya"]').val().replace(/\s*/g,'');
										if (seriya=='') { print_error("seriya"); count_of_error++;}
										
										//Номер
										var nomer=$('[name="nomer"]').val().replace(/\s*/g,'').replace(/\s*_/g,'');
										console.log("Тип number:");
										console.log(typeof nomer);
										console.log(nomer);
										if (nomer=='') { print_error("nomer"); count_of_error++;}
										
										//Email
										var email=$('[name="email"]').val().replace(/\s*/g,'');
										
										if (!isValidEmailAddress(email))
										{
											$('[name="email"]').addClass('input-error');
											$('[name="email"]').next('span').removeClass('error-none');
											count_of_error++;
										}
										
										//console.log(count_of_error);
										
										//Если ошибок нет, открываем следующую страницу
										if (count_of_error==0)
										{
											$('#step_2').addClass('rms-current-section');
											$('#step_1').removeClass('rms-current-section');
											$('.rms-multistep-progressbar').children('li:eq(0)').removeClass('rms-current-step');
											$('.rms-multistep-progressbar').children('li:eq(0)').addClass('completed-step');
											$('.rms-multistep-progressbar').children('li:eq(1)').addClass('rms-current-step');
											$('.prev').css('visibility','visible');
											$('.prev').css('display','block');
										}
										
										break;

									  case "2":   
										var count_of_error=0;
										//Фамилия
										var fam=$('[name="fam"]').val().replace(/\s*/g,'');										
										if (fam=='') { print_error("fam"); count_of_error++;}
										
										//Имя
										var name=$('[name="name"]').val().replace(/\s*/g,'');									
										if (name=='') { print_error("name"); count_of_error++;}
										
										//Школа
										var school=$('[name="school"]').val().replace(/\s*/g,'');
										if (school=='') { print_error("school"); count_of_error++;} 
										
										//Телефон
										var phone=$('[name="phone"]').val().replace('+7','');
										phone=phone.replace('(','');
										phone=phone.replace(')','');
										phone=phone.replace(/-/g,'');
										
										if (phone=='') { print_error("phone"); count_of_error++;}
										
										//Класс
										
										var class_of_stud=$('[name="category"]').val();
										var number_of_class=0;
										
										if (class_of_stud==1)
										{
											number_of_class=$('[name="class_stud"]').val();
										}
										
										//Город
										var city=$('[name="city"]').val().replace(/\s*/g,'');
										if (city=='') { print_error("city"); count_of_error++;}
										
										
										//Руководитель
										var ruk=$('[name="ruk"]').val().replace(/\s*/g,'');
										
										if (ruk=='') { print_error("ruk"); count_of_error++;}
										
										//console.log(count_of_error);
										
										//Если ошибок нет, открываем следующую страницу
										if (count_of_error==0)
										{
											//блокируем кнопку Далее и Назад
											$(btn).addClass("disabled");
											$(".prev p").addClass("disabled");
											//выводим сообщение
											$(".save_data").css('display','block');
											//Сохранение данных пользователя, отправка письма
											 var msg   = $('#data_of_student').serialize();
											 $.ajax({
													type: 'POST',
													url: 'Set_data_of_student.php', 
													data: msg,
													dataType:"json",
													success: function(data) {
																			 console.log(data);
																			 $(btn).removeClass("disabled");
																			 $(".prev p").removeClass("disabled");
																			 $(".save_data").css('display','none');
																			 data=JSON.stringify(data);
																			 data=JSON.parse(data);
																		     if (data.error!=='true')
																			 {
																				 /*$('.msg').text('Регистрация успешно завершена!');
																				 $('.msg').css('color','#639833');
																				 $('#log').text(data.log);
																				 $('#pas').text(data.pas);*/
																				 //$('#step_3').addClass('rms-current-section');

																				//Закрываем кнопку Назад, добавляем кнопку Завершить
																				//$('.prev').css('visibility','hidden');
																				$('.prev').css('display','none');
																				$('.next').find('p').removeClass('btn');
																				$('.next').find('p').addClass('btn_end');
																				$('.next').find('p').text('завершить');

																				//Все шаги пройдены
																				$('#step_3').addClass('rms-current-section');
																				$('#step_2').removeClass('rms-current-section');
																				$('.rms-multistep-progressbar').children('li:eq(1)').removeClass('rms-current-step');
																				$('.rms-multistep-progressbar').children('li:eq(1)').addClass('completed-step');
																				$('.rms-multistep-progressbar').children('li:eq(2)').addClass('completed-step');
																				//$('.rms-multistep-progressbar').children('li:eq(2)').addClass('rms-current-step');
																				//$('.prev').css('visibility','visible');
																				//$('.prev').css('display','block'); 
																				$('input[name="id_students"]').val(data.id_students);
																			 }
																			 else
																			 {
																				 /*$('.msg').text('Произошла ошибка при работе с базой данных!');
																				 $('.msg').css('color','red');*/
																				 alert('Произошла ошибка при работе с базой данных! Пожалуйста, обратитесь в оргкомитет интернет-олимпиады.');
																			 }
																			 
																			 //console.log(data);
																			},
													error:  function(data){
														console.log(data);
														$(btn).removeClass("disabled");
														$(".prev p").removeClass("disabled");
													}
													});
										}
										break;
									 
									  case "3":  
									  		location.reload();
											/*$('#step_4').addClass('rms-current-section');
											$('#step_3').removeClass('rms-current-section');
											$('.rms-multistep-progressbar').children('li:eq(2)').removeClass('rms-current-step');
											$('.rms-multistep-progressbar').children('li:eq(2)').addClass('completed-step');
											$('.rms-multistep-progressbar').children('li:eq(3)').addClass('completed-step');
											$('.prev').css('visibility','hidden');
											$('.prev').css('display','block');
											//$('.next').css('visibility','hidden');
											$('.next').find('p').removeClass('btn');
											$('.next').find('p').addClass('btn_end');
											$('.next').find('p').text('завершить');
											*/
											
										break;
										
									    /*case "4":  
											location.reload();
										break;*/
										
									  default:
										console.log("ошибка");
									}
						}
						else//ознакомились с условиями оферты
						{
							$('#step_1').addClass('rms-current-section'); 
							$('.rms-multistep-progressbar').children('li:eq(0)').addClass('rms-current-step');
							$('.none_visibility').removeClass('none_visibility');
							$('.oferta').addClass('none_visibility');
							
							$('.prev').css('visibility','visible');
							$('.prev').css('display','block');
							$('#check_agreement').css('display','none');
						}
								//input-error
								//error-none
		}

	};
	
	
		function prev_step(btn){

						if(!$(btn).hasClass("disabled"))
						{
							//ищем открытый шаг
						var mas=$('.rms-current-section:eq(0)').attr("id");
						var step=mas.split("_")[1]-1;
						console.log(step);
						switch(step) {
									   case 0:  
										//открываем предыдущую страницу
										
											$('.none_visibility').addClass('none_visibility');
											$('.oferta').removeClass('none_visibility');
							
											$('#step_1').removeClass('rms-current-section');
											$('.rms-content-section').addClass('none_visibility');
											$('.rms-step-section').addClass('none_visibility');
											
										
											$('.prev').css('visibility','hidden');
											$('.prev').css('display','none');
											$('#check_agreement').css('display','block');
										break;
										
									  case 1:  
										//открываем предыдущую страницу
											$('#step_2').removeClass('rms-current-section');
											$('#step_1').addClass('rms-current-section');
											$('.rms-multistep-progressbar').children('li:eq(0)').addClass('rms-current-step');
											$('.rms-multistep-progressbar').children('li:eq(0)').removeClass('completed-step');
											$('.rms-multistep-progressbar').children('li:eq(1)').removeClass('rms-current-step');
											$('.prev').css('visibility','visible');
											$('.prev').css('display','block');
										
										break;
									  case 2:  
										//открываем предыдущую страницу
											$('#step_3').removeClass('rms-current-section');
											$('#step_2').addClass('rms-current-section');
											$('.rms-multistep-progressbar').children('li:eq(1)').addClass('rms-current-step');
											$('.rms-multistep-progressbar').children('li:eq(1)').removeClass('completed-step');
											$('.rms-multistep-progressbar').children('li:eq(2)').removeClass('rms-current-step');
											
										break;
									  case 3:  
										//открываем предыдущую страницу
											$('#step_4').removeClass('rms-current-section');
											$('#step_3').addClass('rms-current-section');
											$('.rms-multistep-progressbar').children('li:eq(2)').addClass('rms-current-step');
											$('.rms-multistep-progressbar').children('li:eq(2)').removeClass('completed-step');
											$('.rms-multistep-progressbar').children('li:eq(3)').removeClass('rms-current-step');
											
										break;
									  default:
										console.log("ошибка");
									}
								//input-error
								//error-none
						}
						
							};
							
							
function isValidEmailAddress(emailAddress) {//регулярное выражение проверяет валидность вводимого email При вводе в форму
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
    }

function print_error(name,count_of_error){
	$('[name="'+name+'"]').addClass('input-error');
	$('[name="'+name+'"]').next('span').removeClass('error-none'); 
}


function payment(btn){
	 if(!$(btn).hasClass("disabled")){
	 	$(btn).addClass("disabled");
	 	//Сохранение данных пользователя, отправка письма
		 var msg   = $('#data_of_student').serialize();
		 $.ajax({
				type: 'POST',
				url: 'get_url_for_payment.php', 
				data: msg,
				dataType:"json",
				success: function(info) {
										 try
						    				{
						    					let data=JSON.parse(info);
						    					console.log(data);
						    					if (data.result=="ok")
						    					{
						    						console.log(data);   
						    						window.location.href=data.url;//отправляем пользователя на оплату 
						    					}
						    					else
						    					{
						    					   alert("Ошибка! "+data.msg);	
						    					}
						    					
						    				}
						    				catch 
						    				{
						    					alert("Неизвестная ошибка! Обратитесь к организаторам интернет-олимпиады");
						    					
											}
											$(btn).removeClass("disabled");
										},
				error:  function(data){
					$(btn).removeClass("disabled");
					console.log('ошибка работы ajax запроса');
				}
				});
	 }
	
}
    /*

	$('#callback-checkbox').checkradios({

	    onChange: function(checked, $element, $realElement){


		   if(checked){

		       $('.status').html('Checked').css('color', 'green');

		   }else{

		       $('.status').html('Not Checked').css('color', 'red');

		   }

		}


	});
});*/