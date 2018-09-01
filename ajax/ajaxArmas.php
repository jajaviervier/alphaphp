<?php 

require_once "../controllers/armas.controller.php";
require_once "../models/armas.modelo.php";

Class ajaxarmas {

	public $id_armas;
	public $nombreArmas;
	public $apellidoArmas;
	public $rutArmas;
	public $nacArmas;
	public $fonoArmas;
	public $armaFuncionario;
	public $cascoFuncionario;
	public $escudoFuncionario;
	public $imagen_armas;
	public function crearArmas(){
		$datos = array(
		"nombreArmas"=>$this->nombreArmas,
		"apellidoArmas"=>$this->apellidoArmas,
		"rutArmas"=>$this->rutArmas,
		"nacArmas"=>$this->nacArmas,
		"fonoArmas"=>$this->fonoArmas,
		"armaFuncionario"=>$this->armaFuncionario,
		"cascoFuncionario"=>$this->cascoFuncionario,
		"escudoFuncionario"=>$this->escudoFuncionario,
		"imagen"=> $this ->imagen_armas);
		$respuesta = ControllerArmas::ctrCrearArmas($datos);
		echo $respuesta;
	}
	public function editarArmas(){
		$id_armas = $this->id_armas;

		$respuesta = ControllerArmas::ctrEditarArmas($id_armas);

		$datos = array("id_armas"=>$id_armas,
			"nombreArmas"=>$this->nombreArmas,
			"apellidoArmas"=>$this->apellidoArmas,
			"rutArmas"=>$this->rutArmas,
			"nacArmas"=>$this->nacArmas,
			"fonoArmas"=>$this->fonoArmas,
			"armaFuncionario"=>$this->armaFuncionario,
			"cascoFuncionario"=>$this->cascoFuncionario,
			"escudoFuncionario"=>$this->escudoFuncionario,
			"imagen"=> $this ->imagen_armas);
		echo $datos;
	}
	public function actualizarArmas(){
		$datos = array( "id_armas"=>$this->id_armas,
						"titulo"=>$this->titulo_armas,
						"descripcion"=>$this->descripcion_armas,
						"vinculo"=>$this->vinculo_armas,
						"imagen"=>$this->imagen_armas,
						"rutaActual"=>$this->rutaActual
						);

		$respuesta = ControllerArmas::ctrActualizarArmas($datos);

		echo $respuesta;
	}
	public function eliminarArmas(){
		$id_armas = $this->id_armas;
		$ruta = $this->imagen_armas;

		$respuesta = ControllerArmas::ctrEliminarArmas($id_armas, $ruta);

		echo $respuesta;

	}

}

$tipoOperacion = $_POST["tipoOperacion"];

if($tipoOperacion == "insertarArmas") {
    $crearNuevoArmas = new ajaxArmas();
	$crearNuevoArmas -> nombreArmas = $_POST["nombreArmas"];
	$crearNuevoArmas -> apellidoArmas =  $_POST["apellidoArmas"];
	$crearNuevoArmas -> rutArmas =  $_POST["rutArmas"];
	$crearNuevoArmas -> nacArmas = $_POST["nacArmas"];
	$crearNuevoArmas -> fonoArmas =  $_POST["fonoArmas"];
	$crearNuevoArmas -> armaFuncionario =  $_POST["armaFuncionario"];
	$crearNuevoArmas -> cascoFuncionario = $_POST["cascoFuncionario"];
	$crearNuevoArmas -> escudoFuncionario = $_POST["escudoFuncionario"];
	$crearNuevoArmas -> imagen_armas = $_FILES["imagenArmas"];
	$crearNuevoArmas ->crearArmas();
}

if ($tipoOperacion == "editarArmas") {
	$editarArmas = new ajaxArmas();
	$editarArmas -> id_armas = $_POST["id_armas"];
	$editarArmas -> editarArmas();
}
if ($tipoOperacion == "actualizarArmas") {
	$actualizarArmas = new ajaxArmas();
	$actualizarArmas -> nombreArmas = $_POST["nombreArmas"];
	$actualizarArmas -> apellidoArmas =  $_POST["apellidoArmas"];
	$actualizarArmas -> rutArmas =  $_POST["rutArmas"];
	$actualizarArmas -> nacArmas = $_POST["nacArmas"];
	$actualizarArmas -> fonoArmas =  $_POST["fonoArmas"];
	$actualizarArmas -> armaFuncionario =  $_POST["armaFuncionario"];
	$actualizarArmas -> cascoFuncionario = $_POST["cascoFuncionario"];
	$actualizarArmas -> escudoFuncionario = $_POST["escudoFuncionario"];
	$actualizarArmas -> imagen_armas = $_FILES["imagenArmas"];
	$actualizarArmas -> actualizarArmas();
}
if ($tipoOperacion == "eliminarArmas") {
	$eliminarArmas = new ajaxArmas();
	$eliminarArmas -> id_armas = $_POST["id_armas"];
	$eliminarArmas -> eliminarArmas();
}

?>