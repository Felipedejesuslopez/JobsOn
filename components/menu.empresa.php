<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse" id="sidebarMenu">
        <div class="position-sticky">

            <div class="container menu" style="margin-top:-15%;">
                <div class="row">
                 
                    <div class="col-8">
                        <img src="img/JobsOnGreen.png" id="logo">
                        <h7><br>
                            Hola, <b>
                                <?php echo $user['NOMBRE'] ?>
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
                      
                        <button type="button" class="btn btn-success search-btn" style="background-color:#00bd3f;">
                            <i class="fas fa-search search-icon"></i>
                        </button>
                    </div>
                </div>

                <div class="row" class>
                    <div class="col-6">
                        <a class="botonmenu" href="empresa/citas/">
                            <img src="img/Menu/Empresa/emcitas.png" class="botonmenu">
                        </a>
                    </div>
                    <div class="col-6">
                        <a class="botonmenu" href="empresa/seguimiento/">
                            <img class="botonmenu" src="img/Menu/Empresa/emseguimiento.png" alt="">
                        </a>
                    </div>
                    <br><br><br>
                    <div class="col-sm-3"></div>
                    <div class="col-6">
                        <a class="botonmenu" href="empresa/vacantes//">
                            <img class="botonmenu" src="img/Menu/Empresa/emvacantes.png" alt="">
                        </a>
                    </div>
                <br><br><br>
                <div class="od">
                    <center>
                        <a href="Settings/" class="botonopt">
                            <img src="img/Menu/Empresa/Settings.png" class="botonopt">
                        </a>
                        <br><br>
                        <a href="php/logout.php" class="botonopt">
                            <img src="img/Menu/Empresa/Logout.png" class="botonopt">
                        </a>
                    </center>
                </div>
            </div>
        </div>
    </nav>