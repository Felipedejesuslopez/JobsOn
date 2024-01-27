<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse" id="sidebarMenu">
    <div class="position-sticky">

        <div class="container menu" style="margin-top:-15%;">
            <div class="row">

                <div class="col-8">
                    <img src="img/JobsOn.png" id="logo">
                    <h7><br>
                        Hola, <b>
                            <?php echo $user['NOMBRE'] ?>
                        </b>
                    </h7>
                </div>

                <div class="col-4" id="mad">
                    <br>
                    <img src="img/profile/<?php echo $_SESSION['ID']; ?>.png" id="profile" style="border-radius:50%;">
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

            <div class="row">
                <div class="col-6">
                    <a class="botonmenu" href="vacantes/">
                        <img src="img/Menu/User/1.png" class="botonmenu">
                    </a>
                </div>
                <div class="col-6">
                    <a class="botonmenu" href="Mensajes/">
                        <img class="botonmenu" src="img/Menu/User/2.png" alt="">
                    </a>
                </div>
                <br><br><br>
                <div class="col-6">
                    <a class="botonmenu" href="curriculum/">
                        <img class="botonmenu" src="img/Menu/User/3.png" alt="">
                    </a>
                </div>
                <div class="col-6">
                    <a class="botonmenu" href="Experiencia/">
                        <img class="botonmenu" src="img/Menu/User/4.png" alt="">
                    </a>
                </div>
                <br><br><br>
                <div class="col-6">
                    <a class="botonmenu" href="Postulado/">
                        <img class="botonmenu" src="img/Menu/User/5.png" alt="">
                    </a>
                </div>
                <div class="col-6">
                    <a class="botonmenu" href="Postulantes/Informacion/">
                        <img class="botonmenu" src="img/Menu/User/6.png" alt="">
                    </a>
                </div>
            </div>
            <br><br><br>
            <div class="od">
                <center>
                    <a href="Settings/" class="botonopt">
                        <img src="img/Menu/User/Settings.png" class="botonopt">
                    </a>
                    <br><br>
                    <a href="php/logout.php" class="botonopt">
                        <img src="img/Menu/User/Logout.png" class="botonopt">
                    </a>
                </center>
            </div>
        </div>
    </div>
</nav>