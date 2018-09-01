<?php 

require_once "conexion.php";

Class ModeloComunicacion {

	static public function listarComunicacionMdl($tabla) {

		$sql = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$sql -> execute();
		return $sql -> fetchAll();

	}

	static public function mdlCrearComunicacion($tabla, $datos,$rutaImagen) {
		//validacion registro existente
		$row_cnt=1;
		$sql = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE rutComunicacion = :rut");
		$sql->bindParam(":rut", $datos["rutComunicacion"], PDO::PARAM_STR);
		$sql -> execute();		
				
//cuenta la cantidad de registros encotrados con el mismo nombre
		if(count($sql -> fetchAll())>0){
			return "2";
		}else{
			$sql = Conexion::conectar()->prepare("INSERT INTO $tabla() VALUES (NULL, 'libre', :rut, :nombre, :apellido, 'Cargo uno',  :fecha, :imagen)");
		$sql->bindParam(":nombre", $datos["nombreComunicacion"], PDO::PARAM_STR);
		$sql->bindParam(":apellido", $datos["apellidoComunicacion"], PDO::PARAM_STR);
		$sql->bindParam(":rut", $datos["rutComunicacion"], PDO::PARAM_STR);
		$sql->bindParam(":fecha", $datos["nacComunicacion"], PDO::PARAM_STR);
		$sql->bindParam(":imagen", $rutaImagen, PDO::PARAM_STR);

		if( $sql -> execute() ) {
			return "1";
		} else {
			return "error";
		}
		}
	}



	static public function mdlEliminarComunicacion($tabla, $id_comunicacion) {

		$sql = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idcomunicacion = :id");

		$sql->bindParam(":id", $id_comunicacion, PDO::PARAM_INT);

		if( $sql->execute()) {
			return "ok";
		} else {
			return "error";
		}

	}

	static public function mdlEditarComunicacion($tabla, $id_comunicacion) {

		$sql = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE idcomunicacion = :id");
		$sql->bindParam(":id", $id_comunicacion, PDO::PARAM_INT);

		$sql -> execute();
		return json_encode($sql -> fetch());

	}

	static public function mdlActualizarComunicacion($tabla, $datos, $rutaImagen) {

		if( is_null($rutaImagen)) {
			$sql = Conexion::conectar()->prepare("UPDATE $tabla SET titulo = :titulo, descripcion = :descripcion, url = :vinculo, fecha = NOW() WHERE id = :id");

			$sql->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
			$sql->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
			$sql->bindParam(":vinculo", $datos["vinculo"], PDO::PARAM_STR);
			$sql->bindParam(":id", $datos["id_comunicacion"], PDO::PARAM_INT);

		} else {
			$sql = Conexion::conectar()->prepare("UPDATE $tabla SET titulo = :titulo, descripcion = :descripcion, rutaImg = :rutaNueva, url = :vinculo, fecha = NOW() WHERE id = :id");

			$sql->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
			$sql->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
			$sql->bindParam(":rutaNueva", $rutaImagen, PDO::PARAM_STR);
			$sql->bindParam(":vinculo", $datos["vinculo"], PDO::PARAM_STR);
			$sql->bindParam(":id", $datos["id_comunicacion"], PDO::PARAM_INT);



		} 

		if($sql->execute()) {
			return "ok";
		} else {
			return "error";
		}

	}

}


?>