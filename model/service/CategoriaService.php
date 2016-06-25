<?php

require("../model/dao/CategoriaDao.php");

class CategoriaService{

	public static function getCategorias(){

		return CategoriaDao::getCategorias();

	}

	public static function inserir($nome){

		return CategoriaDao::inserir($nome);

	}

	public static function deletar($id){

		return CategoriaDao::deletar($id);

	}

	public static function alterar($id,$nome){

		return CategoriaDao::alterar($id,$nome);

	}

	public static function getById($id){

		return CategoriaDao::getById($id);

	}

}

?>