<?php 

Class ControllerCascos {
	
	public function listarCascosCtr() {
		$tabla = "cascos";
		$respuesta = ModeloCascos::listarCascosMdl($tabla);

		return $respuesta;
	}

	static public function ctrCrearCascos($datos) {
		$tabla = "cascos";
		list($ancho, $alto) = getimagesize($datos["imagen"]["tmp_name"]);	
		$nuevoAncho = 1024;
		$nuevoAlto = 768;
		$directorio = "../views/dist/img/cascos";
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


		$respuesta = ModeloCascos::mdlCrearCascos($tabla, $datos, $rutaImagen);

		return $respuesta;

	}

	static public function ctrEliminarCascos($id_cascos) {

		$tabla = "cascos";


		
			$respuesta = ModeloCascos::mdlEliminarCascos($tabla, $id_cascos);	
		
		
		
		return $respuesta;

	}

	static public function ctrEditarCascos($id_cascos) {

		$tabla = "cascos";
		$respuesta = ModeloCascos::mdlEditarCascos($tabla, $id_cascos);


		return $respuesta;
	}

	static public function ctrActualizarCascos($datos) {
		//Validamos si no viene imagen para actualizar solo la tabla
		$tabla = "cascos";

		if ($datos["imagen"]["error"] == 4) {
			$rutaImagen = null;

		} 
		// LA ACTUALIZACIÓN VIENE CON IMAGEN
		else {

			unlink(".".$datos["rutaActual"]);
			
			list($ancho, $alto) = getimagesize($datos["imagen"]["tmp_name"]);	

			$nuevoAncho = 1024;
			$nuevoAlto = 768;

			$directorio = "../views/dist/img/cascos";

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

		$respuesta = ModeloCascos::mdlActualizarCascos($tabla, $datos, $rutaImagen);

		return $respuesta;

	}
}

?>