<?php 

require_once "conexion.php";

Class ModeloCascos {

	static public function listarCascosMdl($tabla) {

		$sql = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$sql -> execute();
		return $sql -> fetchAll();

	}

	static public function mdlCrearCascos($tabla, $datos,$rutaImagen) {
		//validacion registro existente
		$row_cnt=1;
		$sql = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE rutCascos = :rut");
		$sql->bindParam(":rut", $datos["rutCascos"], PDO::PARAM_STR);
		$sql -> execute();		
				
//cuenta la cantidad de registros encotrados con el mismo nombre
		if(count($sql -> fetchAll())>0){
			return "2";
		}else{
			$sql = Conexion::conectar()->prepare("INSERT INTO $tabla() VALUES (NULL, 'libre', :rut, :nombre, :apellido, 'Cargo uno',  :fecha, :imagen)");
		$sql->bindParam(":nombre", $datos["nombreCascos"], PDO::PARAM_STR);
		$sql->bindParam(":apellido", $datos["apellidoCascos"], PDO::PARAM_STR);
		$sql->bindParam(":rut", $datos["rutCascos"], PDO::PARAM_STR);
		$sql->bindParam(":fecha", $datos["nacCascos"], PDO::PARAM_STR);
		$sql->bindParam(":imagen", $rutaImagen, PDO::PARAM_STR);

		if( $sql -> execute() ) {
			return "1";
		} else {
			return "error";
		}
		}
	}



	static public function mdlEliminarCascos($tabla, $id_cascos) {

		$sql = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idcascos = :id");

		$sql->bindParam(":id", $id_cascos, PDO::PARAM_INT);

		if( $sql->execute()) {
			return "ok";
		} else {
			return "error";
		}

	}

	static public function mdlEditarCascos($tabla, $id_cascos) {

		$sql = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE idcascos = :id");
		$sql->bindParam(":id", $id_cascos, PDO::PARAM_INT);

		$sql -> execute();
		return json_encode($sql -> fetch());

	}

	static public function mdlActualizarCascos($tabla, $datos, $rutaImagen) {

		if( is_null($rutaImagen)) {
			$sql = Conexion::conectar()->prepare("UPDATE $tabla SET titulo = :titulo, descripcion = :descripcion, url = :vinculo, fecha = NOW() WHERE id = :id");

			$sql->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
			$sql->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
			$sql->bindParam(":vinculo", $datos["vinculo"], PDO::PARAM_STR);
			$sql->bindParam(":id", $datos["id_cascos"], PDO::PARAM_INT);

		} else {
			$sql = Conexion::conectar()->prepare("UPDATE $tabla SET titulo = :titulo, descripcion = :descripcion, rutaImg = :rutaNueva, url = :vinculo, fecha = NOW() WHERE id = :id");

			$sql->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
			$sql->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
			$sql->bindParam(":rutaNueva", $rutaImagen, PDO::PARAM_STR);
			$sql->bindParam(":vinculo", $datos["vinculo"], PDO::PARAM_STR);
			$sql->bindParam(":id", $datos["id_cascos"], PDO::PARAM_INT);



		} 

		if($sql->execute()) {
			return "ok";
		} else {
			return "error";
		}

	}

}


?>