<?php

require("../view/LoginView.php");
require("../model/service/UsuarioService.php");

$func = $_POST['func'];

switch($func){

	case 'start':

		LoginView::exibeLogin();

	break;

	case 'login':

		$user = $_POST['user'];
		$pass = $_POST['pass'];

		if(UsuarioService::getUsuario($user,$pass)){

			LoginView::exibeAdministrador();

		}else{
			
			echo 'nope';

		}

	break;

	case 'logout':

		LoginView::exibeLogin();

	break;

}

?>