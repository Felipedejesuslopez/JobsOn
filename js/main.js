function onSwipeLeft() {
    $('#sidebarMenu').animate({
        marginLeft: '-100%',
    }, 900, function() {
        $('#sidebarMenu').hide();
    });
}

function onSwipeRight() {
    $('#sidebarMenu').css('margin-left', '-100%').show().animate({
        marginLeft: '0',
    }, 900);
}

function loadContent(url) {
    var loaderHTML = '<div id="loader" class="loader-container">' +
        '<div class="loader"></div></div>';

    $('#main').html(loaderHTML);
    $('#loader').show();

    $.ajax({
        url: url,
        method: 'POST'
    }).done(function(msg) {
        $('#main').html(msg);
    }).fail(function(e) {
        $('#main').html('<div class="alert alert-danger">Revise su conexión a internet, parece que no hay</div>');
    });
}

$(document).ready(function() {
    if ($(window).width() <= 768) {
        $(document).off("swipeleft swiperight").on("swipeleft swiperight", function(event) {
            if (event.type === "swipeleft") {
                console.log("Deslizó de izquierda a derecha");
                onSwipeLeft();
            } else if (event.type === "swiperight") {
                console.log("Deslizó de derecha a izquierda");
                onSwipeRight();
            }
        });
    }

    $('a').off('click').on('click', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $('a').removeClass('active');
        $(this).addClass('active');
        if ($(window).width() <= 768) {
            onSwipeLeft();
        }
        loadContent(url);
    });

    $('#main').off('submit', 'form').on('submit', 'form', function(e) {
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

        console.log('Action:', url);
        console.log('Form Data:', formData);
    });

    $('#main').off('click', 'a').on('click', 'a', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        loadContent(url);
    });
});