$(document).ready(function() {
    $('form').submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize();

        // Obtiene la URL y el método del formulario actual
        var formAction = $(this).attr("action");
        var formMethod = $(this).attr("method");

        $.ajax({
            url: formAction,
            method: formMethod,
            data: formData
        }).done(function(response) {
            if (response == 1) {
                $(document).ready(function() {
                    $('#miModal').modal('show');

                    // Redirigir después de 4 segundos
                    setTimeout(function() {
                        window.location.href = "../../login/";
                    }, 4000);
                });
            } else if (response == 2) {
                $('#user').focus();
                $('#usuario').html('<div style="color:red;">Este nombre de usuario ya está registrado, prueba con uno diferente</div>');
            } else {
                $('#response').html(response);
            }
        }).fail(function(e) {

        });
    });
});