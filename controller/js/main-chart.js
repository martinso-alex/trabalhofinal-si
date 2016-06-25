var bien_venido = function(){
	$(document).on('click','#bien-venido',function(){
		$.ajax({
			type: "POST",
			url: 'controller/MainChartController.php',
			data: {func:'bien'},
			success: function(data){
				$('#main-chart').html(data);
			}
		});
	});
}

var categorias = function(){
	$(document).on('click','#categorias',function(){
		$.ajax({
			type: "POST",
			url: 'controller/MainChartController.php',
			data: {func:'cat'},
			success: function(data){
				$('#main-chart').html(data);
			}
		});
	});
}

var atracoes = function(){
	$(document).on('click','#atracoes',function(){
		$.ajax({
			type: "POST",
			url: 'controller/MainChartController.php',
			data: {func:'atra'},
			success: function(data){
				$('#main-chart').html(data);
			}
		});
	});
}

var fim = function(){
	$(document).on('click','#fim',function(){
		$.ajax({
			type: "POST",
			url: 'controller/MainChartController.php',
			data: {func:'fim'},
			success: function(data){
				$('#main-chart').html(data);
			}
		});
	});
}

$(document).ready(bien_venido);
$(document).ready(categorias);
$(document).ready(atracoes);
$(document).ready(fim);