<?php 

Class ControllerEscudos {
	
	public function listarEscudosCtr() {
		$tabla = "escudos";
		$respuesta = ModeloEscudos::listarEscudosMdl($tabla);

		return $respuesta;
	}

	static public function ctrCrearEscudos($datos) {
		$tabla = "escudos";
		list($ancho, $alto) = getimagesize($datos["imagen"]["tmp_name"]);	
		$nuevoAncho = 1024;
		$nuevoAlto = 768;
		$directorio = "../views/dist/img/escudos";
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


		$respuesta = ModeloEscudos::mdlCrearEscudos($tabla, $datos, $rutaImagen);

		return $respuesta;

	}

	static public function ctrEliminarEscudos($id_escudos) {

		$tabla = "escudos";
		$respuesta = ModeloEscudos::mdlEliminarEscudos($tabla, $id_escudos);			
		return $respuesta;

	}

	static public function ctrEditarEscudos($id_escudos) {

		$tabla = "escudos";
		$respuesta = ModeloEscudos::mdlEditarEscudos($tabla, $id_escudos);


		return $respuesta;
	}

	static public function ctrActualizarEscudos($datos) {
		//Validamos si no viene imagen para actualizar solo la tabla
		$tabla = "escudos";

		if ($datos["imagen"]["error"] == 4) {
			$rutaImagen = null;

		} 
		// LA ACTUALIZACIÓN VIENE CON IMAGEN
		else {

			unlink(".".$datos["rutaActual"]);
			
			list($ancho, $alto) = getimagesize($datos["imagen"]["tmp_name"]);	

			$nuevoAncho = 1024;
			$nuevoAlto = 768;

			$directorio = "../views/dist/img/escudos";

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

		$respuesta = ModeloEscudos::mdlActualizarEscudos($tabla, $datos, $rutaImagen);

		return $respuesta;

	}
}

?>