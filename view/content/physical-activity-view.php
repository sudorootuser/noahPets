<?php
// Conexión a la db y funciones
include "./model/mainModel.php";
$yo = new mainModel();

// Se valida que las sessiones esten iniciadas
include_once './controller/controllerOperaction.php';

$lo_out = new controllerOperation();
$lo_out->serrar_sesion();
$lo_out->pesoMetabolico();

// Validación para mostrar la data si ya guardo en sesion
if (isset($_SESSION['physical_activity'][$_SESSION['id']]['physical_activity'])) {
    $physical_activity = $_SESSION['physical_activity'][$_SESSION['id']]['physical_activity'];
} else {
    $physical_activity = 'No aplica';
}

// Condición para procesar la data del formulario
if (isset($_POST['activity'])) {

    $sessionSmg = "";

    if (!isset($_POST['physical-activity'])) {

        $sessionSmg = "Debe seleccionar al menos un nivel de actividad física";
    } else {

        $physical_activity = $yo->limpiar_cadena($_POST['physical-activity']);

        $_SESSION['physical_activity'][$_SESSION['id']] = [
            "physical_activity" => $physical_activity
        ]; ?>

        <script>
            window.location.replace("<?php echo SERVERURL . 'snackConsumption/' ?>");
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

                    <h2>El nivel de actividad física de <span class="color-test-h2">'<?php echo $_SESSION['mi_pet'][$_SESSION['id']]['Name_Pet']; ?>'</span> es</h2>
                    <?php
                    if (isset($sessionSmg)) {
                        if ($sessionSmg != '') {
                    ?>
                            <div class="alert alert-warning alert-dismissible fade show text-center alert-message " role="alert">
                                <?php echo $sessionSmg; ?>
                            </div>
                    <?php }
                    } ?>
                    <p class="text-20">Por favor seleccione el nivelde actividad fisica de su mascota.</p>
                    <div class="row text-center">
                        <div class="col">
                            <div class="row">
                                <div id="poc_At_og" class="col-12" <?php echo $physical_activity == 'Poco Activo' ? 'style="display:block;"' : 'style="display:none;"' ?>>
                                    <img class="img-contextura" src="../view/assets/img/poco_activo_og.png" alt="" srcset="">
                                </div>
                                <div id="poc_At_wt" class="col-12" <?php echo $physical_activity == 'Poco Activo' ? 'style="display:none;"' : 'style="display:block;"' ?>>
                                    <img class="img-contextura" src="../view/assets/img/poco_activo_wt.png" alt="" srcset="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <div id="delgado_wt" style="display:block;margin: 12px">
                                        <span class="text-contextura-label">Poco Activo</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="physical-activity" id="physical-activity1" value="Poco Activo" <?php echo $physical_activity == 'Poco Activo' ? 'checked' : '' ?>>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div id="activa_og" class="col-12" <?php echo $physical_activity == 'Activa' ? 'style="display:block;"' : 'style="display:none;"' ?>>
                                    <img class="img-contextura" src="../view/assets/img/activa_og.png" alt="" srcset="">
                                </div>
                                <div id="activa_wt" class="col-12" <?php echo $physical_activity == 'Activa' ? 'style="display:none;"' : 'style="display:block;"' ?>>
                                    <img class="img-contextura" src="../view/assets/img/activa_wt.png" alt="" srcset="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <div id="delgado_wt" style="display:block;margin: 12px">
                                        <span class="text-contextura-label">Activo</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="physical-activity" id="physical-activity1" value="Activa" <?php echo $physical_activity == 'Activa' ? 'checked' : '' ?>>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div id="m_activa_wt" class="col-12" <?php echo $physical_activity == 'Muy activo' ? 'style="display:none;"' : 'style="display:block;"' ?>>
                                    <img class="img-contextura" src="../view/assets/img/muy_activa_wt.png" alt="" srcset="">
                                </div>
                                <div id="m_activa_og" class="col-12" <?php echo $physical_activity == 'Muy activo' ? 'style="display:block;"' : 'style="display:none;"' ?>>
                                    <img class="img-contextura" src="../view/assets/img/muy_activa_og.png" alt="" srcset="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <div id="delgado_wt" style="display:block;margin: 12px">
                                        <span class="text-contextura-label">Muy activo</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="physical-activity" id="physical-activity1" value="Muy Activa" <?php echo $physical_activity == 'Muy Activa' ? 'checked' : '' ?>>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6 cont-button-g">
                            <div class="button-g text-center margin-50 regresar">
                                <a class="btn" href="<?php echo SERVERURL; ?>physical-build/"> Atras <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></a>
                            </div>
                            <br>
                        </div>
                        <div class="col-6 cont-button-g">
                            <div class="button-g text-center margin-50">
                                <button class="btn withe-l" type="submit" name="activity" value="activity">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
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
    // Función para mostrar las diferentes selecciones
    $(document).ready(function() {
        $(".form-check-input").click(function(evento) {

            var valor = $(this).val();

            if (valor == 'Poco Activo') {

                $("#poc_At_og").css("display", "block");
                $("#poc_At_wt").css("display", "none");

                $("#activa_og").css("display", "none");
                $("#activa_wt").css("display", "block");

                $("#m_activa_og").css("display", "none");
                $("#m_activa_wt").css("display", "block");

            } else if (valor == 'Activa') {

                $("#activa_og").css("display", "block");
                $("#activa_wt").css("display", "none");

                $("#poc_At_og").css("display", "none");
                $("#poc_At_wt").css("display", "block");

                $("#m_activa_og").css("display", "none");
                $("#m_activa_wt").css("display", "block");

            } else {

                $("#m_activa_og").css("display", "block");
                $("#m_activa_wt").css("display", "none");

                $("#poc_At_og").css("display", "none");
                $("#poc_At_wt").css("display", "block");

                $("#activa_og").css("display", "none");
                $("#activa_wt").css("display", "block");

            }
        });
    });

    // Función para cerrar la ventana de alerta
    window.setTimeout(function() {
        $(".alert-message").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
</script>