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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<!-- jQuery Mobile -->
<script src="https://code.jquery.com/mobile/1.5.0-alpha.1/jquery.mobile-1.5.0-alpha.1.min.js"></script>


<!-- Bootstrap 4 CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Bootstrap 4 JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>


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
error_reporting(0);

if ($_SESSION['TEMA'] == 'D') {
?>
    <style>
        /* Estilos para ocultar el texto en dispositivos pequeños */
        @media (max-width: 991.98px) {
            .navbar-brand-text {
                display: none;
            }
        }

        body {

            background-color: black;
            color: white;
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
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: contain;
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

        #sidebarMenu {
            color: white;
            background-color: black;
        }

        #menuToggle {
            background-color: rgba(0, 0, 0, 0);
            border-color: rgba(0, 0, 0, 0);
            color: white;
            position: fixed;
            top: 1%;
            left: 2%;
            font-size: 24px;
            z-index: 10;
        }

        .form-control {
            background-color: rgba(0, 0, 0, 0.2);
            color: white;

        }

        .form-control:disabled {
            background-color: rgba(255, 255, 255, 0.3);
            color: white;
        }

        .message-sent {
            background-color: #6c757d;
            /* Gris oscuro */
            color: #fff;
            /* Texto blanco */
            border-radius: 10px;
            /* Bordes redondeados */
            padding: 8px 12px;
            /* Espaciado interno */
            margin: 5px 0;
            /* Margen entre mensajes */
            max-width: 70%;
            /* Ancho máximo del mensaje */
            align-self: flex-end;
            /* Alineado a la derecha */
            margin-left: 30%;
            /* Empujar hacia la derecha */

            text-align: right;

        }

        .message-received {
            background-color: #495057;
            /* Gris más oscuro */
            color: #fff;
            /* Texto blanco */
            border-radius: 10px;
            /* Bordes redondeados */
            padding: 8px 12px;
            /* Espaciado interno */
            margin: 5px 0;
            /* Margen entre mensajes */
            max-width: 70%;
            /* Ancho máximo del mensaje */
            align-self: flex-start;
            /* Alineado a la izquierda */
        }
    </style>
<?php
} else if ($_SESSION['TEMA'] == 'G') {
?>
    <style>
        /* Estilos para ocultar el texto en dispositivos pequeños */
        @media (max-width: 991.98px) {
            .navbar-brand-text {
                display: none;
            }
        }

        body {
            background-color: #303030;
            /* Gris oscuro */
            color: white;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: contain;
        }

        /* Estilo para la barra de desplazamiento en tema gris oscuro */
        ::-webkit-scrollbar {
            width: 6px;
            background-color: #222;
            /* Gris más oscuro */
            border-radius: 3px;
        }

        /* Estilo para la barra de desplazamiento en tema gris oscuro cuando se desplaza */
        ::-webkit-scrollbar-thumb {
            background-color: #444;
            /* Gris oscuro */
            border-radius: 3px;
        }

        /* Estilo para el botón de desplazamiento hacia arriba y hacia abajo */
        ::-webkit-scrollbar-button {
            display: none;
        }

        #main {
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: contain;
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

        #sidebarMenu {
            color: white;
            background-color: #303030;
            /* Gris oscuro */
        }

        #menuToggle {
            background-color: rgba(0, 0, 0, 0);
            border-color: rgba(0, 0, 0, 0);
            color: white;
            position: fixed;
            top: 1%;
            left: 2%;
            font-size: 24px;
            z-index: 0;
        }

        .form-control {
            background-color: rgba(0, 0, 0, 0.2);
            color: white;

        }

        .form-control:disabled {
            background-color: rgba(255, 255, 255, 0.3);
            color: white;
        }

        .message-sent {
            background-color: #DCF8C6;
            /* Verde claro para mensajes enviados */
            color: #333;
            /* Color de texto para mensajes enviados */
            margin-left: auto;
            /* Para alinear a la derecha */
            margin-right: 10px;
            /* Margen derecho para separar del borde */
            padding: 10px;
            /* Espaciado interno */
            border-radius: 10px;
            /* Bordes redondeados */
            max-width: 70%;
            /* Ancho máximo del mensaje */
            word-wrap: break-word;
            /* Romper palabras largas */
            margin-left: 30%;
            text-align: right;
        }

        .message-received {
            background-color: #EAEAEA;
            /* Gris claro para mensajes recibidos */
            color: #333;
            /* Color de texto para mensajes recibidos */
            margin-right: auto;
            /* Para alinear a la izquierda */
            margin-left: 10px;
            /* Margen izquierdo para separar del borde */
            padding: 10px;
            /* Espaciado interno */
            border-radius: 10px;
            /* Bordes redondeados */
            max-width: 70%;
            /* Ancho máximo del mensaje */
            word-wrap: break-word;
            /* Romper palabras largas */
        }
    </style>
