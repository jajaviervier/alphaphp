<?php 

require_once "../controllers/funcionarios.controller.php";
require_once "../models/funcionarios.modelo.php";

Class ajaxFuncionarios {

	public $id_funcionarios;
	public $titulo_funcionarios;
	public $descripcion_funcionarios;
	public $vinculo_funcionarios;
	public $imagen_funcionarios;
	public $rutaActual;

	public function crearFuncionarios(){
		$datos = array("titulo"=>$this->titulo_funcionarios,
						"descripcion"=>$this->descripcion_funcionarios,
						"vinculo"=>$this->vinculo_funcionarios,
						"imagen"=>$this->imagen_funcionarios);

		$respuesta = ControllerFuncionarios::ctrCrearFuncionarios($datos);

		echo $respuesta;
	}
	public function editarFuncionarios(){
		$id_funcionarios = $this->id_funcionarios;

		$respuesta = ControllerFuncionarios::ctrEditarFuncionarios($id_funcionarios);

		$datos = array("id_funcionarios"=>$respuesta["id"],
						"titulo_funcionarios"=>$respuesta["titulo"],
						"descripcion"=>$respuesta["descripcion"],
						"vinculo"=>$respuesta["url"],
						"imagen"=>substr($respuesta["rutaImg"], 3)
						);

		echo json_encode($datos);

	}
	public function actualizarFuncionarios(){
		$datos = array( "id_funcionarios"=>$this->id_funcionarios,
						"titulo"=>$this->titulo_funcionarios,
						"descripcion"=>$this->descripcion_funcionarios,
						"vinculo"=>$this->vinculo_funcionarios,
						"imagen"=>$this->imagen_funcionarios,
						"rutaActual"=>$this->rutaActual
						);

		$respuesta = ControllerFuncionarios::ctrActualizarFuncionarios($datos);

		echo $respuesta;
	}
	public function eliminarFuncionarios(){
		$id_funcionarios = $this->id_funcionarios;
		$ruta = $this->imagen_funcionarios;

		$respuesta = ControllerFuncionarios::ctrEliminarFuncionarios($id_funcionarios, $ruta);

		echo $respuesta;

	}

}

$tipoOperacion = $_POST["tipoOperacion"];

if($tipoOperacion == "insertarFuncionarios") {
	$crearNuevoFuncionarios = new ajaxFuncionarios();
	$crearNuevoFuncionarios -> titulo_funcionarios = $_POST["tituloFuncionarios"];
	$crearNuevoFuncionarios -> descripcion_funcionarios = $_POST["descripcionFuncionarios"];
	$crearNuevoFuncionarios -> vinculo_funcionarios = $_POST["urlFuncionarios"];
	$crearNuevoFuncionarios -> imagen_funcionarios = $_FILES["imagenFuncionarios"];
	$crearNuevoFuncionarios ->crearFuncionarios();
}

if ($tipoOperacion == "editarFuncionarios") {
	$editarFuncionarios = new ajaxFuncionarios();
	$editarFuncionarios -> id_funcionarios = $_POST["id_funcionarios"];
	$editarFuncionarios -> editarFuncionarios();
}
if ($tipoOperacion == "actualizarFuncionarios") {
	$actualizarFuncionarios = new ajaxFuncionarios();
	$actualizarFuncionarios -> id_funcionarios = $_POST["id_funcionarios"];
	$actualizarFuncionarios -> titulo_funcionarios = $_POST["tituloFuncionarios"];
	$actualizarFuncionarios -> descripcion_funcionarios = $_POST["descripcionFuncionarios"];
	$actualizarFuncionarios -> vinculo_funcionarios = $_POST["urlFuncionarios"];
	$actualizarFuncionarios -> imagen_funcionarios = $_FILES["imagenFuncionarios"];
	$actualizarFuncionarios -> rutaActual = $_POST["rutaActual"];
	$actualizarFuncionarios -> actualizarFuncionarios();
}
if ($tipoOperacion == "eliminarFuncionarios") {
	$eliminarFuncionarios = new ajaxFuncionarios();
	$eliminarFuncionarios -> id_funcionarios = $_POST["id_funcionarios"];
	$eliminarFuncionarios -> imagen_funcionarios = $_POST["rutaImagen"];
	$eliminarFuncionarios -> eliminarFuncionarios();
}

?>