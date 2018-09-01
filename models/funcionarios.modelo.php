<?php 

require_once "conexion.php";

Class ModeloFuncionarios {

	static public function listarFuncionariosMdl($tabla) {

		$sql = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$sql -> execute();
		return $sql -> fetchAll();

	}

	static public function mdlCrearFuncionarios($tabla, $datos,$rutaImagen) {
		//validacion registro existente
		$row_cnt=1;
		$sql = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE rutFuncionarios = :rut");
		$sql->bindParam(":rut", $datos["rutFuncionarios"], PDO::PARAM_STR);
		$sql -> execute();		
				
//cuenta la cantidad de registros encotrados con el mismo nombre
		if(count($sql -> fetchAll())>0){
			return "2";
		}else{
			$sql = Conexion::conectar()->prepare("INSERT INTO $tabla() VALUES (NULL, 'libre', :rut, :nombre, :apellido, 'Cargo uno',  :fecha, :imagen)");
		$sql->bindParam(":nombre", $datos["nombreFuncionarios"], PDO::PARAM_STR);
		$sql->bindParam(":apellido", $datos["apellidoFuncionarios"], PDO::PARAM_STR);
		$sql->bindParam(":rut", $datos["rutFuncionarios"], PDO::PARAM_STR);
		$sql->bindParam(":fecha", $datos["nacFuncionarios"], PDO::PARAM_STR);
		$sql->bindParam(":imagen", $rutaImagen, PDO::PARAM_STR);

		if( $sql -> execute() ) {
			return "1";
		} else {
			return "error";
		}
		}
	}



	static public function mdlEliminarFuncionarios($tabla, $id_funcionarios) {

		$sql = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idfuncionarios = :id");

		$sql->bindParam(":id", $id_funcionarios, PDO::PARAM_INT);

		if( $sql->execute()) {
			return "ok";
		} else {
			return "error";
		}

	}

	static public function mdlEditarFuncionarios($tabla, $id_funcionarios) {

		$sql = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE idfuncionarios = :id");
		$sql->bindParam(":id", $id_funcionarios, PDO::PARAM_INT);

		$sql -> execute();
		return json_encode($sql -> fetch());

	}

	static public function mdlActualizarFuncionarios($tabla, $datos, $rutaImagen) {

		if( is_null($rutaImagen)) {
			$sql = Conexion::conectar()->prepare("UPDATE $tabla SET titulo = :titulo, descripcion = :descripcion, url = :vinculo, fecha = NOW() WHERE id = :id");

			$sql->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
			$sql->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
			$sql->bindParam(":vinculo", $datos["vinculo"], PDO::PARAM_STR);
			$sql->bindParam(":id", $datos["id_funcionarios"], PDO::PARAM_INT);

		} else {
			$sql = Conexion::conectar()->prepare("UPDATE $tabla SET titulo = :titulo, descripcion = :descripcion, rutaImg = :rutaNueva, url = :vinculo, fecha = NOW() WHERE id = :id");

			$sql->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
			$sql->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
			$sql->bindParam(":rutaNueva", $rutaImagen, PDO::PARAM_STR);
			$sql->bindParam(":vinculo", $datos["vinculo"], PDO::PARAM_STR);
			$sql->bindParam(":id", $datos["id_funcionarios"], PDO::PARAM_INT);



		} 

		if($sql->execute()) {
			return "ok";
		} else {
			return "error";
		}

	}

}


?>