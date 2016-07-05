<?php

require("../model/ConnectionUtil.php");
require("../view/MainChartView.php");
require("../model/service/AtracaoService.php");
require("../model/service/CategoriaService.php");

$func = $_POST['func'];

switch($func){

	case 'adicionar':

		$nome = $_POST['nome'];
		$local = $_POST['local'];
		$horario = $_POST['horario'];
		$descricao = $_POST['descricao'];
		$categoria = $_POST['categoria'];

		if(!AtracaoService::existeNome($nome)){

			AtracaoService::inserir($nome,$local,$horario,$descricao,$categoria);
			$atracoes = AtracaoService::getAtracoes();
			$categorias = CategoriaService::getCategorias();
			MainChartView::exibeAtracoes($atracoes,$categorias);
			
		}else{

			echo 'existe';

		}

	break;

	case 'deletar':

		$id = $_POST['id'];

		AtracaoService::deletar($id);
		$atracoes = AtracaoService::getAtracoes();
		$categorias = CategoriaService::getCategorias();
		MainChartView::exibeAtracoes($atracoes,$categorias);

	break;

	case 'alterar':

		$id = $_POST['id'];
		$nome = $_POST['nome'];
		$local = $_POST['local'];
		$horario = $_POST['horario'];
		$descricao = $_POST['descricao'];
		$categoria = $_POST['categoria'];

		if(!AtracaoService::existeNome($nome)){

			AtracaoService::alterar($id,$nome,$local,$horario,$descricao,$categoria);
			$atracoes = AtracaoService::getAtracoes();
			$categorias = CategoriaService::getCategorias();
			MainChartView::exibeAtracoes($atracoes,$categorias);
			
		}else{

			echo 'existe';

		}

	break;

	case 'erro':

		MainChartView::exibeErro();

	break;

}

?>