<?php } else if ($_SESSION['TEMA'] == 'N') {
?>
    <style>
        /* Estilos para ocultar el texto en dispositivos pequeños */
        @media (max-width: 991.98px) {
            .navbar-brand-text {
                display: none;
            }
        }

        body {
            background-color: black;
            color: #1eff00;
            /* Verde neon */
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: contain;
        }

        /* Estilo para la barra de desplazamiento en tema neon */
        ::-webkit-scrollbar {
            width: 6px;
            background-color: #000;
            border-radius: 3px;
        }

        /* Estilo para la barra de desplazamiento en tema neon cuando se desplaza */
        ::-webkit-scrollbar-thumb {
            background-color: #1eff00;
            /* Verde neon */
            border-radius: 3px;
        }

        /* Estilo para el botón de desplazamiento hacia arriba y hacia abajo */
        ::-webkit-scrollbar-button {
            display: none;
        }

        #main {
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: contain;
            color: #1eff00;
            /* Verde neon */
        }

        .card {
            background-color: rgba(0, 0, 0, 0.2);
            color: #1eff00;
            /* Verde neon */
            border: 1px solid gray;
        }

        @media (max-width: 767px) {
            .card {
                margin-bottom: 5%;
            }
        }

        .card-header {
            background-color: rgba(0, 0, 0, 0.7);
            color: #1eff00;
            /* Verde neon */
        }

        .card-header img {
            width: 100%;
        }

        .card-body {
            background-color: rgba(0, 0, 0, 0.5);
            color: #1eff00;
            /* Verde neon */
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

        #sidebarMenu {
            color: #1eff00;
            /* Verde neon */
            background-color: black;
        }

        #menuToggle {
            background-color: rgba(0, 0, 0, 0);
            border-color: rgba(0, 0, 0, 0);
            color: #1eff00;
            position: fixed;
            top: 1%;
            left: 2%;
            font-size: 24px;
            z-index: 1;
        }

        .form-control {
            background-color: rgba(0, 0, 0, 0.2);
            color: white;

        }

        .form-control:disabled {
            background-color: rgba(255, 255, 255, 0.3);
            color: white;
        }

        .message-sent {
            background-color: #00ff00;
            /* Verde neón */
            color: #000;
            /* Texto negro */
            border-radius: 10px;
            /* Bordes redondeados */
            padding: 8px 12px;
            /* Espaciado interno */
            margin: 5px 0;
            /* Margen entre mensajes */
            max-width: 70%;
            /* Ancho máximo del mensaje */
            align-self: flex-end;
            /* Alineado a la derecha */
            margin-left: 30%;
            text-align: right;
        }

        .message-received {
            background-color: #ff00ff;
            /* Rosa neón */
            color: #000;
            /* Texto negro */
            border-radius: 10px;
            /* Bordes redondeados */
            padding: 8px 12px;
            /* Espaciado interno */
            margin: 5px 0;
            /* Margen entre mensajes */
            max-width: 70%;
            /* Ancho máximo del mensaje */
            align-self: flex-start;
            /* Alineado a la izquierda */
        }
    </style>
