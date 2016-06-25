<?php

require("../model/dao/AtracaoDao.php");

class AtracaoService{

	public static function getAtracoes(){

		return AtracaoDao::getAtracoes();

	}

	public static function inserir($nome,$local,$horario,$descricao,$id_cat){

		return AtracaoDao::inserir($nome,$local,$horario,$descricao,$id_cat);

	}

	public static function deletar($id){

		return AtracaoDao::deletar($id);

	}

	public static function alterar($id,$nome,$local,$horario,$descricao,$id_cat){

		return AtracaoDao::alterar($id,$nome,$local,$horario,$descricao,$id_cat);

	}

	public static function getById($id){

		return AtracaoDao::getById($id);

	}

}

?>