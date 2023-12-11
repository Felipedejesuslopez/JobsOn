<link rel="icon" href="../img/logo.png" type="image/png">
<link rel="shortcut icon" href="../img/logo.png" type="image/png">
<link rel="icon" href="img/logo.png" type="image/png">
<link rel="shortcut icon" href="img/logo.png" type="image/png">
<link rel="icon" href="../../img/Logo.png" type="image/png">
<link rel="shortcut icon" href="../../img/Logo.png" type="image/png">
<link rel="icon" href="../img/Logo.png" type="image/png">
<link rel="shortcut icon" href="../img/Logo.png" type="image/png">
<link rel="icon" href="img/Logo.png" type="image/png">
<link rel="shortcut icon" href="img/Logo.png" type="image/png">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- jQuery Mobile -->
<script src="https://code.jquery.com/mobile/1.5.0-alpha.1/jquery.mobile-1.5.0-alpha.1.min.js"></script>


<!-- Bootstrap 4 CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Bootstrap 4 JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- FontAwesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<script src="js/main.js"></script>
<!-- HTML del menú personalizado -->
<div id="customMenu" style="display: none; margin-left:-3%; position:sticky;">
    <ul>
        <div class="button-list">

            <button onclick="location.reload()" class="btn btn-primary" style="width:100px;">Reiniciar</button><br>
            <button onclick="window.close()" class="btn btn-danger" style="width:100px; margin-top:2%;">Salir</button>

        </div>
    </ul>
</div>


<?php
if ($_SESSION['TEMA'] == 'D') {
?>
    <style>
        /* Estilos para ocultar el texto en dispositivos pequeños */
        @media (max-width: 991.98px) {
            .navbar-brand-text {
                display: none;
            }
        }

        #body {

            background-color: black;
            color: white;

            background-image: linear-gradient(rgba(0, 0, 0, 1), rgba(0, 0, 0, 0.9)), url('img/fastitwallpaper.png');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: contain;
        }

        /* Estilo para la barra de desplazamiento en tema oscuro */
        ::-webkit-scrollbar {
            width: 6px;
            /* Ancho inicial de la barra de desplazamiento */
            background-color: #333;
            /* Color de fondo */
            border-radius: 3px;
            /* Bordes redondeados */
        }

        /* Estilo para la barra de desplazamiento en tema oscuro cuando se desplaza */
        ::-webkit-scrollbar-thumb {
            background-color: #2c70b7;
            /* Color del track de la barra al hacer scroll */
            border-radius: 3px;
            /* Bordes redondeados */
        }

        /* Estilo para el botón de desplazamiento hacia arriba y hacia abajo */
        ::-webkit-scrollbar-button {
            display: none;
            /* Oculta el botón de desplazamiento */
        }


        #main {

            background-image: linear-gradient(rgba(0, 0, 0, 1), rgba(0, 0, 0, 0.9)), url('img/fastitwallpaper.png');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: contain;
            color: white;
        }

        .dropdown-item {
            background-color: gray;
            color: white;
        }

        .card {
            background-color: rgba(0, 0, 0, 0.2);
            color: white;
            border: 1px solid gray;

        }

        @media (max-width: 767px) {
            .card {
                margin-bottom: 5%;
                /* Ajusta el valor del margen según tus necesidades */
            }
        }

        .card-header {
            background-color: rgba(0, 0, 0, 0.7);
            color: white;

        }

        .card-header img {
            width: 100%;
        }

        .card-body {
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
        }

        .card-body span {
            text-align: right;
            color: aqua;
        }

        .card-body p {
            font-size: 8pt;
            color: gray;
            text-align: justify;
        }
    </style>
<?php
} else {
?>
    <style>
        #body {

            background-color: white;
            color: black;
            background-image: linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.2)), url('img/fastitwallpaper.png');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: contain;
        }

        /* Estilo para la barra de desplazamiento en tema claro */
        ::-webkit-scrollbar {
            width: 6px;
            /* Ancho inicial de la barra de desplazamiento */
            background-color: #f0f0f0;
            /* Color de fondo */
            border-radius: 3px;
            /* Bordes redondeados */
        }

        /* Estilo para la barra de desplazamiento en tema claro cuando se desplaza */
        ::-webkit-scrollbar-thumb {
            background-color: #b3d4fc;
            /* Color del track de la barra al hacer scroll */
            border-radius: 3px;
            /* Bordes redondeados */
        }

        /* Estilo para el botón de desplazamiento hacia arriba y hacia abajo */
        ::-webkit-scrollbar-button {
            display: none;
            /* Oculta el botón de desplazamiento */
        }

        #main {

            color: black;
        }

        .dropdown-item {

            color: black;
        }


        .card {
            background-color: rgba(0, 0, 0, 0.2);
            color: black;

        }

        .card-header {
            background-color: rgba(255, 255, 255, 0.7);
            color: black;

        }

        .card-header img {
            width: 100%;
        }

        .card-body {
            background-color: rgba(255, 255, 255, 0.5);
            color: black;
        }

        .card-body span {
            text-align: right;
            color: darkblue;
            align-items: flex-end;
        }

        .card-body p {
            font-size: 8pt;
            color: gray;
            text-align: justify;
        }
    </style>