<?php
} else if ($_SESSION['TEMA'] == 'GL') {
?>
    <style>
        /* Estilos para ocultar el texto en dispositivos pequeños */
        @media (max-width: 991.98px) {
            .navbar-brand-text {
                display: none;
            }
        }

        body {
            background-color: #333;
            /* Gris oscuro */
            color: #ccc;
            /* Gris claro */
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: contain;
        }

        /* Estilo para la barra de desplazamiento en tema gris */
        ::-webkit-scrollbar {
            width: 6px;
            background-color: #555;
            /* Gris medio */
            border-radius: 3px;
        }

        /* Estilo para la barra de desplazamiento en tema gris cuando se desplaza */
        ::-webkit-scrollbar-thumb {
            background-color: #999;
            /* Gris claro */
            border-radius: 3px;
        }

        /* Estilo para el botón de desplazamiento hacia arriba y hacia abajo */
        ::-webkit-scrollbar-button {
            display: none;
        }

        #main {
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: contain;
            color: #ccc;
            /* Gris claro */
        }

        .card {
            background-color: #444;
            /* Gris oscuro medio */
            color: #ccc;
            /* Gris claro */
            border: 1px solid #666;
            /* Gris claro medio */
        }

        @media (max-width: 767px) {
            .card {
                margin-bottom: 5%;
            }
        }

        .card-header {
            background-color: #222;
            /* Gris oscuro */
            color: #ccc;
            /* Gris claro */
        }

        .card-header img {
            width: 100%;
        }

        .card-body {
            background-color: #333;
            /* Gris oscuro medio */
            color: #ccc;
            /* Gris claro */
        }

        .card-body span {
            text-align: right;
            color: #66c2ff;
            /* Azul claro */
        }

        .card-body p {
            font-size: 8pt;
            color: #999;
            /* Gris claro medio */
            text-align: justify;
        }

        #sidebarMenu {
            color: #ccc;
            /* Gris claro */
            background-color: #222;
            /* Gris oscuro */
        }

        #menuToggle {
            background-color: rgba(0, 0, 0, 0);
            border-color: rgba(0, 0, 0, 0);
            color: #ccc;
            /* Gris claro */
            position: fixed;
            top: 1%;
            left: 2%;
            font-size: 24px;
            z-index: 1;
        }

        .form-control {
            background-color: rgba(0, 0, 0, 0.2);
            color: white;

        }

        .form-control:disabled {
            background-color: rgba(255, 255, 255, 0.3);
            color: white;
        }

        #menuToggle {
            background-color: rgba(0, 0, 0, 0);
            border-color: rgba(0, 0, 0, 0);
            color: black;
            position: fixed;
            top: 1%;
            left: 2%;
            font-size: 24px;
            z-index: 1;
        }

        .message-sent {
            background-color: #f0f0f0;
            /* Gris claro */
            color: #000;
            /* Texto negro */
            border-radius: 10px;
            /* Bordes redondeados */
            padding: 8px 12px;
            /* Espaciado interno */
            margin: 5px 0;
            /* Margen entre mensajes */
            max-width: 70%;
            /* Ancho máximo del mensaje */
            align-self: flex-end;
            /* Alineado a la derecha */
            margin-left: 30%;
            text-align: right;
        }

        .message-received {
            background-color: #eaeaea;
            /* Gris más oscuro */
            color: #000;
            /* Texto negro */
            border-radius: 10px;
            /* Bordes redondeados */
            padding: 8px 12px;
            /* Espaciado interno */
            margin: 5px 0;
            /* Margen entre mensajes */
            max-width: 70%;
            /* Ancho máximo del mensaje */
            align-self: flex-start;
            /* Alineado a la izquierda */
        }
    </style>
