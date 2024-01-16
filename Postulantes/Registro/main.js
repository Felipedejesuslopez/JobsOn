function segundo() {
    $('#pimero').hide();
    $('#segundo').show();
}

function tercero() {
    $('#segundo').hide();
    $('#tecero').show();
}

function cuato() {
    $('#tecero').hide();
    $('#cuato').show();
}


$('#username').on('input', function() {
    $.ajax({
        url: '../php/checkemail.php',
        method: 'post',
        data: { 'username': $('#username').val() }
    }).done(function(msg) {
        if (msg == 1) {
            $('#username').addClass('error');
            $('#ures').html('<p style="color:red;">¡Este usuario ya existe!<br>Usuario recomendado: ' + $('#username').val() + '_2</p>');
            $('#terc').prop('disabled', true);
        } else {
            $('#username').removeClass('error');
            $('#ures').html('<p style="color: green;">¡Usuario Disponible!</p>');
            $('#terc').prop('disabled', false);
        }
        console.log(msg);
    }).fail(function(e) {
        console.log(e);
    });
});


$("#dropzone").on("dragover", function() {
    $(this).addClass("hover");
});

$("#dropzone").on("dragleave", function() {
    $(this).removeClass("hover");
});

$("#dropzone2 input").on("change", function(e) {
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
        $("#res2").html(file.name);
    }

});

$('form').submit(function(e) {
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