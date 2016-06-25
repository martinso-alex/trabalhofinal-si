var start = function(){
	$.ajax({
		type: "POST",
		url: 'controller/LoginController.php',
		data: {func:'start'},
		success: function(data){
			$('#spa-content').html(data);
		}
	});
}

var login = function(){
	$(document).on('click','#login',function(){

		var user = $('#username').val();
		var pass = $('#password').val();

		$.ajax({
			type: "POST",
			url: 'controller/LoginController.php',
			data: {func:'login',user:user,pass:pass},
			success: function(data){
				if(data != 'nope'){
					$('#spa-content').html(data);
				}else{
					$('#login-fail').show();
				}
			}
		});
	});
}

var logout = function(){
	$(document).on('click','#logout',function(){
		$.ajax({
			type: "POST",
			url: 'controller/LoginController.php',
			data: {func:'logout'},
			success: function(data){
				$('#spa-content').html(data);
			}
		});
	});
}

var close_alert = function(){
	$(document).on('click','#close-alert',function(){
		$('#close-alert').parent().hide();
	});
}

$(document).ready(start);
$(document).ready(login);
$(document).ready(logout);
$(document).ready(close_alert);