<?php
} else if ($_SESSION['TEMA'] == 'A') {
?>
    <style>
        /* Estilos para ocultar el texto en dispositivos pequeños */
        @media (max-width: 991.98px) {
            .navbar-brand-text {
                display: none;
            }
        }

        body {
            background-color: #0a0813;
            /* Gris oscuro */
            color: #b3e0ff;
            /* Azul claro */
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: contain;
        }

        /* Estilo para la barra de desplazamiento en tema azul */
        ::-webkit-scrollbar {
            width: 6px;
            background-color: #333;
            /* Gris oscuro */
            border-radius: 3px;
        }

        /* Estilo para la barra de desplazamiento en tema azul cuando se desplaza */
        ::-webkit-scrollbar-thumb {
            background-color: #66c2ff;
            /* Azul claro */
            border-radius: 3px;
        }

        /* Estilo para el botón de desplazamiento hacia arriba y hacia abajo */
        ::-webkit-scrollbar-button {
            display: none;
        }

        #main {
            background-color: #0a0813;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: contain;
            color: #b3e0ff;
            /* Azul claro */
        }

        .card {
            background-color: #333;
            /* Gris oscuro */
            color: #b3e0ff;
            /* Azul claro */
            border: 1px solid #666;
            /* Gris claro medio */
        }

        @media (max-width: 767px) {
            .card {
                margin-bottom: 5%;
            }
        }

        .card-header {
            background-color: #1a1a1a;
            /* Gris oscuro */
            color: #b3e0ff;
            /* Azul claro */
        }

        .card-header img {
            width: 100%;
        }

        .card-body {
            background-color: #333;
            /* Gris oscuro */
            color: #b3e0ff;
            /* Azul claro */
        }

        .card-body span {
            text-align: right;
            color: #80bfff;
            /* Azul más oscuro */
        }

        .card-body p {
            font-size: 8pt;
            color: #999;
            /* Gris claro medio */
            text-align: justify;
        }

        #sidebarMenu {
            color: #b3e0ff;
            /* Azul claro */
            background-color: #162B4E;
            /* Gris oscuro */
        }

        #menuToggle {
            background-color: rgba(0, 0, 0, 0);
            border-color: rgba(0, 0, 0, 0);
            color: #b3e0ff;
            /* Azul claro */
            position: fixed;
            top: 1%;
            left: 2%;
            font-size: 24px;
            z-index: 1;
        }

        .message-sent {
            background-color: #3498db;
            /* Azul */
            color: #fff;
            /* Texto blanco */
            border-radius: 10px;
            /* Bordes redondeados */
            padding: 8px 12px;
            /* Espaciado interno */
            margin: 5px 0;
            /* Margen entre mensajes */
            max-width: 70%;
            /* Ancho máximo del mensaje */
            align-self: flex-end;
            /* Alineado a la derecha */
            margin-left: 30%;
            text-align: right;
        }

        .message-received {
            background-color: #2980b9;
            /* Azul más oscuro */
            color: #fff;
            /* Texto blanco */
            border-radius: 10px;
            /* Bordes redondeados */
            padding: 8px 12px;
            /* Espaciado interno */
            margin: 5px 0;
            /* Margen entre mensajes */
            max-width: 70%;
            /* Ancho máximo del mensaje */
            align-self: flex-start;
            /* Alineado a la izquierda */
        }
    </style>
