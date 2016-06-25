<?php

require("../model/classes/Usuario.php");
require("../model/ConnectionUtil.php");

class UsuarioDao{

	public static function parse($record){

		if($record == null) return null;

		$usuario = new Usuario();
		$usuario->setUser($record["USER"]);
		$usuario->setPass($record["PASSWORD"]);

		return $usuario;
	}

	public static function parseList($records){

		if ($records == null)
			return null;
		
		for ($i = 0; $i < sizeof($records); $i++){
			$array[$i] = UsuarioDao::parse($records[$i]);
		}
		
		return $array;
	}

	public function getUsuario($user,$pass){

		$sql = "SELECT * FROM USUARIO WHERE USER = '".$user."' AND PASSWORD = '".$pass."'";
		$result = ConnectionUtil::executarSelect($sql);
		return UsuarioDao::parse($result[0]);

	}

}

?>