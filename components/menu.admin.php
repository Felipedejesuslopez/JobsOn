<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse" id="sidebarMenu">
    <div class="position-sticky">

        <div class="container menu" style="margin-top:-15%;">
            <div class="row">

                <div class="col-8">
                    <img src="img/Menu/Admin/JobsOn.png" id="logo">
                    <h7><br>
                        Hola, <b>
                            <?php echo $user['NAME'] ?>
                        </b>
                    </h7>
                </div>

                <div class="col-4" id="mad">
                    <br>
                    <img src="img/profile.png" id="profile" alt="">
                </div>
            </div>

            <div class="container custom-search">
                <div class="input-group">
                    <input type="text" class="form-control search-input" placeholder="Buscar" aria-label="Buscar" aria-describedby="search-addon" />

                    <button type="button" class="btn btn-dark search-btn" style="background-color:black;">
                        <i class="fas fa-search search-icon"></i>
                    </button>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <a class="botonmenu" href="vacantes/">
                        <img src="img/Menu/Admin/Vacantes.png" class="botonmenu">
                    </a>
                </div>
                <div class="col-6">
                    <a class="botonmenu" href="Postulantes/">
                        <img class="botonmenu" src="img/Menu/Admin/Usuarios.png" alt="">
                    </a>
                </div><br><br>
                <div class="col-6">
                    <a class="botonmenu" href="Curriculum/">
                        <img class="botonmenu" src="img/Menu/Admin/Empresas.png" alt="">
                    </a>
                </div>
                <div class="col-6">
                    <a class="botonmenu" href="reclutador/">
                        <img class="botonmenu" src="img/Menu/Admin/Reclutadores.png" alt="">
                    </a>
                </div>
                <br><br>
                <div class="col-6">
                    <a class="botonmenu" href="Curriculum/">
                        <img class="botonmenu" src="img/Menu/Admin/Conductores.png" alt="">
                    </a>
                </div>
                <div class="col-6">
                    <a class="botonmenu" href="Curriculum/">
                        <img class="botonmenu" src="img/Menu/Admin/Laboratorios.png" alt="">
                    </a>
                </div>
                <br><br>
                <div class="col-3"></div>
                <div class="col-6">
                    <a class="botonmenu" href="Curriculum/">
                        <img class="botonmenu" src="img/Menu/Admin/Reuniones.png" alt="">
                    </a>
                </div>
            </div>
            <br>
            <div class="od">
                <center>
                    <a href="Settings/" class="botonopt">
                        <img src="img/Menu/Admin/Settings.png" class="botonopt">
                    </a>
                    <br><br>
                    <a href="php/logout.php" class="botonopt">
                        <img src="img/Menu/Admin/AppSettings.png" class="botonopt">
                    </a>
                    <br><br>
                    <a href="php/logout.php" class="botonopt">
                        <img src="img/Menu/Admin/Logout.png" class="botonopt">
                    </a>
                </center>
            </div>
        </div>
</nav>