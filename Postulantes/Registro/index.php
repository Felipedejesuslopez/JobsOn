<?php include '../../modals/modalavisos.php'; ?>
<link rel="stylesheet" href="../css/registro.css">
<script src="../Postulantes/Registro/main.js"></script>
<form action="../php/registrousuario.php" method="post" enctype="multipart/form-data">
    <div class="container" style="vertical-align:center;" id="pimero">
        <div class="card" style="background-color:rgba(255,255,255,0.7); z-index:0;">
            <div class="card-header">
                <div class="container">
                    <center>
                        <div class="col-sm-3"></div>
                        <div class="col-sm-6" style="background-image: url('../img/Alertas/register.png'); background-repeat:no-repeat; background-size:100% 100%;">
                            <div class="row">
                                <div class="col-4"></div>
                                <div class="col-8">
                                    <div class="testo">
                                        <h5>
                                            Hola, mi nombre es Jobbie, tu asistente virtual
                                        </h5>
                                        <p id="animatedText">
                                            Empecemos por ingresar tu nombre completo y tu fecha de nacimiento
                                        </p>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </center>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        Nombre(s):
                        <input type="text" name="nombre" id="nombre" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        Apellido Paterno:
                        <input type="text" name="paterno" id="paterno" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        Apellido Materno:
                        <input type="text" name="materno" id="materno" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        Fecha de nacimiento
                        <input type="date" name="nacimiento" id="nacimiento" class="form-control">
                    </div>
                </div>
                <br>
            </div>
        </div>
        <button type="button" onclick="segundo()" id="fi" class="btn btn-success" style="z-index:2; font-size:15pt; margin-left:95%; margin-top:0%; text-align:right; border-radius:50%;">
            <i class="fa fa-arrow-right" aria-hidden="true"></i>
        </button>
    </div>
    <div class="container" id="segundo" style="display: none;">
        <div class="card" style="background-color:rgba(255,255,255,0.7); z-index:1;">
            <div class="card-header">
                <div class="container">
                    <center>
                        <div class="col-sm-3"></div>
                        <div class="col-sm-6" style="background-image: url('../img/Alertas/register.png'); background-repeat:no-repeat; background-size:100% 100%">
                            <div class="row">
                                <div class="col-4"></div>
                                <div class="col-8">
                                    <div class="testo">
                                        <center>¡Muy bien!</center><br>
                                        <p>Ahora ingresa tu correo, el que será tu usuario y tu contraseña,<br> ¡recuérdalos bienñ ya que con estos datos te logearás de ahora en adelante!</p>

                                        <br><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </center>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        Correo electrónico
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        Usuario:
                        <input type="text" name="user" id="username" class="form-control">
                        <div id="ures"></div>
                    </div>
                    <div class="col-sm-6">
                        Contraseña:
                        <input type="password" name="psw" id="password" class="form-control">
                        <div id="locon"></div>
                    </div>
                    <div class="col-sm-6">
                        Confirma la contraseña:
                        <input type="password" name="confirma" id="confirma" class="form-control">
                        <div id="conco"></div>
                    </div>
                </div>
                <br>
            </div>
        </div>
        <button type="button" id="terc" onclick="tercero()" class="btn btn-success" style="z-index:2; font-size:15pt; margin-left:95%; margin-top:0%; text-align:right; border-radius:50%;">
            <i class="fa fa-arrow-right" aria-hidden="true"></i>
        </button>
    </div>
    <div class="container" id="tecero" style="display: none;">
        <div class="card" style="background-color:rgba(255,255,255,0.7); z-index:1;">
            <div class="card-header">
                <div class="container">
                    <center>
                        <div class="col-sm-3"></div>
                        <div class="col-sm-6" style="background-image: url('../img/Alertas/register.png'); background-repeat:no-repeat; background-size:100% 100%">
                            <div class="row">
                                <div class="col-4"></div>
                                <div class="col-8">
                                    <div class="testo">

                                        <center>¡Perfecto!</center><br>
                                        <p>Ya casi terminamos, ingresa tu número de teléfono a donde podamos contactarte y apoyanos con una foto para reconocerte <br></p>
                                        <br><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </center>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        Teléfono:
                        <input type="number" name="telefono" id="phone" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        Foto:
                        <div id="dropzone2" class="dropzone">
                            <div style="height: 100%;"><br>
                                <img src="img/icon2.png" alt="MDN">
                                <center>
                                    <p id="res2">Arrastra aquí tu Foto</p>
                                </center>
                            </div>
                            <input type="file" id="file2" name="foto">
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
        <button type="submit" class="btn btn-primary" style="z-index:2; font-size:20pt; margin-left:95%; margin-top:0%; text-align:right; border-radius:50%;">
            <i class="fa fa-arrow-right" aria-hidden="true"></i>
        </button>
    </div>
</form>