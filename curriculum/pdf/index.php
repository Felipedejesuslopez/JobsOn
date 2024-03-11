<?php
session_start();
include '../../clases/class.conexion.php';
include '../../clases/class.usuariopostulante.php';
include '../../clases/class.curriculum.php';
//ini_set('display_errors', 1);
//error_reporting(E_ALL);

if (isset($_GET['id'])) {
  $us = new usuariopostulante($_GET['id'], null, null, null, null, null, null, null, null, null, null, null, null, null, null);
} else {
  $us = new usuariopostulante($SESSION['ID'], null, null, null, null, null, null, null, null, null, null, null, null, null, null);
}

$usuario = $us->read()->fetch_array();
if (isset($_GET['id'])) {
  $cur = new curriculum('', $_GET['id'], '', '', '', '', '', '', '', '', '', '', '');
} else {

  $cur = new curriculum('', $_SESSION['ID'], '', '', '', '', '', '', '', '', '', '', '');
}
$curriculum = $cur->read()->fetch_array();

require_once '../../vendor/autoload.php'; // Asegúrate de tener mpdf instalado y la ruta correcta

// Crear el documento PDF
$mpdf = new \Mpdf\Mpdf();

// Estilo para el contenido
$styleContent = 'style="font-family: calibri; font-size: 12pt; text-align: left;"';

// Contenido del CV
$content = '
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<style>

    .todo{
        border:2px solid black;
        padding:2%;
        border-radius:4px;
    }

    .columna {
      float: left;
      box-sizing: border-box;
      text-align:justify;
    }

    .columna1 {
      width: 21%;
      background-color: #add8e6;
      padding:2%;
      text-align:justify;
    }

    .columna2,
    .columna3 {
      width: 33.5%;
      padding:2%;
      text-align:justify;
    }

    .clearfix::after {
      content: "";
      display: table;
      clear: both;
    }

    .columna-texto p{
        font-family: "Playfair Display", serif;
    }

    .columna-texto img{
        width:5px;
    }

    .nueva-columna {
        float: left;
        box-sizing: border-box;
        
      }
  
      .columna-img {
        width: 35%;
        text-align:center;
      }
  
      .columna-texto {
        width: 65%;
        text-align:center;
      }
  
      /* Clearfix para evitar problemas de contorno con las columnas flotantes */
      .clearfix::after {
        content: "";
        display: table;
        clear: both;
      }

      img{
        width:75%;
      }

      .nombre{
        font-size:40pt;
        font-family:Georgia, Cambria, Times, "Times New Roman";
      }
      .encabezados{
        font-family:"Georgia", "Times New Roman", serif;
      }
      p{
        font-size:10pt;
      }
      .vinetas{}
  </style>
<div class="todo">
    <div class="nueva-columna columna-img">
        <!-- Div para la imagen -->
        <img src="../../img/profile/' . $usuario['ID'] . '.png" alt="Tu Imagen">
    </div>

    <div class="nueva-columna columna-texto">
        <!-- Div para el texto -->
        <h1>' . $usuario['NOMBRE'] . ' ' . $usuario['APELLIDOS'] . '</h1>
        <p>
        <img src="telefono.png" style="width:12px;"> ' . $curriculum['TELEFONO'] . '&nbsp;&nbsp;
        <img src="email.png" style="width:12px;"> ' . $curriculum['CORREO'] . '&nbsp;&nbsp;
        <img src="calendar.png" style="width:12px;"> ' . $usuario['NACIMIENTO'] . '
        </p>
    </div>

    <div class="columna columna1">
        <h5 class="encabezado">Descripćión</h5>
        <p>' . $curriculum['DESCRIPCION'] . '</p>
        <h5 class="encabezado">Aptitudes</h5>
        <p>' . $curriculum['APTITUDES'] . '</p>
    </div>

    <div class="columna columna2">
        <h5 class="encabezado">Formacion:</h5>
        <p>' . $curriculum['ESTUDIOS'] . '</p>
        
        <h5 class="encabezado">Idiomas:</h5>
        <p>' . $curriculum['IDIOMAS'] . '</p>

        <h5 class="encabezado">Referencias:</h5>
        <p>' . $curriculum['REFERENCIAS'] . '</p>
    </div>

    <div class="columna columna3">
        <h5 class="encabezado">Experiencia</h5>
        <p>' . $curriculum['EXPERIENCIA'] . '</p>
        
        <h5 class="encabezado">Certificaciones:</h5>
        <p>' . $curriculum['CERTIFICACIONES'] . '</p>

        <h5 class="encabezado">Estado Civil:</h5>
        <p>' . $curriculum['ESTADOCIVIL'] . '</p>

        <h5 class="encabezado">Trabajo Previo:</h5>
        <p>' . $curriculum['TRABAJOPREVIO'] . '</p>

    </div>

    <div class="clearfix"></div>
</div>
';


$mpdf->SetMargins(5, 5, 10);
$mpdf->WriteHTML($content);

// Salida del PDF
$mpdf->Output('Curriculum+.pdf', 'I');