<?php
} else if ($_SESSION['TEMA'] == 'R') {
?>
    <style>
        /* Estilos para ocultar el texto en dispositivos pequeños */
        @media (max-width: 991.98px) {
            .navbar-brand-text {
                display: none;
            }
        }

        body {
            background-color: #ff99b3;
            /* Rosa claro */
            color: #4d004d;
            /* Púrpura oscuro */

            /* Imagen que se diseñe de marca de agua */
            /* background-image: linear-gradient(rgba(255, 153, 179, 1), rgba(255, 153, 179, 0.9)), url('img/fastitwallpaper.png');
                        background-repeat: no-repeat;
                        background-attachment: fixed;
                        background-position: center;
                        background-size: contain; */
        }

        /* Estilo para la barra de desplazamiento en tema rosa */
        ::-webkit-scrollbar {
            width: 6px;
            background-color: #cc99b3;
            /* Rosa medio */
            border-radius: 3px;
        }

        /* Estilo para la barra de desplazamiento en tema rosa cuando se desplaza */
        ::-webkit-scrollbar-thumb {
            background-color: #ff1a8c;
            /* Rosa oscuro */
            border-radius: 3px;
        }

        /* Estilo para el botón de desplazamiento hacia arriba y hacia abajo */
        ::-webkit-scrollbar-button {
            display: none;
        }

        #main {
            /* background-image: linear-gradient(rgba(255, 153, 179, 1), rgba(255, 153, 179, 0.9)), url('img/fastitwallpaper.png');
                        background-repeat: no-repeat;
                        background-attachment: fixed;
                        background-position: center;
                        background-size: contain; */
            background-color: #ff99b3;
            /* Rosa claro */
            color: #4d004d;
            /* Púrpura oscuro */
        }

        .card {
            background-color: #cc99b3;
            /* Rosa medio */
            color: #4d004d;
            /* Púrpura oscuro */
            border: 1px solid #993366;
            /* Púrpura oscuro medio */
        }

        @media (max-width: 767px) {
            .card {
                margin-bottom: 5%;
            }
        }

        .card-header {
            background-color: #ff1a8c;
            /* Rosa oscuro */
            color: #4d004d;
            /* Púrpura oscuro */
        }

        .card-header img {
            width: 100%;
        }

        .card-body {
            background-color: #cc99b3;
            /* Rosa medio */
            color: #4d004d;
            /* Púrpura oscuro */
        }

        .card-body span {
            text-align: right;
            color: #ff66b2;
            /* Rosa más claro */
        }

        .card-body p {
            font-size: 8pt;
            color: #993366;
            /* Púrpura oscuro medio */
            text-align: justify;
        }

        .form-control {
            background-color: #ffccf2;
            /* Rosa claro */
            color: #4d004d;
            /* Púrpura oscuro */
        }

        .form-control:disabled {
            background-color: #ffccf2;
            /* Rosa claro */
            color: #4d004d;
            /* Púrpura oscuro */
        }

        #menuToggle {
            background-color: rgba(0, 0, 0, 0);
            border-color: rgba(0, 0, 0, 0);
            color: black;
            position: fixed;
            top: 1%;
            left: 2%;
            font-size: 24px;
            z-index: 1;
        }

        .message-sent {
            background-color: #f39c12;
            /* Naranja */
            color: #fff;
            /* Texto blanco */
            border-radius: 10px;
            /* Bordes redondeados */
            padding: 8px 12px;
            /* Espaciado interno */
            margin: 5px 0;
            /* Margen entre mensajes */
            max-width: 70%;
            /* Ancho máximo del mensaje */
            align-self: flex-end;
            /* Alineado a la derecha */
            margin-left: 30%;
            text-align: right;
        }

        .message-received {
            background-color: #e74c3c;
            /* Rojo */
            color: #fff;
            /* Texto blanco */
            border-radius: 10px;
            /* Bordes redondeados */
            padding: 8px 12px;
            /* Espaciado interno */
            margin: 5px 0;
            /* Margen entre mensajes */
            max-width: 70%;
            /* Ancho máximo del mensaje */
            align-self: flex-start;
            /* Alineado a la izquierda */
        }
    </style>
