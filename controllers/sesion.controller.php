<?php 


Class ControllerSesion {

	public function iniciarSesionCtr() {

		if (isset($_POST["user"])) {
			$tabla = "usuarios";
			$usuario = $_POST["user"];

			$respuesta = ModeloSesion::iniciarSesionMdl($tabla, $usuario);
			
			if($respuesta["usuariosCorreo"] == $_POST["user"] && $respuesta["usuariosPass"] == $_POST["password"]) {

				$_SESSION["autenticar"] = "ok";
				$_SESSION["nombre"] = $respuesta["usuariosNombre"];
				$_SESSION["id"] = $respuesta["idUsuarios"];
				$_SESSION["avatar"] = $respuesta["usuariosAvatar"];

				echo '
					<script>
						window.location = "home"
					</script>
				';

			} else {
				echo '
					<div class="alert alert-danger">
						Datos incorrectos. Inténtelo nuevamente.
					</div>	
				';
			}
		}
	}
}

?>