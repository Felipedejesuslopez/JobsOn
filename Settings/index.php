<style>
    ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    li {
        width: 50%;
        font-size: 16px;
        padding: 8px;
        margin: 4px 0;
        background-color: rgba(175, 186, 200, 0.7);
        /* Colorcito fresón */
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }
</style>

<center>
    <h1><img src="img/Settings/tsettings.png" style="width:5%;"> Ajustes</h1>
</center>
<br>
<div class="row">
    <div class="col-sm-6">
        <div class="row zoom-on-hover" style="font-size: 14pt;">
            <div class="col-2">
                <img src="img/Settings/ajustes.png" style="width:75%;">
            </div>
            <div class="col-10">
                Ajustes Generales
            </div>
        </div>
        <br>
        <div class="row zoom-on-hover" style="font-size: 14pt;">
            <div class="col-2">
                <img src="img/Settings/personalizacion.png" style="width:75%;">
            </div>
            <div class="col-10">
                Personalización
            </div>
        </div>
        <br>
        <div class="row zoom-on-hover" style="font-size: 14pt;">
            <div class="col-2">
                <img src="img/Settings/idioma.png" style="width:75%;">
            </div>
            <div class="col-10">Idioma</div>
        </div>
        <br>
        <div class="row zoom-on-hover" style="font-size: 14pt;">
            <div class="col-2">
                <img src="img/Settings/ofertas.png" style="width:75%;">
            </div>
            <div class="col-10">Ofertas</div>
        </div>
        <br>
    </div>
    <div class="col-sm-6">
        <div class="row zoom-on-hover" style="font-size: 14pt;">
            <div class="col-2">
                <img src="img/Settings/notificaciones.png" style="width:75%;">
            </div>
            <div class="col-10">Notificación</div>
        </div>
        <br>
        <div class="row zoom-on-hover" style="font-size: 14pt;">
            <div class="col-2">
                <img src="img/Settings/modooscuro.png" style="width:75%;">
            </div>
            <div class="col-10">Modo Oscuro</div>
        </div>
        <br>
        <div class="row zoom-on-hover" style="font-size: 14pt;">
            <div class="col-2">
                <img src="img/Settings/preferencias.png" style="width:75%;">
            </div>
            <div class="col-10">Preferencias</div>
        </div>
        <br>
        <div class="row zoom-on-hover" style="font-size: 14pt;">
            <div class="col-2">
                <img src="img/Settings/exclusiones.png" style="width:75%;">
            </div>
            <div class="col-10">Exclusiones</div>
        </div>
        <br>
        <div class="row zoom-on-hover" style="font-size: 14pt;">
            <div class="col-2">
                <img src="img/Settings/region.png" style="width:75%;">
            </div>
            <div class="col-10">Región</div>
        </div>
        <br>
        <div class="row zoom-on-hover" style="font-size: 14pt;" id="tema" onclick="toggleDropdown()">
            <div class="col-2">
                <img src="img/Settings/tema.png" style="width:75%;">
            </div>
            <div class="col-8">Tema</div>
            <div class="col-1"><i class="fas fa-caret-down"></i></div>
        </div>
        <div id="dropdown" class="dropdown" style="display: none;">
            <!-- Aquí puedes agregar tus opciones de menú -->
            <ul>
                <li onclick="tema('L')" class="zoom-on-hover">Light</li>
                <li onclick="tema('D')" class="zoom-on-hover">Pure Black</li>
                <li onclick="tema('G')" class="zoom-on-hover">Dark Gray</li>
                <li onclick="tema('N')" class="zoom-on-hover">Neón</li>
                <li onclick="tema('GL')" class="zoom-on-hover">Gray</li>
                <li onclick="tema('A')" class="zoom-on-hover">Blue</li>
                <li onclick="tema('R')" class="zoom-on-hover">Rose</li>
                <li onclick="tema('RM')" class="zoom-on-hover">Elegance</li>
            </ul>
        </div>
    </div>
</div>

<script>
    function toggleDropdown() {
        var dropdown = document.getElementById("dropdown");
        dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
    }

    function tema(theme) {
        $.ajax({
            url: 'php/tema.php',
            method: 'post',
            data: {
                'theme': theme
            }
        }).done(function(mag) {
            location.reload();
        }).fail(function(e) {
            $("#aviso").html(e);
            $("#modalavisos").modal("show");
        });
    }
</script>