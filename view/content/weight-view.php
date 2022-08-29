<?php

// Conexión a la db y funciones
include "./model/mainModel.php";

$yo = new mainModel();

// Se valida que las sessiones esten iniciadas
include_once './controller/controllerOperaction.php';

$lo_out = new controllerOperation();
$lo_out->serrar_sesion();

// Validación para mostrar la data si ya guardo en sesion
if (isset($_SESSION['wight_peso'][$_SESSION['id']]['wight_peso'])) {
    $wight_peso = $_SESSION['wight_peso'][$_SESSION['id']]['wight_peso'];
}
if (isset($_SESSION['wight_peso'][$_SESSION['id']]['wight_peso_op'])) {
    $wight_peso_op = $_SESSION['wight_peso'][$_SESSION['id']]['wight_peso_op'];
}

// Condición para procesar la data del formulario
if (isset($_POST['weight'])) {

    $sessionSmg = "";

    $wight_peso = $yo->limpiar_cadena($_POST['wight_peso']);
    $wight_peso_op = $yo->limpiar_cadena($_POST['wight_peso_op']);

    if ($wight_peso == "") {

        $sessionSmg = "El peso es obligatorio !";
    } else {

        $_SESSION['wight_peso'][$_SESSION['id']] = [
            "wight_peso" => $wight_peso,
            "wight_peso_op" => $wight_peso_op
        ]; ?>

        <script>
            window.location.replace("<?php echo SERVERURL . 'food-style/' ?>");
        </script>
<?php
    }
} ?>

<div class="container date" ondragstart="return false" onselectstart="return false" oncontextmenu="return false">
    <div class="row">
        <div class="col-3">
            <div class="fondo-image-div margin-50">

            </div>
        </div>
        <div class="col-9">
            <div>
                <form action="" method="post" class="forms-yo text-center">

                    <h2>Mi mascota <span class="color-test-h2">'<?php echo ucfirst($_SESSION['mi_pet'][$_SESSION['id']]['Name_Pet']); ?>'</span>, pesa</h2>
                    <?php
                    if (isset($sessionSmg)) {
                        if ($sessionSmg != '') {
                    ?>
                            <div class="alert alert-warning alert-dismissible fade show text-center alert-message " role="alert">
                                <?php echo $sessionSmg; ?>
                            </div>
                    <?php }
                    } ?>
                    <p class="text-20">Por favor seleccione el peso en <span style="color: #F07639;">'(kg)'</span> kilogramos mascota.</p>
                    <div class="row">

                        <div class="col-sm">

                            <label for="formFile" class="form-label">Peso Actual Aproximado</label>
                            <input class="form-text" type="number" name="wight_peso" value="<?php echo !empty($wight_peso) ? $wight_peso : '' ?>" placeholder="Kilos"> .Kg
                            <br>
                            <br>
                            <label for="formFile" class="form-label">El peso ideal de <?php echo $_SESSION['mi_pet'][$_SESSION['id']]['Name_Pet']; ?> es</label>
                            <input class="form-text" type="number" name="wight_peso_op" value="<?php echo !empty($wight_peso_op) ? $wight_peso_op : '' ?>" placeholder="Kilos"> .Kg (opcional)
                            <br>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-6 cont-button-g">
                            <div class="button-g text-center margin-50 regresar">
                                <a class="btn" href="<?php echo SERVERURL; ?>date/"> Atras <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></a>
                            </div>
                            <br><br>
                        </div>
                        <div class="col-6 cont-button-g">
                            <div class="button-g text-center margin-50">
                                <button class="btn withe-l" type="submit" name="weight" value="weight">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
</div>

<!-- Inicio del escript -->
<script>
    // Función para cerrar la ventana de alerta
    window.setTimeout(function() {
        $(".alert-message").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
</script>