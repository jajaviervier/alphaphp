<?php 

require_once "../controllers/slider.controller.php";
require_once "../models/slider.modelo.php";

Class ajaxSlider {

	public $id_slider;
	public $titulo_slider;
	public $descripcion_slider;
	public $vinculo_slider;
	public $imagen_slider;
	public $rutaActual;

	public function crearSlider(){
		$datos = array("titulo"=>$this->titulo_slider,
						"descripcion"=>$this->descripcion_slider,
						"vinculo"=>$this->vinculo_slider,
						"imagen"=>$this->imagen_slider);

		$respuesta = ControllerSlider::ctrCrearSlider($datos);

		echo $respuesta;
	}
	public function editarSlider(){
		$id_slider = $this->id_slider;

		$respuesta = ControllerSlider::ctrEditarSlider($id_slider);

		$datos = array("id_slider"=>$respuesta["id"],
						"titulo_slider"=>$respuesta["titulo"],
						"descripcion"=>$respuesta["descripcion"],
						"vinculo"=>$respuesta["url"],
						"imagen"=>substr($respuesta["rutaImg"], 3)
						);

		echo json_encode($datos);

	}
	public function actualizarSlider(){
		$datos = array( "id_slider"=>$this->id_slider,
						"titulo"=>$this->titulo_slider,
						"descripcion"=>$this->descripcion_slider,
						"vinculo"=>$this->vinculo_slider,
						"imagen"=>$this->imagen_slider,
						"rutaActual"=>$this->rutaActual
						);

		$respuesta = ControllerSlider::ctrActualizarSlider($datos);

		echo $respuesta;
	}
	public function eliminarSlider(){
		$id_slider = $this->id_slider;
		$ruta = $this->imagen_slider;

		$respuesta = ControllerSlider::ctrEliminarSlider($id_slider, $ruta);

		echo $respuesta;

	}

}

$tipoOperacion = $_POST["tipoOperacion"];

if($tipoOperacion == "insertarSlider") {
	$crearNuevoSlider = new ajaxSlider();
	$crearNuevoSlider -> titulo_slider = $_POST["tituloSlider"];
	$crearNuevoSlider -> descripcion_slider = $_POST["descripcionSlider"];
	$crearNuevoSlider -> vinculo_slider = $_POST["urlSlider"];
	$crearNuevoSlider -> imagen_slider = $_FILES["imagenSlider"];
	$crearNuevoSlider ->crearSlider();
}

if ($tipoOperacion == "editarSlider") {
	$editarSlider = new ajaxSlider();
	$editarSlider -> id_slider = $_POST["id_slider"];
	$editarSlider -> editarSlider();
}
if ($tipoOperacion == "actualizarSlider") {
	$actualizarSlider = new ajaxSlider();
	$actualizarSlider -> id_slider = $_POST["id_slider"];
	$actualizarSlider -> titulo_slider = $_POST["tituloSlider"];
	$actualizarSlider -> descripcion_slider = $_POST["descripcionSlider"];
	$actualizarSlider -> vinculo_slider = $_POST["urlSlider"];
	$actualizarSlider -> imagen_slider = $_FILES["imagenSlider"];
	$actualizarSlider -> rutaActual = $_POST["rutaActual"];
	$actualizarSlider -> actualizarSlider();
}
if ($tipoOperacion == "eliminarSlider") {
	$eliminarSlider = new ajaxSlider();
	$eliminarSlider -> id_slider = $_POST["id_slider"];
	$eliminarSlider -> imagen_slider = $_POST["rutaImagen"];
	$eliminarSlider -> eliminarSlider();
}

?>