
//Log
//se creó un switch con el fin de validar todas las respuestas de error del servidor
//que anteriormente no alertaban al usuario
//Se implementa un mensaje de alerta para confirmar si la accion se desea llevar a cabo.


// En Proceso 
// Por el momento no se están actualizando los datos. Solución pendiente.
$(document).ready(function(){
	$("#formu-nuevo-funcionarios").submit(function (e) {
		e.preventDefault()
		var datos = new FormData($(this)[0])
		$.ajax({
			url: 'ajax/ajaxFuncionarios.php',
			type: 'POST',
			data: datos,
			processData: false,
			contentType: false,
			success: function(respuesta) {
				switch(respuesta) {
					case "1":
					swal({
						type: 'success',
						title: 'Excelente',
						text: 'Funcionario agregado con exito!'
					  }).then((result) => {
						if (result.value) {
							window.location = "funcionarios"
						  }
					  })
						break;
					case "2":
					swal({
						type: 'error',
						title: 'Error',
						text: 'Funcionario ya registrado'
					  }).then((result) => {
						if (result.value) {
							 
						}
					  })

						break;
					default:
					swal({
						type: 'error',
						title: 'Error',
						text: 'Algo salió mal'
					  }).then((result) => {
						if (result.value) {
						  window.location = "funcionarios"
						}
					  })
				}
			}

		})

	})

	$("body .table-dark").on("click", ".btnEliminarFuncionarios", function(){
		var idFuncionarios = $(this).attr("idFuncionarios")
		var rutaImagen =$(this).attr("rutaImagen");
		console.log(rutaImagen);
		console.log("ruta Imagensdsddssd")
		var datos = new FormData()
		datos.append("id_funcionarios", idFuncionarios);
		datos.append("tipoOperacion", "eliminarFuncionarios");
		datos.append("rutaImagen", rutaImagen);
		swal({
		  title: '¿Estás seguro de eliminar?',
		  text: "Los cambios no son reversibles!",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Si, Eliminar!'
		}).then((result) => {
		  if (result.value) {
		  	$.ajax({
				url: 'ajax/ajaxFuncionarios.php',
				type: 'POST',
				data: datos,
				processData: false,
				contentType: false,
				success: function(respuesta) {
					console.log(respuesta)
					if ( respuesta == "ok") {
						swal(
					      'Eliminado!',
					      'Su archivo a sido eliminadso.',
					      'success'
					    ).then((result) => {
						  if (result.value) {
						    window.location = "funcionarios"
						  }
						})
					}
				}

			})
		  }
		})




		

	})



	$("body .table-dark").on("click", ".btnEditarFuncionarios", function(){
		var idFuncionarios = $(this).attr("idFuncionarios");
		console.log(idFuncionarios)
		var datos = new FormData()
		datos.append("id_funcionarios", idFuncionarios)
		datos.append("tipoOperacion", "editarFuncionarios")

		$.ajax({
			url: 'ajax/ajaxFuncionarios.php',
			type: 'POST',
			data: datos,
			processData: false,
			contentType: false,
			success: function(respuesta) {
				console.log(respuesta);
				var valor = JSON.parse(respuesta)
				console.log(valor.id_funcionarios)
				console.log(valor.rutFuncionarios)

				$('#formu-editar-funcionarios input[name="nombreFuncionarios"]').val(valor.nombreFuncionarios)
				$('#formu-editar-funcionarios input[name="apellidoFuncionarios"]').val(valor.apellidoFuncionarios)
				$('#formu-editar-funcionarios input[name="rutFuncionarios"]').val(valor.rutFuncionarios)
				$('#formu-editar-funcionarios #imagenFuncionarios').attr("src", valor.imagenFuncionarios)
				$('#formu-editar-funcionarios input[name="fonoFuncionarios"]').val(valor.fonoFuncionarios)
				$('#formu-editar-funcionarios input[name="armaFuncionario"]').val(valor.armaFuncionario)
				$('#formu-editar-funcionarios input[name="cascoFuncionario"]').val(valor.cascoFuncionario)
				$('#formu-editar-funcionarios input[name="id_funcionarios"]').val(valor.id_funcionarios)

			}

		})

	})

	$("#formu-editar-funcionarios").submit(function (e) {
		e.preventDefault()

		var datos = new FormData($(this)[0])

		$.ajax({
			url: 'ajax/ajaxFuncionarios.php',
			type: 'POST',
			data: datos,
			processData: false,
			contentType: false,
			success: function(respuesta) {
				console.log(respuesta)
				if (respuesta == "ok") {
					swal({
					  type: 'success',
					  title: 'Actualizado',
					  text: 'Funcionarios actualizado con éxito'
					}).then((result) => {
					  if (result.value) {
					    window.location = "funcionarios"
					  }
					})
				}
			}

		})

	})







	// PREVISUALIZAR IMAGENES

	$("#imagen").change(previsualizarImg)
	$("#imagenEditar").change(previsualizarImg)


	function previsualizarImg(e) {
		var contenedor = e.target.parentNode

		var identificador = contenedor.classList[1]

		imgFuncionarios = this.files[0];

			if( imgFuncionarios["type"] != "image/jpeg" && imgFuncionarios["type"] != "image/png") {
				$("#custom").val("")

				swal({
					type: 'error',
					title: 'No es una imagen!!',
					text: 'Debe subir imagenes en formato JPEG o PNG',
				})
			} 
			if ( imgFuncionarios["type"] > 2000000) {
				$("#imagenFuncionarios").val("")

				swal({
					type: "Error al subir la imagen",
					text: "La imagen debe pesar MAX 2MB",
					icon: 'error',
					confirmButtonText: "¡Cerrar!",
				})
			}

			else {
				$("#imagenFuncionarios").css("display", "block")

				var datosImagen = new FileReader;
		  		datosImagen.readAsDataURL(imgFuncionarios);

		  		$(datosImagen).on("load", function(event){

		  			var rutaImagen = event.target.result;

		  			$("." + identificador +" #imagenFuncionarios").attr("src", rutaImagen);
		  		})
			}

		}
	
	
		
})