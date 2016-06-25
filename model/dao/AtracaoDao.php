<?php

require("../model/classes/Atracao.php");
//require("../model/ConnectionUtil.php");

class AtracaoDao{

	public static function parse($record){

		if($record == null) return null;

		$atracao = new Atracao();
		$atracao->setId($record["ID"]);
		$atracao->setNome($record["NOME"]);
		$atracao->setLocal($record["LOCAL"]);
		$atracao->setHorario($record["HORARIO"]);
		$atracao->setDescricao($record["DESCRICAO"]);
		$atracao->setCategoria($record["CATEGORIA"]);

		return $atracao;
	}

	public static function parseList($records){

		if ($records == null)
			return null;
		
		for ($i = 0; $i < sizeof($records); $i++){
			$array[$i] = AtracaoDao::parse($records[$i]);
		}
		
		return $array;
	}

	public static function getAtracoes(){

		$sql = "SELECT ATRACAO.ID AS ID, ATRACAO.NOME AS NOME, LOCAL, HORARIO, DESCRICAO, CATEGORIA.NOME AS CATEGORIA 
				FROM ATRACAO,CATEGORIA 
				WHERE ID_CAT = CATEGORIA.ID";

		$result = ConnectionUtil::executarSelect($sql);

		return AtracaoDao::parseList($result);

	}

	public static function inserir($nome,$local,$horario,$descricao,$id_cat){

		$sql = "INSERT INTO ATRACAO (NOME,LOCAL,HORARIO,DESCRICAO,ID_CAT)
				VALUES ('".$nome."','".$local."','".$horario."','".$descricao."','".$id_cat."')";

		ConnectionUtil::executar($sql);

	}

	public static function deletar($id){

		$sql = "DELETE FROM ATRACAO WHERE ID = " . $id;
		ConnectionUtil::executar($sql);

	}

	public static function alterar($id,$nome,$local,$horario,$descricao,$id_cat){

		$sql = "UPDATE ATRACAO
				SET NOME = '".$nome."', LOCAL = '".$local."', HORARIO = '".$horario."', 
					DESCRICAO = '".$descricao."', ID_CAT = '".$id_cat."'
				WHERE ID = ".$id;

		ConnectionUtil::executar($sql);

	}

	public static function getById($id){

		$sql = "SELECT ATRACAO.ID AS ID, ATRACAO.NOME AS NOME, LOCAL, HORARIO, DESCRICAO, CATEGORIA.NOME AS CATEGORIA 
				FROM ATRACAO,CATEGORIA 
				WHERE ID_CAT = CATEGORIA.ID AND ID = ".$id;

		$result = ConnectionUtil::executarSelect($sql);
		return AtracaoDao::parse($result[0]);

	}

}

?>