<?php 

require_once "../controllers/escudos.controller.php";
require_once "../models/escudos.modelo.php";

Class ajaxescudos {

	public $id_escudos;
	public $nombreEscudos;
	public $apellidoEscudos;
	public $rutEscudos;
	public $nacEscudos;
	public $fonoEscudos;
	public $armaFuncionario;
	public $cascoFuncionario;
	public $escudoFuncionario;
	public $imagen_escudos;
	public function crearEscudos(){
		$datos = array(
		"nombreEscudos"=>$this->nombreEscudos,
		"apellidoEscudos"=>$this->apellidoEscudos,
		"rutEscudos"=>$this->rutEscudos,
		"nacEscudos"=>$this->nacEscudos,
		"fonoEscudos"=>$this->fonoEscudos,
		"armaFuncionario"=>$this->armaFuncionario,
		"cascoFuncionario"=>$this->cascoFuncionario,
		"escudoFuncionario"=>$this->escudoFuncionario,
		"imagen"=> $this ->imagen_escudos);
		$respuesta = ControllerEscudos::ctrCrearEscudos($datos);
		echo $respuesta;
	}
	public function editarEscudos(){
		$id_escudos = $this->id_escudos;

		$respuesta = ControllerEscudos::ctrEditarEscudos($id_escudos);

		$datos = array("id_escudos"=>$id_escudos,
			"nombreEscudos"=>$this->nombreEscudos,
			"apellidoEscudos"=>$this->apellidoEscudos,
			"rutEscudos"=>$this->rutEscudos,
			"nacEscudos"=>$this->nacEscudos,
			"fonoEscudos"=>$this->fonoEscudos,
			"armaFuncionario"=>$this->armaFuncionario,
			"cascoFuncionario"=>$this->cascoFuncionario,
			"escudoFuncionario"=>$this->escudoFuncionario,
			"imagen"=> $this ->imagen_escudos);
		echo $datos;
	}
	public function actualizarEscudos(){
		$datos = array( "id_escudos"=>$this->id_escudos,
						"titulo"=>$this->titulo_escudos,
						"descripcion"=>$this->descripcion_escudos,
						"vinculo"=>$this->vinculo_escudos,
						"imagen"=>$this->imagen_escudos,
						"rutaActual"=>$this->rutaActual
						);

		$respuesta = ControllerEscudos::ctrActualizarEscudos($datos);

		echo $respuesta;
	}
	public function eliminarEscudos(){
		$id_escudos = $this->id_escudos;
		$ruta = $this->imagen_escudos;

		$respuesta = ControllerEscudos::ctrEliminarEscudos($id_escudos, $ruta);

		echo $respuesta;

	}

}

$tipoOperacion = $_POST["tipoOperacion"];

if($tipoOperacion == "insertarEscudos") {
    $crearNuevoEscudos = new ajaxEscudos();
	$crearNuevoEscudos -> nombreEscudos = $_POST["nombreEscudos"];
	$crearNuevoEscudos -> apellidoEscudos =  $_POST["apellidoEscudos"];
	$crearNuevoEscudos -> rutEscudos =  $_POST["rutEscudos"];
	$crearNuevoEscudos -> nacEscudos = $_POST["nacEscudos"];
	$crearNuevoEscudos -> fonoEscudos =  $_POST["fonoEscudos"];
	$crearNuevoEscudos -> armaFuncionario =  $_POST["armaFuncionario"];
	$crearNuevoEscudos -> cascoFuncionario = $_POST["cascoFuncionario"];
	$crearNuevoEscudos -> escudoFuncionario = $_POST["escudoFuncionario"];
	$crearNuevoEscudos -> imagen_escudos = $_FILES["imagenEscudos"];
	$crearNuevoEscudos ->crearEscudos();
}

if ($tipoOperacion == "editarEscudos") {
	$editarEscudos = new ajaxEscudos();
	$editarEscudos -> id_escudos = $_POST["id_escudos"];
	$editarEscudos -> editarEscudos();
}
if ($tipoOperacion == "actualizarEscudos") {
	$actualizarEscudos = new ajaxEscudos();
	$actualizarEscudos -> nombreEscudos = $_POST["nombreEscudos"];
	$actualizarEscudos -> apellidoEscudos =  $_POST["apellidoEscudos"];
	$actualizarEscudos -> rutEscudos =  $_POST["rutEscudos"];
	$actualizarEscudos -> nacEscudos = $_POST["nacEscudos"];
	$actualizarEscudos -> fonoEscudos =  $_POST["fonoEscudos"];
	$actualizarEscudos -> armaFuncionario =  $_POST["armaFuncionario"];
	$actualizarEscudos -> cascoFuncionario = $_POST["cascoFuncionario"];
	$actualizarEscudos -> escudoFuncionario = $_POST["escudoFuncionario"];
	$actualizarEscudos -> imagen_escudos = $_FILES["imagenEscudos"];
	$actualizarEscudos -> actualizarEscudos();
}
if ($tipoOperacion == "eliminarEscudos") {
	$eliminarEscudos = new ajaxEscudos();
	$eliminarEscudos -> id_escudos = $_POST["id_escudos"];
	$eliminarEscudos -> eliminarEscudos();
}

?>