<?php
} else if ($_SESSION['TEMA'] == 'RM') {
?>
    <style>
        /* Estilos para ocultar el texto en dispositivos pequeños */
        @media (max-width: 991.98px) {
            .navbar-brand-text {
                display: none;
            }
        }

        body {
            background-color: #ffffff;
            /* Blanco */
            color: #0b1440;
            /* Azul oscuro */

            /* En su lugar va a ir la imagen que se diseñe de marca de agua */
            /* background-image: linear-gradient(rgba(255, 255, 255, 1), rgba(255, 255, 255, 0.9)), url('img/fastitwallpaper.png');
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-position: center;
                background-size: contain; */
        }

        /* Estilo para la barra de desplazamiento en tema blanco */
        ::-webkit-scrollbar {
            width: 6px;
            /* Ancho inicial de la barra de desplazamiento */
            background-color: #f0f0f0;
            /* Blanco */
            border-radius: 3px;
            /* Bordes redondeados */
        }

        /* Estilo para la barra de desplazamiento en tema blanco cuando se desplaza */
        ::-webkit-scrollbar-thumb {
            background-color: #0b1440;
            /* Azul oscuro */
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
            /* background-image: linear-gradient(rgba(255, 255, 255, 1), rgba(255, 255, 255, 0.9)), url('img/fastitwallpaper.png');
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-position: center;
                background-size: contain; */
            background-color: #ffffff;
            /* Blanco */
            color: #0b1440;
            /* Azul oscuro */
        }

        .card {
            background-color: #f0f0f0;
            /* Gris claro */
            color: #0b1440;
            /* Azul oscuro */
            border: 1px solid #d9d9d9;
            /* Gris claro medio */
        }

        @media (max-width: 767px) {
            .card {
                margin-bottom: 5%;
                /* Ajusta el valor del margen según tus necesidades */
            }
        }

        .card-header {
            background-color: #0b1440;
            /* Azul oscuro */
            color: #ffffff;
            /* Blanco */
        }

        .card-header img {
            width: 100%;
        }

        .card-body {
            background-color: #d9d9d9;
            /* Gris claro medio */
            color: #0b1440;
            /* Azul oscuro */
        }

        .card-body span {
            text-align: right;
            color: #004080;
            /* Azul medio */
        }

        .card-body p {
            font-size: 8pt;
            color: #666666;
            /* Gris oscuro medio */
            text-align: justify;
        }


        #menuToggle {
            background-color: rgba(0, 0, 0, 0);
            border-color: rgba(0, 0, 0, 0);
            color: black;
            position: fixed;
            top: 1%;
            left: 2%;
            font-size: 24px;
            z-index: 1;
        }

        .message-sent {
            background-color: #00529F;
            /* Azul oscuro */
            color: #fff;
            /* Texto blanco */
            border-radius: 10px;
            /* Bordes redondeados */
            padding: 8px 12px;
            /* Espaciado interno */
            margin: 5px 0;
            /* Margen entre mensajes */
            max-width: 70%;
            /* Ancho máximo del mensaje */
            align-self: flex-end;
            /* Alineado a la derecha */
            margin-left: 30%;
            text-align: right;
        }

        .message-received {
            background-color: #FEBE10;
            /* Amarillo */
            color: #000;
            /* Texto negro */
            border-radius: 10px;
            /* Bordes redondeados */
            padding: 8px 12px;
            /* Espaciado interno */
            margin: 5px 0;
            /* Margen entre mensajes */
            max-width: 70%;
            /* Ancho máximo del mensaje */
            align-self: flex-start;
            /* Alineado a la izquierda */
        }
    </style>
