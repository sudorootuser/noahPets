<?php
// Conexión a la db y funciones
include "./model/mainModel.php";

$yo = new mainModel();

// Se valida que las sessiones esten iniciadas
include_once './controller/controllerOperaction.php';

$lo_out = new controllerOperation();
$lo_out->serrar_sesion();

// Validación para mostrar la data si ya guardo en sesion
if (isset($_SESSION['condiction'][$_SESSION['id']]['Type_Cond'])) {
    $type_cond = $_SESSION['condiction'][$_SESSION['id']]['Type_Cond'];
} else {
    $type_cond = 'No aplica';
}

// Condición para procesar la data del formulario
if (isset($_POST['condiction'])) {

    $sessionSmg = "";

    $type_cond = $yo->limpiar_cadena($_POST['type']);

    if ($type_cond == "") {

        $sessionSmg = "Debe seleccionar el Genero de tu mascota!";
    } else {

        $_SESSION['condiction'][$_SESSION['id']] = [
            "Type_Cond" => $type_cond
        ]; ?>
        <script>
            window.location.replace("<?php echo SERVERURL . 'esterilized/' ?>");
        </script>
<?php
    }
} ?>

<div class="container condiction" ondragstart="return false" onselectstart="return false" oncontextmenu="return false">
    <div class="row">
        <div class="col-3">
            <div class="fondo-image-div margin-50">

            </div>
        </div>
        <div class="col-9">
            <div>
                <form action="" method="post" class="forms-condiction">
                    <h2><span class="color-test-h2">'<?php echo ucfirst($_SESSION['mi_pet'][$_SESSION['id']]['Name_Pet']); ?>'</span> es</h2>
                    <?php
                    if (isset($sessionSmg)) {
                        if ($sessionSmg != '') {
                    ?>
                            <div class="alert alert-warning alert-dismissible fade show text-center alert-message " role="alert">
                                <?php echo $sessionSmg; ?>
                            </div>
                    <?php }
                    }
                    ?>
                    <p class="text-20">Por favor seleccione el genero de la mascota</p>

                    <div class="row">
                        <div class="col">
                            <select class="form-select-condiction" name="type">
                                <option value="">Seleccione...</option>
                                <option value="Macho" <?php echo $Macho =  $type_cond == 'Macho' ? 'selected' : '' ?>>Macho</option>
                                <option value="Hembra" <?php echo $Hembra =  $type_cond == 'Hembra' ? 'selected' : '' ?>>Hembra</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 cont-button-g">
                            <div class="button-g text-center margin-80 regresar">
                                <a class="btn" href="<?php echo SERVERURL; ?>My-Pet/"> Atras <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></a>
                            </div>
                            <br><br>
                        </div>
                        <div class="col-6 cont-button-g">
                            <div class="button-g text-center margin-80">
                                <button class="btn withe-l" type="submit" name="condiction" value="condiction">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
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