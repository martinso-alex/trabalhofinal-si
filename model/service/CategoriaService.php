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

	public static function existeId($id){

		$cat = CategoriaDao::getById($id);

		if($cat != null){
			return true;
		}else{
			return false;
		}

	}

	public static function existeNome($nome){

		$cat = CategoriaDao::getByNome($nome);

		if($cat != null){
			return true;
		}else if($nome === ""){
			return true;
		}else{
			return false;
		}

	}

}

?>