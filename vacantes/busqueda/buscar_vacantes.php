<?php
include '../../clases/class.conexion.php';
include '../../clases/class.ofertalaboral.php';
include '../../clases/class.empresa.php';

if (isset($_POST['searchTerm'])) {
    $searchTerm = $_POST['searchTerm'];
    $bd = new Conexion();
    $sql = "SELECT * FROM ofertas_laborales WHERE TITULO LIKE ?";
    $statement = $bd->prepare($sql);
    $searchTerm = "%{$searchTerm}%";
    $statement->bind_param('s', $searchTerm);
    $statement->execute();
    $result = $statement->get_result();

    echo '<div class="container">';
    echo '<h2 class="text-center">Resultados de búsqueda</h2>';
    echo '<br>';
    echo '<div class="row">';

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $img = '';
            $imgPath = '../imagenes_vacantes/' . $row['ID'] . '/';
            if (is_dir($imgPath)) {
                $archivos = array_diff(scandir($imgPath), array('..', '.'));
                if (!empty($archivos)) {
                    $img = end($archivos);
                }
            }

            ?>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="<?php echo $imgPath . $img; ?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['TITULO']; ?></h5>
                        <p class="card-text"><?php echo substr($row['DESCRIPCION'], 0, 50); ?>...</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">$<?php echo $row['SALARIO']; ?></small>
                            <small class="text-muted"><?php echo $row['EMPRESA']; ?></small>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        echo '<div class="col-md-12 text-center"><h3>No se encontraron vacantes.</h3></div>';
    }

    echo '</div>'; 
    echo '</div>'; 
    $statement->close();
    $bd->close();
}
?>
