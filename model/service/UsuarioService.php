<?php

require("../model/dao/UsuarioDao.php");

class UsuarioService{

	public static function getUsuario($user,$pass){

		if(UsuarioDao::getUsuario($user,$pass) != null){

			return true;

		}else{
			
			return false;

		}

	}

}

?>