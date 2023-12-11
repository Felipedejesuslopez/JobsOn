function onSwipeLeft() {
    $('#sidebarMenu').animate({
            marginLeft: '-100%', // Mueve el menú a la izquierda para ocultarlo
        },
        900, // Duración de la animación en milisegundos (0.9 segundos en este caso)
        function() {

            // Esta función se ejecutará cuando termine la animación
            $('#sidebarMenu').hide(); // Oculta completamente el menú después de la animación
        }
    );


}

// Función que se ejecutará al deslizar hacia la derecha
function onSwipeRight() {

    $('#sidebarMenu').css('margin-left', '-100%'); // Asegurarse de que el menú esté inicialmente oculto fuera de la pantalla a la izquierda
    $('#sidebarMenu').show(); // Mostrar el menú antes de la animación

    $('#sidebarMenu').animate({
            marginLeft: '0', // Mueve el menú hacia la izquierda para mostrarlo (0 indica que no hay margen izquierdo)
        },
        900, // Duración de la animación en milisegundos (0.9 segundos en este caso)
        function() {
            // Esta función se ejecutará cuando termine la animación
            // Puedes agregar aquí cualquier otro código que desees que se ejecute después de mostrar el menú
        }
    );
}

function setupHandlers() {
    $('#main').on('submit', 'form', function(e) {
        e.preventDefault();


        var form = $(this);
        var url = form.attr('action');
        var formData = new FormData(form[0]);

        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false
        }).done(function(msg) {
            $('#aviso').html(msg);
            $('#modalavisos').modal('show');
            console.log(msg);
        }).fail(function(e) {
            $('#main').html(e);
        });

        // Ejemplo de impresión en la consola
        console.log('Action:', url);
        console.log('Form Data:', formData);
    });


    // Vincula el evento click a los elementos <a> dentro del contenedor con id "main"
    $('#main').on('click', 'a', function(e) {
        e.preventDefault();

        var url = $(this).attr('href');
        $.ajax({
            url: url,
            method: 'POST'
        }).done(function(msg) {
            $('#main').html(msg);
            setupHandlers();
        }).fail(function(e) {
            $('#main').html(e);
        });
    });

    $('a').click(function(e) {
        e.preventDefault(); // Evita la acción predeterminada del enlace (redireccionamiento)
        var url = $(this).attr('href'); // Obtiene la URL del enlace
        // Agrega la clase "active" al enlace al que se le dio clic
        $('a').removeClass('active'); // Elimina la clase "active" de todos los enlaces
        $(this).addClass('active'); // Agrega la clase "active" al enlace actual

        if ($(window).width() <= 768) {
            onSwipeLeft();
        }

        var loaderHTML = '<div id="loader" class="loader-container">' +
            '<div class="loader">' +
            '</div>' +
            '</div>';

        // Agregar el loader al DOM
        $('#main').html(loaderHTML);
        $('#loader').show();

        $.ajax({
            url: url,
            method: 'POST'
        }).done(function(msg) {
            $('#main').html(msg);
            setupHandlers();
        }).fail(function(e) {
            $('#main').html('<div class="alert alert-danger">Revise su conexión a internet, parece que no hay</div>');
        })
    });

}


$(document).ready(function() {

    if ($(window).width() <= 768) {
        $(document).on("swipeleft swiperight", function(event) {
            if (event.type === "swipeleft") {
                // Función a ejecutar cuando se deslice de izquierda a derecha
                console.log("Deslizó de izquierda a derecha");
                onSwipeLeft();
                // Llamar a la función que desees ejecutar aquí
            } else if (event.type === "swiperight") {
                // Función a ejecutar cuando se deslice de derecha a izquierda
                console.log("Deslizó de derecha a izquierda");
                onSwipeRight();
                // Llamar a la función que desees ejecutar aquí
            }
        });
    }

    //Default para no redirigir sino traer html como componente
    $('a').click(function(e) {
        e.preventDefault(); // Evita la acción predeterminada del enlace (redireccionamiento)
        var url = $(this).attr('href'); // Obtiene la URL del enlace
        // Agrega la clase "active" al enlace al que se le dio clic
        $('a').removeClass('active'); // Elimina la clase "active" de todos los enlaces
        $(this).addClass('active'); // Agrega la clase "active" al enlace actual

        if ($(window).width() <= 768) {
            onSwipeLeft();
        }

        var loaderHTML = '<div id="loader" class="loader-container">' +
            '<div class="loader">' +
            '</div>' +
            '</div>';

        // Agregar el loader al DOM
        $('#main').html(loaderHTML);
        $('#loader').show();

        $.ajax({
            url: url,
            method: 'POST'
        }).done(function(msg) {
            $('#main').html(msg);
            setupHandlers();
        }).fail(function(e) {
            $('#main').html('<div class="alert alert-danger">Revise su conexión a internet, parece que no hay</div>');
        })
    });


    $(document).ajaxComplete(function() {
        setupHandlers(); // Llama a la función después de cada solicitud AJAX
    });

});