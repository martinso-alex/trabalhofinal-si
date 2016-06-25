<?php

$func = $_POST['func'];

switch($func){

	case 'deletar':

		$id = $_POST['id'];
		CategoriaService::deletar($id);
		$categorias = CategoriaService::getCategorias();
		MainChartView::exibeCategorias($categorias);

	break;

}

?>