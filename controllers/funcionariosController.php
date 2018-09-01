<?php 

Class ControllerFuncionarios {
	
	public function listarFuncionariosCtr() {
		$tabla = "funcionarios";
		$respuesta = ModeloFuncionarios::listarFuncionariosMdl($tabla);
		return $respuesta;
	}

	static public function ctrCrearFuncionarios($datos) {
		$tabla = "funcionarios";
		list($ancho, $alto) = getimagesize($datos["imagen"]["tmp_name"]);	
		$nuevoAncho = 1024;
		$nuevoAlto = 768;
		$directorio = "../views/dist/img/funcionarios";
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


		$respuesta = ModeloFuncionarios::mdlCrearFuncionarios($tabla, $datos, $rutaImagen);

		return $respuesta;

	}

	static public function ctrEliminarFuncionarios($id_funcionarios, $ruta) {

		$tabla = "funcionarios";

		if ( unlink(substr($ruta, 3)) ) {
		
			$respuesta = ModeloFuncionarios::mdlEliminarFuncionarios($tabla, $id_funcionarios);	
		
		}
		
		return $respuesta;

	}

	static public function ctrEditarFuncionarios($id_funcionarios) {

		$tabla = "funcionarios";
		$respuesta = ModeloFuncionarios::mdlEditarFuncionarios($tabla, $id_funcionarios);


		return $respuesta;
	}

	static public function ctrActualizarFuncionarios($datos) {
		//Validamos si no viene imagen para actualizar solo la tabla
		$tabla = "funcionarios";

		if ($datos["imagen"]["error"] == 4) {
			$rutaImagen = null;

		} 
		// LA ACTUALIZACIÓN VIENE CON IMAGEN
		else {

			unlink(".".$datos["rutaActual"]);
			
			list($ancho, $alto) = getimagesize($datos["imagen"]["tmp_name"]);	

			$nuevoAncho = 1024;
			$nuevoAlto = 768;

			$directorio = "../views/dist/img/funcionarios";

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

		$respuesta = ModeloFuncionarios::mdlActualizarFuncionarios($tabla, $datos, $rutaImagen);

		return $respuesta;

	}
}

?>