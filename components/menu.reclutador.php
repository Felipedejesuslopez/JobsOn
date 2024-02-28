<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse" id="sidebarMenu">
    <div class="position-sticky">

        <div class="container menu" style="margin-top:-15%;">
            <div class="row">

                <div class="col-8">
                    <img src="img/JobsOn.png" id="logo">
                    <h7><br>
                        Hola, <b>
                            <?php echo $user['NAME'] ?>
                        </b>
                    </h7>
                </div>

                <div class="col-4" id="mad">
                    <br>
                    <img src="imagenes_reclutador/<?php echo $user['FOTO']; ?>" alt="img/profile.png" id="profile">
                </div>
            </div>

            <div class="container custom-search">
                <div class="input-group">
                    <input type="text" class="form-control search-input" placeholder="Buscar" aria-label="Buscar" aria-describedby="search-addon" />

                    <button type="button" class="btn btn-primary search-btn">
                        <i class="fas fa-search search-icon"></i>
                    </button>
                </div>
            </div>

            <div class="row" class>
                <div class="col-6">
                    <a class="botonmenu" href="entrevista">
                        <img src="img/Menu/Reclutador/reentrevistas.png" class="botonmenu">
                    </a>
                </div>
                <div class="col-6">
                    <a class="botonmenu" href="mensajes/reclutador/">
                        <img class="botonmenu" src="img/Menu/Reclutador/remensajes.png" alt="">
                    </a>
                </div>
                <br><br><br>
                <div class="col-6">
                    <a class="botonmenu" href="curriculum/">
                        <img class="botonmenu" src="img/Menu/Reclutador/repostulantes.png" alt="">
                    </a>
                </div>
                <div class="col-6">
                    <a class="botonmenu" href="Postulado/Reclutador/postulaciones_tomadas.php">
                        <img class="botonmenu" src="img/Menu/Reclutador/rereclutados.png" alt="">
                    </a>
                </div>
                <br><br><br>
                <div class="col-6">
                    <a class="botonmenu" href="Postulado/Reclutador/seleccionados.php">
                        <img class="botonmenu" src="img/Menu/Reclutador/6.jpg" alt="">
                    </a>
                </div>
                <div class="col-6">
                    <a class="botonmenu" href="Postulado/Reclutador/postulaciones_disponibles.php">
                        <img class="botonmenu" src="img/Menu/Reclutador/revacantes.png" alt="">
                    </a>
                </div>

                <br><br><br>
                <div class="od">
                    <center>
                        <a href="Settings/" class="botonopt">
                            <img src="img/Menu/Reclutador/Settings.png" class="botonopt">
                        </a>
                        <br><br>
                        <a href="php/logout.php" class="botonopt">
                            <img src="img/Menu/Reclutador/Logout.png" class="botonopt">
                        </a>
                    </center>
                </div>
            </div>
        </div>
</nav>