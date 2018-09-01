<?php 

require_once "conexion.php";

Class ModeloArmas {

	static public function listarArmasMdl($tabla) {

		$sql = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$sql -> execute();
		return $sql -> fetchAll();

	}

	static public function mdlCrearArmas($tabla, $datos,$rutaImagen) {
		//validacion registro existente
		$row_cnt=1;
		$sql = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE rutArmas = :rut");
		$sql->bindParam(":rut", $datos["rutArmas"], PDO::PARAM_STR);
		$sql -> execute();		
				
//cuenta la cantidad de registros encotrados con el mismo nombre
		if(count($sql -> fetchAll())>0){
			return "2";
		}else{
			$sql = Conexion::conectar()->prepare("INSERT INTO $tabla() VALUES (NULL, 'libre', :rut, :nombre, :apellido, 'Cargo uno',  :fecha, :imagen)");
		$sql->bindParam(":nombre", $datos["nombreArmas"], PDO::PARAM_STR);
		$sql->bindParam(":apellido", $datos["apellidoArmas"], PDO::PARAM_STR);
		$sql->bindParam(":rut", $datos["rutArmas"], PDO::PARAM_STR);
		$sql->bindParam(":fecha", $datos["nacArmas"], PDO::PARAM_STR);
		$sql->bindParam(":imagen", $rutaImagen, PDO::PARAM_STR);

		if( $sql -> execute() ) {
			return "1";
		} else {
			return "error";
		}
		}
	}



	static public function mdlEliminarArmas($tabla, $id_armas) {

		$sql = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idarmas = :id");

		$sql->bindParam(":id", $id_armas, PDO::PARAM_INT);

		if( $sql->execute()) {
			return "ok";
		} else {
			return "error";
		}

	}

	static public function mdlEditarArmas($tabla, $id_armas) {

		$sql = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE idarmas = :id");
		$sql->bindParam(":id", $id_armas, PDO::PARAM_INT);

		$sql -> execute();
		return json_encode($sql -> fetch());

	}

	static public function mdlActualizarArmas($tabla, $datos, $rutaImagen) {

		if( is_null($rutaImagen)) {
			$sql = Conexion::conectar()->prepare("UPDATE $tabla SET titulo = :titulo, descripcion = :descripcion, url = :vinculo, fecha = NOW() WHERE id = :id");

			$sql->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
			$sql->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
			$sql->bindParam(":vinculo", $datos["vinculo"], PDO::PARAM_STR);
			$sql->bindParam(":id", $datos["id_armas"], PDO::PARAM_INT);

		} else {
			$sql = Conexion::conectar()->prepare("UPDATE $tabla SET titulo = :titulo, descripcion = :descripcion, rutaImg = :rutaNueva, url = :vinculo, fecha = NOW() WHERE id = :id");

			$sql->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
			$sql->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
			$sql->bindParam(":rutaNueva", $rutaImagen, PDO::PARAM_STR);
			$sql->bindParam(":vinculo", $datos["vinculo"], PDO::PARAM_STR);
			$sql->bindParam(":id", $datos["id_armas"], PDO::PARAM_INT);



		} 

		if($sql->execute()) {
			return "ok";
		} else {
			return "error";
		}

	}

}


?>