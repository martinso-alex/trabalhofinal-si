var g_alt_id;

var adicionar = function(){
	$(document).on('click','#confirm-add-atra',function(){

		var nome = $('#criar-atra-nome').val();
		var local = $('#criar-atra-local').val();
		var descricao = $('#criar-atra-descricao').val();
		var horario = $('#criar-atra-horario').val();
		var categoria = $('#criar-atra-cat').val();

		if(confirm("Tem certeza que deseja adicionar esta atração?")){
			$.ajax({
				type: "POST",
				url: 'controller/AtracaoController.php',
				data: {func:'adicionar',nome:nome,local:local,descricao:descricao,horario:horario,categoria:categoria},
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
	$(document).on('click','.del-atra',function(){

		var id = $(this).parent().parent().attr("id");

		if(confirm("Tem certeza que deseja deletar esta atração?")){
			$.ajax({
				type: "POST",
				url: 'controller/AtracaoController.php',
				data: {func:'deletar',id:id},
				success: function(data){
					$('#main-chart').html(data);
				}
			});
		}

	});
}

var alterar = function(){
	$(document).on('click','.alt-atra',function(){

		g_alt_id = $(this).parent().parent().attr("id");
		$('#alterar').show();
		$('#adicionar').hide();
		$('tr').removeClass('info');
		$(this).parent().parent().addClass("info");

	});
}

var cancelar_alterar = function(){
	$(document).on('click','#unconfirm-alt-atra',function(){

		$('#alterar').hide();
		$('#erro-alt').hide();
		$('#adicionar').show();
		$('tr').removeClass('info');

	});
}

var confirmar_alterar = function(){
	$(document).on('click','#confirm-alt-atra',function(){

		var nome = $('#alterar-atra-nome').val();
		var local = $('#alterar-atra-local').val();
		var descricao = $('#alterar-atra-descricao').val();
		var horario = $('#alterar-atra-horario').val();
		var categoria = $('#alterar-atra-cat').val();

		$.ajax({
			type: "POST",
			url: 'controller/AtracaoController.php',
			data: {func:'alterar',id:g_alt_id,nome:nome,local:local,descricao:descricao,horario:horario,categoria:categoria},
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
		url: 'controller/AtracaoController.php',
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