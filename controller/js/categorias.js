var deletar = function(){
	$(document).on('click','.remove-cat',function(){

		var id = $(this).parent().parent().attr("id");

		$.ajax({
			type: "POST",
			url: 'controller/CategoriaController.php',
			data: {func:'deletar',id:id},
			success: function(data){
				$('#main-chart').html(data);
			}
		});
	});
}

$(document).ready(deletar);