$(document).ready(function(){
	$("#formu-nuevo-cascos").submit(function (e) {
		e.preventDefault()
		var datos = new FormData($(this)[0])
console.log(datos)
		$.ajax({
			url: 'ajax/ajaxEscudos.php',
			type: 'POST',
			data: datos,
			processData: false,
			contentType: false,
			success: function(respuesta) {
				console.log(respuesta)
				switch(respuesta) {
					case "1":
					swal({
						type: 'success',
						title: 'Excelente',
						text: 'Sub Categoria creada con éxito!'
					  }).then((result) => {
						if (result.value) {
							window.location = "cascos"
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
						  window.location = "cascos"
						}
					  })
				}
			}

		})

	})

	$("body .table-dark").on("click", ".btnEliminarEscudos", function(){
		var idEscudos = $(this).attr("idEscudos")

		var datos = new FormData()
		datos.append("id_escudos", idEscudos);
		datos.append("tipoOperacion", "eliminarEscudos");
		swal({
		  title: '¿Estás seguro de eliminars?',
		  text: "Los cambios no son reversibles!",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Si, Eliminar!'
		}).then((result) => {
		  if (result.value) {
		  	$.ajax({
				url: 'ajax/ajaxEscudos.php',
				type: 'POST',
				data: datos,
				processData: false,
				contentType: false,
				success: function(respuesta) {
					console.log(respuesta)
					if ( respuesta == "ok") {
						swal(
					      'Eliminado!',
					      'Su archivo a sido eliminados.',
					      'success'
					    ).then((result) => {
						  if (result.value) {
						    window.location = "escudos"
						  }
						})
					}
				}

			})
		  }
		})




		

	})

	$("body .table-dark").on("click", ".btnEditarEscudos", function(){
		var idEscudos = $(this).attr("idEscudos");
		console.log(idEscudos)
		var datos = new FormData()
		datos.append("id_Escudos", idEscudos)
		datos.append("tipoOperacion", "editarEscudos")
		$.ajax({
			url: 'ajax/ajaxEscudos.php',
			type: 'POST',
			data: datos,
			processData: false,
			contentType: false,
			success: function(respuesta) {
				console.log(respuesta);
				var valor = JSON.parse(respuesta)
				console.log(valor.id_cascos)
				console.log(valor.rutEscudos)

				$('#formu-editar-cascos input[name="nombreEscudos"]').val(valor.nombreEscudos)
				$('#formu-editar-cascos input[name="apellidoEscudos"]').val(valor.apellidoEscudos)
				$('#formu-editar-cascos input[name="rutEscudos"]').val(valor.rutEscudos)
				$('#formu-editar-cascos #imagenEscudos').attr("src", valor.imagenEscudos)
				$('#formu-editar-cascos input[name="fonoEscudos"]').val(valor.fonoEscudos)
				$('#formu-editar-cascos input[name="armaFuncionario"]').val(valor.armaFuncionario)
				$('#formu-editar-cascos input[name="cascoFuncionario"]').val(valor.cascoFuncionario)
				$('#formu-editar-cascos input[name="id_cascos"]').val(valor.id_cascos)

			}

		})

	})

	$("#formu-editar-cascos").submit(function (e) {
		e.preventDefault()

		var datos = new FormData($(this)[0])

		$.ajax({
			url: 'ajax/ajaxEscudos.php',
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
					  text: 'Escudos actualizado con éxito'
					}).then((result) => {
					  if (result.value) {
					    window.location = "cascos"
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
		imgEscudos = this.files[0];
			if( imgEscudos["type"] != "image/jpeg" && imgEscudos["type"] != "image/png") {
				$("#custom").val("")

				swal({
					type: 'error',
					title: 'No es una imagen!!',
					text: 'Debe subir imagenes en formato JPEG o PNG',
				})
			} 
			if ( imgEscudos["type"] > 2000000) {
				$("#imagenEscudos").val("")

				swal({
					type: "Error al subir la imagen",
					text: "La imagen debe pesar MAX 2MB",
					icon: 'error',
					confirmButtonText: "¡Cerrar!",
				})
			}

			else {
				$("#imagenEscudos").css("display", "block")

				var datosImagen = new FileReader;
		  		datosImagen.readAsDataURL(imgEscudos);

		  		$(datosImagen).on("load", function(event){

		  			var rutaImagen = event.target.result;

		  			$("." + identificador +" #imagenEscudos").attr("src", rutaImagen);
		  		})
			}

		}
	
	
		
})