<?php
} else {
?>
    <style>
        body {
            background-repeat: no-repeat;
            background-size: cover;
            background-color: white;
            color: black;
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

        #menuToggle {
            background-color: rgba(0, 0, 0, 0);
            border-color: rgba(0, 0, 0, 0);
            color: darkblue;
            position: fixed;
            top: 1%;
            left: 2%;
            font-size: 24px;
            z-index: 1;
        }

        .message-sent {
            background-color: #DCF8C6;
            /* Verde claro */
            color: #000;
            /* Texto negro */
            border-radius: 10px;
            /* Bordes redondeados */
            padding: 8px 12px;
            /* Espaciado interno */
            margin: 5px 0;
            /* Margen entre mensajes */
            max-width: 70%;
            /* Ancho máximo del mensaje */
            align-self: flex-end;
            /* Alineado a la derecha */
            margin-left: 30%;
            text-align: right;
        }

        .message-received {
            background-color: #F3F3F3;
            /* Gris claro */
            color: #000;
            /* Texto negro */
            border-radius: 10px;
            /* Bordes redondeados */
            padding: 8px 12px;
            /* Espaciado interno */
            margin: 5px 0;
            /* Margen entre mensajes */
            max-width: 70%;
            /* Ancho máximo del mensaje */
            align-self: flex-start;
            /* Alineado a la izquierda */
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
        z-index: 0;
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

    @keyframes slideInFromRight {
        0% {
            transform: translateX(100%);
            opacity: 0;
        }

        100% {
            transform: translateX(0);
            opacity: 1;
        }
    }

    .slide-in {
        animation: slideInFromRight 0.5s ease-out;
    }

    @keyframes slideInFromLeft {
        0% {
            transform: translateX(-100%);
            opacity: 0;
        }

        100% {
            transform: translateX(0);
            opacity: 1;
        }
    }

    .slide-in-back {
        animation: slideInFromLeft 0.5s ease-out;
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

    .card .zoom-on-hover:hover {
        /* Escala del 105% al pasar el cursor por encima */
        transform: scale(1.05);
        /* Transiciones suaves para una animación más fluida */
        transition: transform 0.3s ease;
    }

    .zoom-on-hover:hover {
        transform: scale(1.05);
        /* Transiciones suaves para una animación más fluida */
        transition: transform 0.3s ease;
        z-index: 3;
        cursor: pointer;
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

    #dropzone {
        background: repeating-linear-gradient(135deg, rgba(0, 0, 0, 0) 20px, rgba(0, 0, 0, 0) 40px, rgba(20, 43, 126, 0.12) 40px, rgba(20, 43, 126, 0.12) 60px);
        position: relative;
        border: 10px dotted rgba(0, 100, 0, 0.9);
        ;
        border-radius: 20px;
        color: black;
        height: 250px;
        margin: 30px;
        text-align: center;
        vertical-align: center;
        width: 95%;
        font-size: 20px;
        font-family: Arial, Helvetica, sans-serif;
    }

    #dropzone.hover {
        border: 10px solid #FE5;
        color: #FE5;
        background-color: rgba(255, 255, 255, 1);
    }

    #dropzone.dropped {
        background-color: rgb(255, 255, 255);
        border: 10px solid blue;
    }

    #dropzone div {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
    }

    #dropzone img {
        border-radius: 10px;
        vertical-align: middle;
        max-width: 95%;
        max-height: 95%;
    }

    #dropzone [type="file"] {
        cursor: pointer;
        position: absolute;
        opacity: 0;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
    }

    .encabezado {
        margin-top: 0px;
        background-color: rgba(150, 150, 220, 0.2);
        border-radius: 70px;
        border: 2px solid black;
    
        z-index: 1;
        /* Para que esté por encima del resto del contenido */

        position: sticky;
        top: 0;
        padding: 5px;
    }

    .chat {
        height: 75vh;
        /* Altura del chat */
        overflow-y: auto;
        /* Permitir desplazamiento vertical */
        padding: 10px;
    }

    .mensaje {
        position: sticky;
        bottom: 0;
        background-color: rgba(0, 100, 0, 0.2);
        /* Color de fondo */
        padding: 10px;
    }

    .mensaje input{
        background-color: rgba(0, 100, 0, 0.2);
    }
    .chat p{
        font-size: 8pt;
    }
</style>