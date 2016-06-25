<?php

require("../model/classes/Categoria.php");
//require("../model/ConnectionUtil.php");

class CategoriaDao{

	public static function parse($record){

		if($record == null) return null;

		$categoria = new Categoria();
		$categoria->setId($record["ID"]);
		$categoria->setNome($record["NOME"]);

		return $categoria;
	}

	public static function parseList($records){

		if ($records == null)
			return null;
		
		for ($i = 0; $i < sizeof($records); $i++){
			$array[$i] = CategoriaDao::parse($records[$i]);
		}
		
		return $array;
	}

	public static function getCategorias(){

		$sql = "SELECT * FROM CATEGORIA";
		$result = ConnectionUtil::executarSelect($sql);

		return CategoriaDao::parseList($result);

	}

	public static function inserir($nome){

		$sql = "INSERT INTO CATEGORIA (NOME) VALUES ('".$nome."')";
		ConnectionUtil::executar($sql);

	}

	public static function deletar($id){

		$sql = "DELETE FROM CATEGORIA WHERE ID = " . $id;
		ConnectionUtil::executar($sql);

	}

	public static function alterar($id,$nome){

		$sql = "UPDATE CATEGORIA SET NOME = '".$nome."' WHERE ID = " . $id;
		ConnectionUtil::executar($sql);

	}

	public static function getById($id){

		$sql = "SELECT * FROM CATEGORIA WHERE ID = " . $id;
		$result = ConnectionUtil::executarSelect($sql);
		return CategoriaDao::parse($result[0]);

	}

}

?>