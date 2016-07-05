<?php

require("../model/ConnectionUtil.php");
require("../view/MainChartView.php");
require("../model/service/CategoriaService.php");

$func = $_POST['func'];

switch($func){

	case 'adicionar':

		$nome = $_POST['nome'];

		if(!CategoriaService::existeNome($nome)){

			CategoriaService::inserir($nome);
			$categorias = CategoriaService::getCategorias();
			MainChartView::exibeCategorias($categorias);

		}else{

			echo 'existe';

		}

	break;

	case 'deletar':

		$id = $_POST['id'];

		CategoriaService::deletar($id);
		$categorias = CategoriaService::getCategorias();
		MainChartView::exibeCategorias($categorias);

	break;

	case 'alterar':

		$id = $_POST['id'];
		$nome = $_POST['nome'];

		if(!CategoriaService::existeNome($nome)){

			CategoriaService::alterar($id,$nome);
			$categorias = CategoriaService::getCategorias();
			MainChartView::exibeCategorias($categorias);

		}else{

			echo 'existe';

		}

	break;

	case 'erro':

		MainChartView::exibeErro();

	break;

}

?>