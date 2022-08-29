<?php
// Conexión a la db y funciones
include "./model/mainModel.php";

$yo = new mainModel();

// Se valida que las sessiones esten iniciadas
include_once './controller/controllerOperaction.php';

$lo_out = new controllerOperation();
$lo_out->serrar_sesion();

// Validación para mostrar la data si ya guardo en sesion
if (isset($_SESSION['esterilizad'][$_SESSION['id']]['esterilizad'])) {
    $esterilizad = $_SESSION['esterilizad'][$_SESSION['id']]['esterilizad'];
} else {
    $esterilizad = 'No aplica';
}

// Condición para procesar la data del formulario
if (isset($_POST['estery'])) {
    $sessionSmg = "";

    $esterilizad = $yo->limpiar_cadena($_POST['esterilizad']);

    if ($esterilizad == "") {

        $sessionSmg = "Todos los campos son obligatorios";
    } else {

        $_SESSION['esterilizad'][$_SESSION['id']] = [
            "esterilizad" => $esterilizad
        ];

        $typo = $_SESSION['mi_pet'][$_SESSION['id']]['Pet_Type'];
        if ($typo == "Gato") {

            $_SESSION['type_raze'][$_SESSION['id']] = [
                "type_raze" => 0
            ]; ?>
            <script>
                window.location.replace("<?php echo SERVERURL . 'date/' ?>");
            </script>
        <?php
        } else { ?>
            <script>
                window.location.replace("<?php echo SERVERURL . 'raze/' ?>");
            </script>
<?php
        }
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
                    <?php if ($_SESSION['condiction'][$_SESSION['id']]['Type_Cond'] == 'Macho') { ?>
                        <h2><span class="color-test-h2">'<?php echo ucfirst($_SESSION['mi_pet'][$_SESSION['id']]['Name_Pet']); ?>'</span> esta castrado</h2>
                    <?php } else { ?>
                        <h2><span class="color-test-h2">'<?php echo ucfirst($_SESSION['mi_pet'][$_SESSION['id']]['Name_Pet']); ?>'</span> esta esterilizada</h2>
                        <?php }

                    if (isset($sessionSmg)) {
                        if ($sessionSmg != '') {
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show text-center alert-message " role="alert">
                                <?php echo $sessionSmg; ?>
                            </div>
                    <?php
                        }
                    } ?>
                    <p class="text-20">Por favor seleccione una opcion para su mascota.</p>
                    <div class="row">

                        <div class="col">
                            <select class="form-select-condiction" name="esterilizad">
                                <option value="">Seleccione...</option>
                                <option value="Sí" <?php echo $Sí = $esterilizad  == 'Sí' ? 'selected' : '' ?>>Sí</option>
                                <option value="No" <?php echo $No = $esterilizad  == 'No' ? 'selected' : '' ?>>No</option>
                            </select>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-6 cont-button-g">
                            <div class="button-g text-center margin-80 regresar">
                                <a class="btn" href="<?php echo SERVERURL; ?>condiction/"> Atras <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></a>
                            </div>
                            <br><br>
                        </div>
                        <div class="col-6 cont-button-g">
                            <div class="button-g text-center margin-80">
                                <button class="btn withe-l" type="submit" name="estery" value="estery">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
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