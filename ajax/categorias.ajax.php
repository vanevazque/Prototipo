<?php 

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class ajaxCategorias{

	public $id;
	public $alumno;
	public $materia;
	public $calificacion;
	public $fecha;

	public function MostrarCategorias(){

		$respuesta = ControladorCategorias::ctrMostrarCategorias();

		echo json_encode($respuesta);
	}

	public function registrarCategorias(){
		
		$respuesta = ControladorCategorias::ctrRegistrarCategorias($this->categoria, $this->subdivicion, $this->cuenta, $this->fecha);

		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}

	public function eliminarCategoria(){
		
		$respuesta = ControladorCategorias::ctrEliminarCategoria($this->id);

		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}

	public function actualizarCategoria(){
		
		$respuesta = ControladorCategorias::ctrActualizarCategoria($this->id,$this->categoria, $this->subdivicion, $this->cuenta, $this->fecha);

		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}
	
}

if(!isset($_POST["accion"])){
	$respuesta = new ajaxCategorias();
	$respuesta -> MostrarCategorias();
}else{

	if($_POST["accion"] == "registrar"){
		$insertar = new ajaxCategorias();
		$insertar->categoria = $_POST["categoria"];
		$insertar->subdivicion = $_POST["subdivicion"];
		$insertar->cuenta = $_POST["cuenta"];
		$insertar->fecha = $_POST["fecha"];
		$insertar->registrarCategorias();
	}

	if($_POST["accion"] == "eliminar"){
		$eliminar = new ajaxCategorias();

		$eliminar->id = $_POST["id"];
		
		$eliminar->eliminarCategoria();
	}

	if($_POST["accion"] == "actualizar"){
		$actualizar = new ajaxCategorias();

		$actualizar->id = $_POST["id"];
		$actualizar->categoria = $_POST["categoria"];
		$actualizar->subdivicion = $_POST["subdivicion"];
		$actualizar->cuenta = $_POST["cuenta"];
		$actualizar->fecha = $_POST["fecha"];
		
		$actualizar->actualizarCategoria();
	}

}




