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


function get_rec(id_students)
{
	var link_url = document.createElement("a");
	var url = "../../generate_pdf_rec.php?id_students="+id_students;
	link_url.download = url.substring((url.lastIndexOf("/") + 1), url.length);
	link_url.href = url;
	document.body.appendChild(link_url);
	link_url.click();
	document.body.removeChild(link_url);
	delete link_url;
	
	//$.post("../../generate_pdf_rec.php");
}
