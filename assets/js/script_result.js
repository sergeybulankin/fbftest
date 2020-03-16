$(document).ready(function(){

	$(".set_payment").find('input').change(function(el){
		let checked = $(this).prop('checked');

		if (checked)
		{
			text = "Вы действительно хотите подвердить факт оплаты наличием чека (участник "+$(this).parents(".set_payment").attr("data-name")+")?";
		}
		else
		{
			text = "Вы действительно хотите отменить факт оплаты (участник "+$(this).parents(".set_payment").attr("data-name")+")?";
		}
		
		let result = confirm(text);

		console.log(result);
		if(result)
		{
			//отменяем/подтверждаем факт оплаты
			ball = $(this).parents(".set_payment").attr("data-ball");
			id_students = $(this).parents(".set_payment").attr("data-id_students");
			if ((ball==0) && (!checked)) { $(this).parents("tr").attr("style","color:#9e9e9ea8"); } 
			if ((ball!=0) && (!checked)) { $(this).parents("tr").attr("style","color:red"); } 
			if ((ball==0) && checked) { $(this).parents("tr").attr("style","color:green"); }
			if ((ball!=0) && (checked)) { $(this).parents("tr").attr("style","color:inherit"); }  

			$.post("../payment_status_update.php",{id_students: id_students, payment: checked},
				function(data){
					console.log(data);
				});
		}
		else
		{
			if(checked)
			{
				$(this).prop('checked',false)	
			}
			else
			{
				$(this).prop('checked',true)	
			}
			
		}
		
	});
});