$(document).ready(function(){
	
	// mostrar lista de paises
	$.ajax({
			type:'POST',
			url:'Controlador/controladorlistapaises.php',
			//data:{'peticion': 'cargarlista'}
		})
		.done(function(p){  
			
			paises = JSON.parse(p);
			
			let lista = "<option value='0'>Selecciona un pais</option>";
			paises.forEach(pais => {
				lista += `
						<option id="idp" value="${pais.id}">${pais.paises}</option>`;
			}); 
			$('#paises').html(lista);
		})
		.fail(function(){
			alert('hubo un error fatal') 
	})
		// fin de mostrar lista de paises



// funcion para selecionar el pais para mostrar valores de taza
	$('#paises').on('change',function(){

			const id = $('#paises').val();

			$.post('Controlador/controladorvalores.php', {id}, (response) => {
		  
		const valores = JSON.parse(response);
		  
		  valores.forEach(v => {
			$('#taza').val(v.taza);
			$('#precio').val(v.precio);
			$('#nombrem').html(v.namemoneda);
 			
 			// esta condicion es para saber el tipo de operacion
 			if (v.namemoneda === "(€)" || v.namemoneda === "USD") {

				var input = $("#envio");
				var bolivares = $("#bolivares");
				var dolares = $("#dolaresefectivo");
				//Evento keyup
				input.keyup(function() {
				 // console.log(input.val()); //verificamos en consola

				 if (input.val() === "") {
					bolivares.html("0");
					dolares.html("0");
				  }
				  bolivares.val(parseFloat(input.val())* parseFloat(v.taza) - parseFloat(parseFloat(input.val())* parseFloat(v.taza)*0.5/100)); //agregamos en contenido
			      dolares.val((parseFloat(input.val()) * parseFloat(v.taza) -parseFloat(input.val()) * parseFloat(v.taza) * 0.085) / parseFloat(v.precio));
			      
				  //Podemos verificar si está vacio el input

			     });
			
			}else if (v.namemoneda === "CLP" || v.namemoneda === "ARS" || v.namemoneda === "S") {

				var input = $("#envio");
				var bolivares = $("#bolivares");
				var dolares = $("#dolaresefectivo");
				//Evento keyup
				input.keyup(function() {
				 // console.log(input.val()); //verificamos en consola

				 if (input.val() === "") {
					bolivares.html("0");
					dolares.html("0");
				  }
				  bolivares.val(parseFloat(input.val())* parseFloat(v.taza)); //agregamos en contenido
			      dolares.val((parseFloat(bolivares.val()) / parseFloat(v.precio)) - (parseFloat(bolivares.val()) / parseFloat(v.precio)) * parseFloat(3.412) / parseFloat (100));
				  //Podemos verificar si está vacio el input

			     });

			}else if(v.namemoneda === "COP"){

				var input = $("#envio");
				var bolivares = $("#bolivares");
				var dolares = $("#dolaresefectivo");
				//Evento keyup
				input.keyup(function() {
				  //console.log(input.val()); //verificamos en consola

				 if (input.val() === "") {
					bolivares.html("0");
					dolares.html("0");
				  }
				  bolivares.val(parseFloat(input.val()) /  parseFloat(v.taza)); //agregamos en contenido
			      dolares.val((parseFloat(bolivares.val()) / parseFloat(v.precio)) - (parseFloat(bolivares.val()) / parseFloat(v.precio)) * parseFloat(3.412));
				  //Podemos verificar si está vacio el input

			     });
			
			}// fin de los condicionales de las operaciones

		 });
		
		});

	});


// funcion para actualizar los valores de los paises
	$(document).on('click', '#actualizar', () => {

		let datos = {
				id: $('#paises').val(),
				taza: $('#taza').val(),
				precio: $('#precio').val(),
		    };
		
		$.post('Controlador/controladoractualizar.php', {datos}, (response) => {
		  
		alert(response);

		});
		
	});


	// funcion para eliminar los valores de los paises
	$(document).on('click', '#eliminarp', () => {

		let id = $('#paises').val();
		
		$.post('Controlador/controladoreliminar.php', {id}, (response) => {
	
		alert(response);
		 
		});
		
	});


// funcion para cambiar formulario un nuevo pais
	$(document).on('click', '#agregarp', () => {

		$('.bloque1').prop('style', 'display:none');
		$('.bloque2').prop('style', 'display:none');
		$('.bloque3').prop('style', 'display:block');
		
	});

// funcion para enviar el nuevo pais para registrarlo
	$(document).on('click', '#guardar', () => {

		validar();
	});

// funcion para volver al formulario de cambiar valores de las monedas
	$(document).on('click', '#atras', () => {

		$('.bloque3').prop('style', 'display:none');
		$('.bloque1').prop('style', 'display:block');
		$('.bloque2').prop('style', 'display:block');
	});


function validar(){

	var verificar = true;
    // validacion del nombre
    if ($('#nombrepais').val()==""){
       
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr["error"]('El campo nombre pais es necesario');
       // alert("el campo nombre es necesario");
       $('#nombrepais').focus();
        verificar = false;
    }
    else if ($('#nombremoneda').val()==""){

        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
         toastr["error"]('El campo nombre moneda es necesario');
        //alert("Nombre muy corto");
        $('#nombremoneda').focus();
        verificar = false;
    }
    else if ($('#taza2').val()==""){

        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr["error"]('El campo taza es necesario');
        //alert("Nombre muy largo");
        $('#taza2').focus();
        verificar = false;
    }
    else if ($('#precio2').val()=="") {

        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr["error"]('El campo precio es necesario');
        //alert("Este campo nombre acepta letras");
        $('#precio2').focus();
        verificar = false;
    }


    if (verificar==true){
           
           let datos = {
				pais: $('#nombrepais').val(),
				nombremoneda: $('#nombremoneda').val(),
				taza: $('#taza2').val(),
				precio: $('#precio2').val(),
		    };

            $.post('Controlador/controladoragregar.php',{datos},function(res){
               
               alert(res);
               $('.bloque3').prop('style', 'display:none');
			   $('.bloque1').prop('style', 'display:block');
			   $('.bloque2').prop('style', 'display:block');
            });

    }
} // fin de la funcion validar
	
}) // fin de la primera funcion
