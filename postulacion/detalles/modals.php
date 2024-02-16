<div class="modal fade bd-example-modal-lg" id="agendar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="php/agentrevista.php">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agendar Entrevista</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">
                        Al citar se generará una liga para la entrevista en línea para la fecha que indique
                    </div>
                    <input type="text" style="display:none;" name="postulacion" value="<?php echo $postulacion['ID']; ?>">
                    <div class="form-group">
                        <label for="postulante">
                            Nombre del Postulante
                        </label>
                        <input type="text" id="postulante" class="form-control" value="<?php echo $postulante['NOMBRE'] . ' ' . $postulante['APELLIDOS']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="Vacante">
                            Titulo de la vacante
                        </label>
                        <input type="text" id="vacante" class="form-control" value="<?php echo $vacante['TITULO']; ?>" disabled>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="fecha">Fecha de la Entrevista</label>
                                <input type="date" name="date" id="fecha" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="hora">Hora:</label>
                                <input type="time" name="hour" id="hora" class="form-control">
                            </div>
                        </div>
                    </div>
                    <?php if ($_SESSION['tipo'] != 6) {
                    ?>
                        <div class="form-group">
                            <input type="checkbox" id="recluta">
                            <label for="checkbox1"><span>Incluir al Reclutador</span></label>
                        </div>
                    <?php
                    } ?>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Confirmar</button>
                </div>
            </form>
        </div>
    </div>
</div>