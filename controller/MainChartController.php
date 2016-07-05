<?php

require("../model/ConnectionUtil.php");
require("../view/MainChartView.php");
require("../model/service/CategoriaService.php");
require("../model/service/AtracaoService.php");

$func = $_POST['func'];

switch ($func) {
	
	case 'bien':
		
		MainChartView::exibeBien();

	break;

	case 'cat':

		$categorias = CategoriaService::getCategorias();
		MainChartView::exibeCategorias($categorias);

	break;

	case 'atra':

		$atracoes = AtracaoService::getAtracoes();
		$categorias = CategoriaService::getCategorias();
		MainChartView::exibeAtracoes($atracoes,$categorias);

	break;

	case 'fim':

		MainChartView::exibeFim();

	break;

}

?>