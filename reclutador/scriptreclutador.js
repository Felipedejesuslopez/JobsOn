$(document).ready(function () {
  $("#formulario").submit(function (e) {
    e.preventDefault();

    $.ajax({
      type: "POST",
      url: "procesareclutador.php",
      data: $("#formulario").serialize(),
      success: function (response) {
        $("#resultado").html(response);
      },
      error: function (error) {
        console.log(error);
      },
    });
  });
});
