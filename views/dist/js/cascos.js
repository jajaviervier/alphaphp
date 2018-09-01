$(document).ready(function(){
	$("#formu-nuevo-cascos").submit(function (e) {
		e.preventDefault()
		var datos = new FormData($(this)[0])
console.log(datos)
		$.ajax({
			url: 'ajax/ajaxCascos.php',
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

	$("body .table-dark").on("click", ".btnEliminarCascos", function(){
		var idCascos = $(this).attr("idCascos")
	
		var datos = new FormData()
		datos.append("id_cascos", idCascos);
		datos.append("tipoOperacion", "eliminarCascos");
		swal({
		  title: '¿Estás seguro de eliminars?',
		  text: "Los cambios no son reversibles!",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Si, Eliminsa!'
		}).then((result) => {
		  if (result.value) {
		  	$.ajax({
				url: 'ajax/ajaxCascos.php',
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
						    window.location = "cascos"
						  }
						})
					}
				}

			})
		  }
		})




		

	})

	$("body .table-dark").on("click", ".btnEditarCascos", function(){
		var idCascos = $(this).attr("idCascos");
		console.log(idCascos)
		var datos = new FormData()
		datos.append("id_cascos", idCascos)
		datos.append("tipoOperacion", "editarCascos")

		$.ajax({
			url: 'ajax/ajaxCascos.php',
			type: 'POST',
			data: datos,
			processData: false,
			contentType: false,
			success: function(respuesta) {
				console.log(respuesta);
				var valor = JSON.parse(respuesta)
				console.log(valor.id_cascos)
				console.log(valor.rutCascos)

				$('#formu-editar-cascos input[name="nombreCascos"]').val(valor.nombreCascos)
				$('#formu-editar-cascos input[name="apellidoCascos"]').val(valor.apellidoCascos)
				$('#formu-editar-cascos input[name="rutCascos"]').val(valor.rutCascos)
				$('#formu-editar-cascos #imagenCascos').attr("src", valor.imagenCascos)
				$('#formu-editar-cascos input[name="fonoCascos"]').val(valor.fonoCascos)
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
			url: 'ajax/ajaxCascos.php',
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
					  text: 'Cascos actualizado con éxito'
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
		imgCascos = this.files[0];
			if( imgCascos["type"] != "image/jpeg" && imgCascos["type"] != "image/png") {
				$("#custom").val("")

				swal({
					type: 'error',
					title: 'No es una imagen!!',
					text: 'Debe subir imagenes en formato JPEG o PNG',
				})
			} 
			if ( imgCascos["type"] > 2000000) {
				$("#imagenCascos").val("")

				swal({
					type: "Error al subir la imagen",
					text: "La imagen debe pesar MAX 2MB",
					icon: 'error',
					confirmButtonText: "¡Cerrar!",
				})
			}

			else {
				$("#imagenCascos").css("display", "block")

				var datosImagen = new FileReader;
		  		datosImagen.readAsDataURL(imgCascos);

		  		$(datosImagen).on("load", function(event){

		  			var rutaImagen = event.target.result;

		  			$("." + identificador +" #imagenCascos").attr("src", rutaImagen);
		  		})
			}

		}
	
	
		
})