<?php 

require_once "../controllers/cascos.controller.php";
require_once "../models/cascos.modelo.php";

Class ajaxcascos {

	public $id_cascos;
	public $nombreCascos;
	public $apellidoCascos;
	public $rutCascos;
	public $nacCascos;
	public $fonoCascos;
	public $armaFuncionario;
	public $cascoFuncionario;
	public $escudoFuncionario;
	public $imagen_cascos;
	public function crearCascos(){
		$datos = array(
		"nombreCascos"=>$this->nombreCascos,
		"apellidoCascos"=>$this->apellidoCascos,
		"rutCascos"=>$this->rutCascos,
		"nacCascos"=>$this->nacCascos,
		"fonoCascos"=>$this->fonoCascos,
		"armaFuncionario"=>$this->armaFuncionario,
		"cascoFuncionario"=>$this->cascoFuncionario,
		"escudoFuncionario"=>$this->escudoFuncionario,
		"imagen"=> $this ->imagen_cascos);
		$respuesta = ControllerCascos::ctrCrearCascos($datos);
		echo $respuesta;
	}
	public function editarCascos(){
		$id_cascos = $this->id_cascos;

		$respuesta = ControllerCascos::ctrEditarCascos($id_cascos);

		$datos = array("id_cascos"=>$id_cascos,
			"nombreCascos"=>$this->nombreCascos,
			"apellidoCascos"=>$this->apellidoCascos,
			"rutCascos"=>$this->rutCascos,
			"nacCascos"=>$this->nacCascos,
			"fonoCascos"=>$this->fonoCascos,
			"armaFuncionario"=>$this->armaFuncionario,
			"cascoFuncionario"=>$this->cascoFuncionario,
			"escudoFuncionario"=>$this->escudoFuncionario,
			"imagen"=> $this ->imagen_cascos);
		echo $datos;
	}
	public function actualizarCascos(){
		$datos = array( "id_cascos"=>$this->id_cascos,
						"titulo"=>$this->titulo_cascos,
						"descripcion"=>$this->descripcion_cascos,
						"vinculo"=>$this->vinculo_cascos,
						"imagen"=>$this->imagen_cascos,
						"rutaActual"=>$this->rutaActual
						);

		$respuesta = ControllerCascos::ctrActualizarCascos($datos);

		echo $respuesta;
	}
	public function eliminarCascos(){
		$id_cascos = $this->id_cascos;
		$respuesta = ControllerCascos::ctrEliminarCascos($id_cascos);
		echo $respuesta;

	}

}

$tipoOperacion = $_POST["tipoOperacion"];

if($tipoOperacion == "insertarCascos") {
    $crearNuevoCascos = new ajaxCascos();
	$crearNuevoCascos -> nombreCascos = $_POST["nombreCascos"];
	$crearNuevoCascos -> apellidoCascos =  $_POST["apellidoCascos"];
	$crearNuevoCascos -> rutCascos =  $_POST["rutCascos"];
	$crearNuevoCascos -> nacCascos = $_POST["nacCascos"];
	$crearNuevoCascos -> fonoCascos =  $_POST["fonoCascos"];
	$crearNuevoCascos -> armaFuncionario =  $_POST["armaFuncionario"];
	$crearNuevoCascos -> cascoFuncionario = $_POST["cascoFuncionario"];
	$crearNuevoCascos -> escudoFuncionario = $_POST["escudoFuncionario"];
	$crearNuevoCascos -> imagen_cascos = $_FILES["imagenCascos"];
	$crearNuevoCascos ->crearCascos();
}

if ($tipoOperacion == "editarCascos") {
	$editarCascos = new ajaxCascos();
	$editarCascos -> id_cascos = $_POST["id_cascos"];
	$editarCascos -> editarCascos();
}
if ($tipoOperacion == "actualizarCascos") {
	$actualizarCascos = new ajaxCascos();
	$actualizarCascos -> nombreCascos = $_POST["nombreCascos"];
	$actualizarCascos -> apellidoCascos =  $_POST["apellidoCascos"];
	$actualizarCascos -> rutCascos =  $_POST["rutCascos"];
	$actualizarCascos -> nacCascos = $_POST["nacCascos"];
	$actualizarCascos -> fonoCascos =  $_POST["fonoCascos"];
	$actualizarCascos -> armaFuncionario =  $_POST["armaFuncionario"];
	$actualizarCascos -> cascoFuncionario = $_POST["cascoFuncionario"];
	$actualizarCascos -> escudoFuncionario = $_POST["escudoFuncionario"];
	$actualizarCascos -> imagen_cascos = $_FILES["imagenCascos"];
	$actualizarCascos -> actualizarCascos();
}
if ($tipoOperacion == "eliminarCascos") {
	$eliminarCascos = new ajaxCascos();
	$eliminarCascos -> id_cascos = $_POST["id_cascos"];
	$eliminarCascos -> eliminarCascos();
}

?>