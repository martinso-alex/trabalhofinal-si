var g_alt_id;

var adicionar = function(){
	$(document).on('click','#confirm-add-cat',function(){

		var nome = $('#criar-cat').val();

		if(confirm("Tem certeza que deseja adicionar esta categoria?")){
			$.ajax({
				type: "POST",
				url: 'controller/CategoriaController.php',
				data: {func:'adicionar',nome:nome},
				success: function(data){
					if(data != "existe"){
						$('#main-chart').html(data);
					}else{
						erro('#erro-add');
					}
				}
			});
		}

	});
}

var deletar = function(){
	$(document).on('click','.del-cat',function(){

		var id = $(this).parent().parent().attr("id");

		if(confirm("Tem certeza que deseja deletar esta categoria?")){
			$.ajax({
				type: "POST",
				url: 'controller/CategoriaController.php',
				data: {func:'deletar',id:id},
				success: function(data){
					$('#main-chart').html(data);
				}
			});
		}

	});
}

var alterar = function(){
	$(document).on('click','.alt-cat',function(){

		g_alt_id = $(this).parent().parent().attr("id");
		$('#alterar').show();
		$('#adicionar').hide();
		$('tr').removeClass('info');
		$(this).parent().parent().addClass("info");

	});
}

var cancelar_alterar = function(){
	$(document).on('click','#unconfirm-alt-cat',function(){

		$('#alterar').hide();
		$('#erro-alt').hide();
		$('#adicionar').show();
		$('tr').removeClass('info');

	});
}

var confirmar_alterar = function(){
	$(document).on('click','#confirm-alt-cat',function(){

		var nome = $('#alterar-cat').val();

		$.ajax({
			type: "POST",
			url: 'controller/CategoriaController.php',
			data: {func:'alterar',id:g_alt_id,nome:nome},
			success: function(data){
				if(data != "existe"){
					$('#main-chart').html(data);
				}else{
					erro('#erro-alt');
				}
			}
		});

	});
}

var erro = function(id){
	$.ajax({
			type: "POST",
			url: 'controller/CategoriaController.php',
			data: {func:'erro'},
			success: function(data){
				$(id).html(data);
				$(id).show();
			}
		});
}

var close = function(){
	$(document).on('click','.close',function(){
		$(this).parent().parent().hide();
	});
}

$(document).ready(adicionar);
$(document).ready(deletar);
$(document).ready(alterar);
$(document).ready(cancelar_alterar);
$(document).ready(confirmar_alterar);
$(document).ready(close);