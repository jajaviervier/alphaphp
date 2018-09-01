$(document).ready(function(){
	$("#formu-nuevo-cascos").submit(function (e) {
		e.preventDefault()
		var datos = new FormData($(this)[0])
console.log(datos)
		$.ajax({
			url: 'ajax/ajaxArmas.php',
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

	$("body .table-dark").on("click", ".btnEliminarArmas", function(){
		var idArmas = $(this).attr("idArmas")

		var datos = new FormData()
		datos.append("id_armas", idArmas);
		datos.append("tipoOperacion", "eliminarArmas");
		swal({
		  title: '¿Estás seguro de eliminar?',
		  text: "Los cambios no son reversibles!",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Si, Eliminsa!'
		}).then((result) => {
		  if (result.value) {
		  	$.ajax({
				url: 'ajax/ajaxArmas.php',
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
						    window.location = "armas"
						  }
						})
					}
				}

			})
		  }
		})




		

	})

	$("body .table-dark").on("click", ".btnEditarArmas", function(){
		var idArmas = $(this).attr("idArmas");
		console.log(idArmas)
		var datos = new FormData()
		datos.append("id_Armas", idArmas)
		datos.append("tipoOperacion", "editarArmas")
		$.ajax({
			url: 'ajax/ajaxArmas.php',
			type: 'POST',
			data: datos,
			processData: false,
			contentType: false,
			success: function(respuesta) {
				console.log(respuesta);
				var valor = JSON.parse(respuesta)
				console.log(valor.id_cascos)
				console.log(valor.rutArmas)

				$('#formu-editar-cascos input[name="nombreArmas"]').val(valor.nombreArmas)
				$('#formu-editar-cascos input[name="apellidoArmas"]').val(valor.apellidoArmas)
				$('#formu-editar-cascos input[name="rutArmas"]').val(valor.rutArmas)
				$('#formu-editar-cascos #imagenArmas').attr("src", valor.imagenArmas)
				$('#formu-editar-cascos input[name="fonoArmas"]').val(valor.fonoArmas)
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
			url: 'ajax/ajaxArmas.php',
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
					  text: 'Armas actualizado con éxito'
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
		imgArmas = this.files[0];
			if( imgArmas["type"] != "image/jpeg" && imgArmas["type"] != "image/png") {
				$("#custom").val("")

				swal({
					type: 'error',
					title: 'No es una imagen!!',
					text: 'Debe subir imagenes en formato JPEG o PNG',
				})
			} 
			if ( imgArmas["type"] > 2000000) {
				$("#imagenArmas").val("")

				swal({
					type: "Error al subir la imagen",
					text: "La imagen debe pesar MAX 2MB",
					icon: 'error',
					confirmButtonText: "¡Cerrar!",
				})
			}

			else {
				$("#imagenArmas").css("display", "block")

				var datosImagen = new FileReader;
		  		datosImagen.readAsDataURL(imgArmas);

		  		$(datosImagen).on("load", function(event){

		  			var rutaImagen = event.target.result;

		  			$("." + identificador +" #imagenArmas").attr("src", rutaImagen);
		  		})
			}

		}
	
	
		
})