<?php
}
?>
<style>
    .ui-loader {
        display: none !important;
    }



    .profile-icon {
        position: relative;
        color: white;
        width: 100%;
        border-radius: 15%;
        font-size: 40pt;
        font-weight: bold;
        padding-top: 10%;
        padding-bottom: 10%;
        vertical-align: middle;
        text-align: center;
    }

    /* Define el estilo del div */
    .resaltar-div {
        transition: box-shadow 0.3s ease;
        /* Agrega una transición suave al efecto */
    }

    /* Aplica el efecto de resaltado al pasar el cursor por encima */
    .resaltar-div:hover {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        /* Cambia la sombra del div */
        z-index: 999;
        /* Asegura que el div esté por encima de otros elementos */
    }



    /* TEMPLATE STYLES */
    main {
        padding-top: 3rem;
        padding-bottom: 2rem;
    }

    .extra-margins {
        margin-top: 1rem;
        margin-bottom: 2.5rem;
    }

    /* Style The Dropdown Button */
    .dropbtn {
        background-color: #4CAF50;
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
        cursor: pointer;
    }

    /* The container <div> - needed to position the dropdown content */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    /* Dropdown Content (Hidden by Default) */
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    /* Links inside the dropdown */
    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    /* Change color of dropdown links on hover */
    .dropdown-content a:hover {
        background-color: #f1f1f1
    }

    /* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-content {
        display: block;
    }

    /* Change the background color of the dropdown button when the dropdown content is shown */
    .dropdown:hover .dropbtn {
        background-color: #3e8e41;
    }

    nav {
        display: grid;
        grid-template-columns: 1fr auto;
        align-items: center;
        background: aliceblue;
        font-family: sans-serif;
        position: fixed;
        top: 0;
        width: 100%;
    }


    /* switch */
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }



    .custom-input-file {
        background-color: #941B80;
        color: #fff;
        cursor: pointer;
        font-size: 18px;
        font-weight: bold;
        margin: 0 auto 0;
        min-height: 15px;
        overflow: hidden;
        padding: 10px;
        position: relative;
        text-align: center;
        width: 400px;
    }

    .custom-input-file .input-file {
        border: 10000px solid transparent;
        cursor: pointer;
        font-size: 10000px;
        margin: 0;
        opacity: 0;
        outline: 0 none;
        padding: 0;
        position: absolute;
        right: -1000px;
        top: -1000px;
    }

    .personalized {
        border-radius: 10px;
        background-color: #CFCECF;
        border-color: black;
        padding: 0;
        margin: 0;
        text-align: center;
        font-family: Arial, Helvetica, sans-serif;
        outline: none;
        width: 150px;
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    body {
        -webkit-user-select: none;
        /* Otras propiedades para otros navegadores (opcional) */
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .loader-container {
        display: flex;
        justify-content: center;
        /* Centrar horizontalmente */
        align-items: center;
        /* Centrar verticalmente */
        height: 100vh;
        /* Altura del contenedor igual al 100% de la ventana */
    }

    .loader {
        border: 4px solid #ffffff;
        /* Borde blanco */
        border-top: 4px solid #007bff;
        /* Color azul */
        border-bottom: 4px solid black;
        /* Color rojo */
        border-radius: 50%;
        /* Forma circular */
        width: 10%;
        /* Tamaño del loader (10% del ancho de la pantalla) */
        height: 0;
        padding-top: 10%;
        /* Tamaño del loader (10% del ancho de la pantalla) */
        animation: spin 2s linear infinite;
        /* Animación de giro */
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .loader-container {
        display: flex;
        justify-content: center;
        /* Centrar horizontalmente */
        align-items: center;
        /* Centrar verticalmente */
        height: 100vh;
        /* Altura del contenedor igual al 100% de la ventana */
    }

    .loader {
        border: 6px solid #ffffff;
        /* Borde blanco (más grueso) */
        border-top: 6px solid #007bff;
        /* Color azul (más grueso) */
        border-bottom: 6px solid black;
        /* Color rojo (más grueso) */
        border-radius: 50%;
        /* Forma circular */
        width: 10%;
        /* Tamaño del loader (10% del ancho de la pantalla) */
        height: 0;
        padding-top: 10%;
        /* Tamaño del loader (10% del ancho de la pantalla) */
        animation: spin 2s linear infinite;
        /* Animación de giro */
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    h1 {
        font-family: "Arial", sans-serif;
        font-size: 36px;
        font-weight: bold;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        letter-spacing: 2px;
        text-transform: uppercase;
        border-bottom: 2px solid #007bff;
        padding-bottom: 5px;
    }

    @media (max-width: 767px) {
        h1 {
            font-size: 24px;
            /* Puedes ajustar el tamaño según tus necesidades */
            /* Otros estilos para teléfono aquí */
        }
    }

    @media (min-width: 991.98px) {
        main {
            padding-left: 240px;
        }
    }

    /* Sidebar */
    .sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        padding: 58px 0 0;
        /* Height of navbar */
        box-shadow: 0 2px 10px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
        width: 240px;
        z-index: 600;
    }

    @media (max-width: 991.98px) {
        .sidebar {
            width: 100%;
        }
    }

    .sidebar .active {
        border-radius: 5px;
        box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
    }

    .sidebar-sticky {
        position: relative;
        top: 0;
        height: calc(100vh - 48px);
        padding-top: 0.5rem;
        overflow-x: hidden;
        overflow-y: auto;
        /* Scrollable contents if viewport is shorter than content. */
    }

    .card.zoom-on-hover:hover {
        /* Escala del 105% al pasar el cursor por encima */
        transform: scale(1.05);
        /* Transiciones suaves para una animación más fluida */
        transition: transform 0.3s ease;
    }

    /* Estilo para ocultar los radio buttons */
    .form-check-input[type="radio"] {
        position: absolute;
        left: -9999px;
    }

    /* Estilo para el switch estilo apagador */
    .form-check-label {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 30px;
        border-radius: 15px;
        background-color: #ccc;
        cursor: pointer;
        line-height: 30px;
        text-align: center;
        font-weight: bold;
    }

    .form-check-input[type="radio"]:checked+.form-check-label {
        background-color: #007bff;
        color: white;
    }
</style>