<?php 

require_once "conexion.php";

Class ModeloSesion {

	static public function iniciarSesionMdl($tabla, $usuario) {
		$sql = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE usuariosCorreo = '$usuario'");
		$sql -> execute();
		return $sql->fetch();
	}

}

?>