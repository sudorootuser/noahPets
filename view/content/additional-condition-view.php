<?php
// Conexión a la db y funciones
include "./model/mainModel.php";

$yo = new mainModel();

// Se valida que las sessiones esten iniciadas
include_once './controller/controllerOperaction.php';

$lo_out = new controllerOperation();
$lo_out->serrar_sesion();

// Validación para mostrar la data si ya guardo en sesion
if (isset($_SESSION['additional_con'][$_SESSION['id']]['additional_check'])) {
    $additional_check = $_SESSION['additional_con'][$_SESSION['id']]['additional_check'];
} else {
    $additional_check = '';
}

// Condición para procesar la data del formulario
if (isset($_POST['condiction'])) {
    $sessionSmg = "";

    if (!isset($_POST['additional_check'])) {

        $sessionSmg = "Todos los campos son obligatorios";
    } else {

        $additional_check = $yo->limpiar_cadena($_POST['additional_check']);

        $_SESSION['additional_con'][$_SESSION['id']] = [
            "additional_check" => $additional_check
        ]; ?>
        
        <script>
            window.location.replace("<?php echo SERVERURL . 'loading/' ?>");
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
                    <h2><span class="color-test-h2">'<?php echo ucfirst($_SESSION['mi_pet'][$_SESSION['id']]['Name_Pet']); ?>'</span> tiene una condición médica adicional?</h2>
                    <?php
                    if (isset($sessionSmg)) {
                        if ($sessionSmg != '') { ?>
                            <div class="alert alert-warning alert-dismissible fade show text-center alert-message " role="alert">
                                <?php echo $sessionSmg; ?>
                            </div>
                    <?php }
                    } ?>
                    <p class="text-20">Escriba la condición medica adicional de ser necesario.</span></p>
                    <br>
                    <div class="row">
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="Sí" id="additional_check" name="additional_check" <?php echo $additional_check == 'Sí' ? 'checked' : '' ?>><br>
                                <label class="form-check-label" for="additional_check" style="font-size:28px;">
                                    SÍ
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="No" id="additional_check" name="additional_check" <?php echo $additional_check == 'No' ? 'checked' : '' ?>><br>
                                <label class="form-check-label" for="additional_check" style="font-size:28px;">
                                    NO
                                </label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <textarea class="form-textarea" name="check_textarea" id="text_area" <?php echo $additional_check == 'Sí' ? 'style="display:block";' : '' ?> rows="7" placeholder="Describe la condición adicional de tu mascota!"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6 cont-button-g">
                            <div class="button-g text-center margin-50 regresar">
                                <a class="btn" href="<?php echo SERVERURL; ?>veterinary-qualification/"> Atras <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></a>
                            </div>
                            <br>
                        </div>
                        <div class="col-6 cont-button-g">
                            <div class="button-g text-center margin-50">
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
<script type="text/javascript">
    // Función para mostrar o cerrar el contenedor de texto 
    $(document).ready(function() {
        $(".form-check-input").click(function(evento) {

            var valor = $(this).val();

            if (valor === 'Sí') {
                $("#text_area").css("display", "block");
            } else {

                $("#text_area").css("display", "none");
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