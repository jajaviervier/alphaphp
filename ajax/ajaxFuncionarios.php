<?php 

require_once "../controllers/funcionarios.controller.php";
require_once "../models/funcionarios.modelo.php";

Class ajaxfuncionarios {

	public $id_funcionarios;
	public $nombreFuncionarios;
	public $apellidoFuncionarios;
	public $rutFuncionarios;
	public $nacFuncionarios;
	public $fonoFuncionarios;
	public $armaFuncionario;
	public $cascoFuncionario;
	public $escudoFuncionario;
	public $imagen_funcionarios;
	public function crearFuncionarios(){
		$datos = array(
		"nombreFuncionarios"=>$this->nombreFuncionarios,
		"apellidoFuncionarios"=>$this->apellidoFuncionarios,
		"rutFuncionarios"=>$this->rutFuncionarios,
		"nacFuncionarios"=>$this->nacFuncionarios,
		"fonoFuncionarios"=>$this->fonoFuncionarios,
		"armaFuncionario"=>$this->armaFuncionario,
		"cascoFuncionario"=>$this->cascoFuncionario,
		"escudoFuncionario"=>$this->escudoFuncionario,
		"imagen"=> $this ->imagen_funcionarios);
		$respuesta = ControllerFuncionarios::ctrCrearFuncionarios($datos);
		echo $respuesta;
	}
	public function editarFuncionarios(){
		$id_funcionarios = $this->id_funcionarios;

		$respuesta = ControllerFuncionarios::ctrEditarFuncionarios($id_funcionarios);

		$datos = array("id_funcionarios"=>$id_funcionarios,
			"nombreFuncionarios"=>$this->nombreFuncionarios,
			"apellidoFuncionarios"=>$this->apellidoFuncionarios,
			"rutFuncionarios"=>$this->rutFuncionarios,
			"nacFuncionarios"=>$this->nacFuncionarios,
			"fonoFuncionarios"=>$this->fonoFuncionarios,
			"armaFuncionario"=>$this->armaFuncionario,
			"cascoFuncionario"=>$this->cascoFuncionario,
			"escudoFuncionario"=>$this->escudoFuncionario,
			"imagen"=> $this ->imagen_funcionarios);
		echo $datos;

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
	$crearNuevoFuncionarios -> nombreFuncionarios = $_POST["nombreFuncionarios"];
	$crearNuevoFuncionarios -> apellidoFuncionarios =  $_POST["apellidoFuncionarios"];
	$crearNuevoFuncionarios -> rutFuncionarios =  $_POST["rutFuncionarios"];
	$crearNuevoFuncionarios -> nacFuncionarios = $_POST["nacFuncionarios"];
	$crearNuevoFuncionarios -> fonoFuncionarios =  $_POST["fonoFuncionarios"];
	$crearNuevoFuncionarios -> armaFuncionario =  $_POST["armaFuncionario"];
	$crearNuevoFuncionarios -> cascoFuncionario = $_POST["cascoFuncionario"];
	$crearNuevoFuncionarios -> escudoFuncionario = $_POST["escudoFuncionario"];
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
	$actualizarFuncionarios -> nombreFuncionarios = $_POST["nombreFuncionarios"];
	$actualizarFuncionarios -> apellidoFuncionarios =  $_POST["apellidoFuncionarios"];
	$actualizarFuncionarios -> rutFuncionarios =  $_POST["rutFuncionarios"];
	$actualizarFuncionarios -> nacFuncionarios = $_POST["nacFuncionarios"];
	$actualizarFuncionarios -> fonoFuncionarios =  $_POST["fonoFuncionarios"];
	$actualizarFuncionarios -> armaFuncionario =  $_POST["armaFuncionario"];
	$actualizarFuncionarios -> cascoFuncionario = $_POST["cascoFuncionario"];
	$actualizarFuncionarios -> escudoFuncionario = $_POST["escudoFuncionario"];
	$actualizarFuncionarios -> imagen_funcionarios = $_FILES["imagenFuncionarios"];
	$actualizarFuncionarios -> actualizarFuncionarios();
}
if ($tipoOperacion == "eliminarFuncionarios") {
	$eliminarFuncionarios = new ajaxFuncionarios();
	$eliminarFuncionarios -> id_funcionarios = $_POST["id_funcionarios"];
	$eliminarFuncionarios -> imagen_funcionarios = $_POST["rutaImagen"];
	$eliminarFuncionarios -> eliminarFuncionarios();
}

?>