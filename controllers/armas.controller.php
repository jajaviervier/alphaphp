<?php 

Class ControllerArmas {
	
	public function listarArmasCtr() {
		$tabla = "armas";
		$respuesta = ModeloArmas::listarArmasMdl($tabla);

		return $respuesta;
	}

	static public function ctrCrearArmas($datos) {
		$tabla = "armas";
		list($ancho, $alto) = getimagesize($datos["imagen"]["tmp_name"]);	
		$nuevoAncho = 1024;
		$nuevoAlto = 768;
		$directorio = "../views/dist/img/armas";
		if($datos["imagen"]["type"] == "image/jpeg"){
			$rutaImagen = $directorio."/".md5($datos["imagen"]["tmp_name"]).".jpeg";
			$origen = imagecreatefromjpeg($datos["imagen"]["tmp_name"]);						
			$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
			imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
			imagejpeg($destino, $rutaImagen);

		}

		if($datos["imagen"]["type"] == "image/png"){

			$rutaImagen = $directorio."/".md5($datos["imagen"]["name"]).".png";

			$origen = imagecreatefrompng($datos["imagen"]["tmp_name"]);						

			$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

			imagealphablending($destino, FALSE);
	
			imagesavealpha($destino, TRUE);

			imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

			imagepng($destino, $rutaImagen);

		}


		$respuesta = ModeloArmas::mdlCrearArmas($tabla, $datos, $rutaImagen);

		return $respuesta;

	}

	static public function ctrEliminarArmas($id_armas, $ruta) {

		$tabla = "armas";

		if ( unlink($ruta) ) {
		
			$respuesta = ModeloArmas::mdlEliminarArmas($tabla, $id_armas);	
		
		}
		
		return $respuesta;

	}

	static public function ctrEditarArmas($id_armas) {

		$tabla = "armas";
		$respuesta = ModeloArmas::mdlEditarArmas($tabla, $id_armas);


		return $respuesta;
	}

	static public function ctrActualizarArmas($datos) {
		//Validamos si no viene imagen para actualizar solo la tabla
		$tabla = "armas";

		if ($datos["imagen"]["error"] == 4) {
			$rutaImagen = null;

		} 
		// LA ACTUALIZACIÓN VIENE CON IMAGEN
		else {

			unlink(".".$datos["rutaActual"]);
			
			list($ancho, $alto) = getimagesize($datos["imagen"]["tmp_name"]);	

			$nuevoAncho = 1024;
			$nuevoAlto = 768;

			$directorio = "../views/dist/img/armas";

			if($datos["imagen"]["type"] == "image/jpeg"){

				$rutaImagen = $directorio."/".md5($datos["imagen"]["tmp_name"]).".jpeg";

				$origen = imagecreatefromjpeg($datos["imagen"]["tmp_name"]);						
				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

				imagejpeg($destino, $rutaImagen);

			}

			if($datos["imagen"]["type"] == "image/png"){

				$rutaImagen = $directorio."/".md5($datos["imagen"]["name"]).".png";

				$origen = imagecreatefrompng($datos["imagen"]["tmp_name"]);						

				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

				imagealphablending($destino, FALSE);
		
				imagesavealpha($destino, TRUE);

				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

				imagepng($destino, $rutaImagen);

			}


			
			
		}

		$respuesta = ModeloArmas::mdlActualizarArmas($tabla, $datos, $rutaImagen);

		return $respuesta;

	}
}

?>