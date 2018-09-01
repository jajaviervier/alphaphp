<?php 

require_once "conexion.php";

Class ModeloEscudos {

	static public function listarEscudosMdl($tabla) {

		$sql = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$sql -> execute();
		return $sql -> fetchAll();

	}

	static public function mdlCrearEscudos($tabla, $datos,$rutaImagen) {
		//validacion registro existente
		$row_cnt=1;
		$sql = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE rutEscudos = :rut");
		$sql->bindParam(":rut", $datos["rutEscudos"], PDO::PARAM_STR);
		$sql -> execute();		
				
//cuenta la cantidad de registros encotrados con el mismo nombre
		if(count($sql -> fetchAll())>0){
			return "2";
		}else{
			$sql = Conexion::conectar()->prepare("INSERT INTO $tabla() VALUES (NULL, 'libre', :rut, :nombre, :apellido, 'Cargo uno',  :fecha, :imagen)");
		$sql->bindParam(":nombre", $datos["nombreEscudos"], PDO::PARAM_STR);
		$sql->bindParam(":apellido", $datos["apellidoEscudos"], PDO::PARAM_STR);
		$sql->bindParam(":rut", $datos["rutEscudos"], PDO::PARAM_STR);
		$sql->bindParam(":fecha", $datos["nacEscudos"], PDO::PARAM_STR);
		$sql->bindParam(":imagen", $rutaImagen, PDO::PARAM_STR);

		if( $sql -> execute() ) {
			return "1";
		} else {
			return "error";
		}
		}
	}



	static public function mdlEliminarEscudos($tabla, $id_escudos) {

		$sql = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idescudos = :id");

		$sql->bindParam(":id", $id_escudos, PDO::PARAM_INT);

		if( $sql->execute()) {
			return "ok";
		} else {
			return "error";
		}

	}

	static public function mdlEditarEscudos($tabla, $id_escudos) {

		$sql = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE idescudos = :id");
		$sql->bindParam(":id", $id_escudos, PDO::PARAM_INT);

		$sql -> execute();
		return json_encode($sql -> fetch());

	}

	static public function mdlActualizarEscudos($tabla, $datos, $rutaImagen) {

		if( is_null($rutaImagen)) {
			$sql = Conexion::conectar()->prepare("UPDATE $tabla SET titulo = :titulo, descripcion = :descripcion, url = :vinculo, fecha = NOW() WHERE id = :id");

			$sql->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
			$sql->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
			$sql->bindParam(":vinculo", $datos["vinculo"], PDO::PARAM_STR);
			$sql->bindParam(":id", $datos["id_escudos"], PDO::PARAM_INT);

		} else {
			$sql = Conexion::conectar()->prepare("UPDATE $tabla SET titulo = :titulo, descripcion = :descripcion, rutaImg = :rutaNueva, url = :vinculo, fecha = NOW() WHERE id = :id");

			$sql->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
			$sql->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
			$sql->bindParam(":rutaNueva", $rutaImagen, PDO::PARAM_STR);
			$sql->bindParam(":vinculo", $datos["vinculo"], PDO::PARAM_STR);
			$sql->bindParam(":id", $datos["id_escudos"], PDO::PARAM_INT);



		} 

		if($sql->execute()) {
			return "ok";
		} else {
			return "error";
		}

	}

}


?>