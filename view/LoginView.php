<?php

class LoginView{

	public static function exibeAdministrador(){

		echo file_get_contents('../view/content/login/inicio.html');

	}

	public static function exibeLogin(){

		echo file_get_contents('../view/content/login/login.html');

	}

}

?>