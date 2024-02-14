function onSwipeLeft() {
    $("#sidebarMenu").animate({
            marginLeft: "-100%",
        },
        900,
        function() {
            $("#sidebarMenu").hide();
        }
    );
}

function onSwipeRight() {
    $("#sidebarMenu").css("margin-left", "-100%").show().animate({
            marginLeft: "0",
        },
        900
    );
}

function loadContent(url) {
    var loaderHTML =
        '<div id="loader" class="loader-container">' +
        '<div class="loader"></div></div>';

    $("#main").html(loaderHTML);
    $("#loader").show();

    $.ajax({
        url: url,
        method: "POST",
    }).done(function(msg) {
        // Ajustar la altura de #main al nuevo contenido
        $("#main").html("");
        var newContentHeight = $("#main").height();
        $("#main").height(newContentHeight);
        $("#main").html(msg);
    }).fail(function(e) {
        $("#main").html('<div class="alert alert-danger">Revise su conexión a internet, parece que no hay</div>');
    });

}

function postulate(vacant, user) {
    $.ajax({
        url: 'php/postular.php',
        method: 'post',
        data: {
            'usuario': user,
            'vacante': vacant
        }
    }).done(function(msg) {
        $("#aviso").html(msg);
        $("#modalavisos").modal("show");
        $('#postulatepc').attr("src", "img/vacantes/postulado.png");
        $('#postulatec').attr("src", "img/vacantes/postulado.png");
    }).fail(function(e) {
        $("#aviso").html(e);
        $("#modalavisos").modal("show");
    });
}

function bajar() {
    $("html, body").animate({ scrollTop: $(document).height() }, "slow");
}

function cvacante(w) {
    var vac = parseInt($("#idvac").val());

    if (w == "n") {
        vac = vac + 1;
    } else if (w == "l") {
        vac = vac - 1;
    }
    $.ajax({
            url: "vacantes/detalles/",
            method: "GET",
            data: {
                'id': vac,
                'w': w
            },
        })
        .done(function(msg) {
            $("#main").html("");
            var newContentHeight = $("#main").height();
            $("#main").height(newContentHeight);

            if (w == "n") {
                $("#main").addClass("slide-in").html(msg);
                // Después de un tiempo (por ejemplo, 500ms), elimina la clase para futuras animaciones
                setTimeout(function() {
                    $("#main").removeClass("slide-in");
                }, 500);
            } else if (w == "l") {
                $("#main").addClass("slide-in-back").html(msg);
                // Después de un tiempo (por ejemplo, 500ms), elimina la clase para futuras animaciones
                setTimeout(function() {
                    $("#main").removeClass("slide-in-back");
                }, 500);
            }
            window.scrollTo({ top: 0, behavior: 'smooth' });
        })
        .fail(function(e) {
            $("#aviso").html(e);
            $("#modalavisos").modal("show");
        });
}


function sendmessage() {
    var mensaje = $('#mensaje').serialize();
    $.ajax({
        url: 'php/sendmessage.php',
        method: 'post',
        data: mensaje
    }).done(function(msg) {
        console.log(msg);
        loadContent('mensajes/' + $('#ROL_EMISOR').val() + '/chat/?ie=' + $('#ID_EMISOR').val() + '&ir=' + $('#ID_RECEPTOR').val() + '&re=' + $('#ROL_EMISOR').val() + '&rr=' + $('#ROL_RECEPTOR').val());
        // Obtener el elemento chat
        var chat = document.querySelector('.chat');

        // Hacer scroll hasta abajo al cargar la página
        chat.scrollTop = chat.scrollHeight;
    }).fail(function(e) {
        console.log(e);
    })
}

$(document).ready(function() {
    document.addEventListener("touchstart", { passive: false });
    document.addEventListener("touchmove", { passive: false });

    if ($(window).width() <= 768) {
        $(document)
            .off("swipeleft")
            .on("swipeleft", function(event) {
                if (event.type === "swipeleft") {
                    console.log("Deslizó de izquierda a derecha");
                    onSwipeLeft();
                }
            });

        $(document).off("swipeleft swiperight", "#tarjetavacante").on("swipeleft swiperight", "#tarjetavacante", function(event) {
            if (event.type === "swipeleft") {
                cvacante("n");
            }
            if (event.type === "swiperight") {
                cvacante("l");
            }
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    $("a").off("click").on("click", function(e) {
        e.preventDefault();
        var url = $(this).attr("href");
        $("a").removeClass("active");
        $(this).addClass("active");
        if ($(window).width() <= 768) {
            onSwipeLeft();
        }
        loadContent(url);
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    $("#main").off("submit", "form").on("submit", "form", function(e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr("action");
        var formData = new FormData(form[0]);

        $.ajax({
                url: url,
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
            })
            .done(function(msg) {
                $("#aviso").html(msg);
                $("#modalavisos").modal("show");
                setTimeout(function() {
                    location.reload();
                }, 5000);
                console.log(msg);
            })
            .fail(function(e) {
                $("#aviso").html(msg);
                $("#modalavisos").modal("show");
            });
    });

    $("#main").off("click", "a").on("click", "a", function(e) {
        e.preventDefault();
        var url = $(this).attr("href");
        loadContent(url);
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
});

$(function() {
    $("#dropzone").on("dragover", function() {
        $(this).addClass("hover");
    });

    $("#dropzone").on("dragleave", function() {
        $(this).removeClass("hover");
    });

    $("#dropzone input").on("change", function(e) {
        var file = this.files[0];

        $("#dropzone").removeClass("hover");

        if (this.accept && $.inArray(file.type, this.accept.split(/, ?/)) == -1) {
            return alert("File type not allowed.");
        }

        $("#dropzone").addClass("dropped");
        $("#dropzone img").remove();

        if (/^image\/(gif|png|jpeg)$/i.test(file.type)) {
            var reader = new FileReader(file);

            reader.readAsDataURL(file);

            reader.onload = function(e) {
                var data = e.target.result,
                    $img = $("<img />").attr("src", data).fadeIn();

                $("#dropzone div").html($img);
            };
        } else {
            var ext = file.name.split(".").pop();

            $("#res").html(file.name);
        }
    });
});