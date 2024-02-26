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
                    <?php
                    session_start();

                    if(isset($_SESSION['ID'])) {

                        $id_conductor = $_SESSION['ID'];
                        $folder_path = "imagenes_conductor/$id_conductor/";
                        $files = scandir($folder_path);
                        $files = array_diff($files, array('.', '..'));

                        if (!empty($files)) {
                            
                            $first_file = reset($files);
                            $image_path = $folder_path . $first_file;

                            echo "<img src='$image_path' id='profile' alt=''>";

                        } else {

                            echo "<img src='img/profile.png' id='profile' alt=''>";
                        }
                    } else {

                        echo "<img src='img/profile.png' id='profile' alt=''>";
                    }
                    ?>
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
                        <a class="botonmenu" href="ParaTi/">
                            <img src="img/Menu/Conductor/conagenda.png" class="botonmenu">
                        </a>
                    </div>
                    <div class="col-6">
                        <a class="botonmenu" href="Mensajes/">
                            <img class="botonmenu" src="img/Menu/Conductor/conmensajes.png" alt="">
                        </a>
                    </div>
                    <br><br><br>
                    <div class="col-6">
                        <a class="botonmenu" href="Curriculum/">
                            <img class="botonmenu" src="img/Menu/Conductor/conpendientes.png" alt="">
                        </a>
                    </div>
                    <div class="col-6">
                        <a class="botonmenu" href="Curriculum/">
                            <img class="botonmenu" src="img/Menu/Conductor/conviaje.png" alt="">
                        </a>
                    </div>
                <br><br><br>
                <div class="col-6">
                        <a class="botonmenu" href="conductor/informacion/perfil_conductor.php">
                            <img class="botonmenu" src="img/Menu/Conductor/conviaje.png" alt="">
                        </a>
                    </div>
                    <br><br><br>
                    <div class="col-6">
                        <a class="botonmenu" href="conductor/registro/registro_vehiculo.php">
                            <img class="botonmenu" src="img/Menu/Conductor/conviaje.png" alt="">
                        </a>
                    </div>
                    <br><br><br>
                <div class="od">
                    <center>
                        <a href="Settings/" class="botonopt">
                            <img src="img/Menu/Conductor/Settings.png" class="botonopt">
                        </a>
                        <br><br>
                        <a href="php/logout.php" class="botonopt">
                            <img src="img/Menu/Conductor/Logout.png" class="botonopt">
                        </a>
                    </center>
                </div>
            </div>
        </div>
    </nav>