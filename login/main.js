$(document).ready(function() {
    // Captura el evento submit de los formularios con la clase "ajax-form"
    $("form").submit(function(event) {
        // Evita el envío normal del formulario
        event.preventDefault();

        // Muestra el círculo de carga
        $('#res').html('<div class="loading"></div>');

        // Obtiene los datos del formulario
        var formData = $(this).serialize();

        // Obtiene la URL y el método del formulario actual
        var formAction = $(this).attr("action");
        var formMethod = $(this).attr("method");

        // Simula un retraso de 3 segundos antes de realizar la solicitud AJAX
        setTimeout(function() {
            // Realiza la solicitud AJAX
            $.ajax({
                type: formMethod,
                url: formAction,
                data: formData,
                beforeSend: function() {
                    // Puedes realizar acciones antes de la solicitud, si es necesario
                },
                complete: function() {
                    // Oculta el círculo de carga una vez que se ha completado la solicitud
                    $('#res .loading').remove();
                }
            }).done(function(response) {
                console.log(response);

                // Maneja la respuesta exitosa
                if (response == 0) {
                    $('#res').html('<div class="alert alert-danger" style="text-align:center;">Usuario y/o Contraseña incorrectos</div>');
                } else if (response == 1) {
                    // Aquí puedes agregar opciones adicionales según el usuario que ingrese
                    $('#res').html('<div class="loading"></div>');
                    setTimeout(function() {
                        // Redirige a la nueva página
                        window.location.href = "../";
                    }, 3000);
                } else {
                    $('#res').html(response);
                }
            }).fail(function(e) {
                // Maneja los errores de la solicitud AJAX
                console.error("Error en la solicitud AJAX:", e);
            });
        }, 3000); // 3000 milisegundos (3 segundos) de retraso
    });
});