<?php 

require_once "conexion.php";

class ModeloCategorias{

	static public function mdlMostrarCategorias(){

		$stmt = Conexion::conectar()-> prepare("SELECT id,categoria,subdivicion,cuenta,fecha,'X' as acciones FROM datos");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt = null;
	}

	static public function mdlRegistrarCategorias($categoria, $subdivicion, $cuenta, $fecha){

		$stmt = Conexion::conectar()->prepare("INSERT INTO datos(categoria,subdivicion,cuenta,fecha) VALUES (:categoria,:subdivicion,:cuenta,:fecha)");

		$stmt -> bindParam(":categoria", $categoria, PDO::PARAM_STR);
		$stmt -> bindParam(":subdivicion", $subdivicion, PDO::PARAM_STR);
		$stmt -> bindParam(":cuenta", $cuenta, PDO::PARAM_STR);
		$stmt -> bindParam(":fecha", $fecha, PDO::PARAM_STR);

		if($stmt -> execute()){
            return "La categoría se registró correctamente";
        }else{
            return "Error, no se pudo registrar la categoría";
        }        

        $stmt = null;

	}

	static public function mdlEliminarCategoria($id){

		$stmt = Conexion::conectar()->prepare("DELETE FROM datos WHERE id = :id");

		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);

		if($stmt -> execute()){
            return "La categoría se eliminó correctamente";
        }else{
            return "Error, no se pudo eliminar la categoría";
        }        

        $stmt = null;

	}

	static public function mdlActualizarCategoria($id,$categoria, $subdivicion, $cuenta, $fecha){

		$stmt = Conexion::conectar()->prepare("UPDATE datos
											   SET categoria = :categoria,
											   	   subdivicion = :subdivicion,
												   cuenta = :cuenta,
												   fecha = :fecha
											   WHERE id = :id");

		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);
		$stmt -> bindParam(":categoria", $categoria, PDO::PARAM_STR);
		$stmt -> bindParam(":subdivicion", $subdivicion, PDO::PARAM_STR);
		$stmt -> bindParam(":cuenta", $cuenta, PDO::PARAM_STR);
		$stmt -> bindParam(":fecha", $fecha, PDO::PARAM_STR);

		if($stmt -> execute()){
            return "La categoría se actualizó correctamente";
        }else{
            return "Error, no se pudo actualizar la categoría";
        }        

        $stmt = null;
	}
	

}