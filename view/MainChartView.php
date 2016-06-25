<?php

class MainChartView{

	public static function exibeBien(){

		echo file_get_contents('../view/content/main-chart/bien-venido.html');

	}

	public static function exibeFim(){

		echo file_get_contents('../view/content/main-chart/fim.html');

	}

	public static function exibeCategorias($categorias){

		$view = file_get_contents('../view/content/main-chart/categorias.html');

		if($categorias != null){
			for($i = 0;$i < sizeof($categorias);$i++){
				$view .= "<tr id='".$categorias[$i]->getId()."'>";

				$view .= "<td>";
				$view .= $categorias[$i]->getNome();
				$view .= "</td>";

				$view .= "<td>";
				$view .= "<i class=\"glyphicon glyphicon-remove del-cat\"></i>";
				$view .= "</td>";

				$view .= "<td>";
				$view .= "<i class=\"glyphicon glyphicon-pencil alt-cat\"></i>";
				$view .= "</td>";

				$view .= "</tr>";
			}
		}

		$view .= "</tbody>";
		$view .= "</table>";
		$view .= "</div>";

		echo $view;

	}

	public static function exibeAtracoes($atracoes){

		$view = file_get_contents('../view/content/main-chart/atracoes.html');

		if($atracoes != null){
			for($i = 0;$i < sizeof($atracoes);$i++){
				$view .= "<tr id='".$atracoes[$i]->getId()."'>";

				$view .= "<td>";
				$view .= $atracoes[$i]->getNome();
				$view .= "</td>";

				$view .= "<td>";
				$view .= $atracoes[$i]->getLocal();
				$view .= "</td>";

				$view .= "<td>";
				$view .= $atracoes[$i]->getHorario();
				$view .= "</td>";

				$view .= "<td>";
				$view .= $atracoes[$i]->getDescricao();
				$view .= "</td>";

				$view .= "<td>";
				$view .= $atracoes[$i]->getCategoria();
				$view .= "</td>";

				$view .= "<td>";
				$view .= "<i class=\"glyphicon glyphicon-remove del-atra\"></i>";
				$view .= "</td>";

				$view .= "<td>";
				$view .= "<i class=\"glyphicon glyphicon-pencil alt-atra\"></i>";
				$view .= "</td>";

				$view .= "</tr>";
			}
		}

		$view .= "</tbody>";
		$view .= "</table>";
		$view .= "</div>";

		echo $view;

	}

}

?>