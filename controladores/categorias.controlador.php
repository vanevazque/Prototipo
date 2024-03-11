<?php 

class ControladorCategorias{

	static public function ctrMostrarCategorias(){
		
		$respuesta = ModeloCategorias::mdlMostrarCategorias();

		return $respuesta;
	}

	static public function ctrRegistrarCategorias($categoria, $subdivicion, $cuenta, $fecha){

		$respuesta = ModeloCategorias::mdlRegistrarCategorias($categoria, $subdivicion, $cuenta, $fecha);

		return $respuesta;
	}

	static public function ctrEliminarCategoria($id){

		$respuesta = ModeloCategorias::mdlEliminarCategoria($id);

		return $respuesta;
	}

	static public function ctrActualizarCategoria($id,$categoria, $subdivicion, $cuenta, $fecha){

		$respuesta = ModeloCategorias::mdlActualizarCategoria($id,$categoria, $subdivicion, $cuenta, $fecha);

		return $respuesta;
	}

}