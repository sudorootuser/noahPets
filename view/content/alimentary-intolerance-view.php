<?php
// Conexión a la db y funciones
include "./model/mainModel.php";

$yo = new mainModel();

// Se valida que las sessiones esten iniciadas
include_once './controller/controllerOperaction.php';

$lo_out = new controllerOperation();
$lo_out->serrar_sesion();

// Validación para mostrar la data si ya guardo en sesion
if (isset($_SESSION['type_intolerance'][$_SESSION['id']]['type_intolerance'])) {
    $type_intolerance = $_SESSION['type_intolerance'][$_SESSION['id']]['type_intolerance'];
    $type_name = $_SESSION['type_intolerance'][$_SESSION['id']];
} else {
    $type_intolerance = 'No aplica';
    $type_name = $_SESSION['type_intolerance'][$_SESSION['id']] = [
        "type_intolerance" => '',
        "check_pollo" => '',
        "check_res" => '',
        "check_pescado" => '',
        "check_pavo" => '',
        "check_zanahoria" => '',
        "check_remolacha" => '',
        "check_espinaca" => '',
        "check_zuquini" => '',
        "check_otro" => '',
        "name_text" => ''
    ];
}

// Condición para procesar la data del formulario
if (isset($_POST['intolerance'])) {

    $type_intolerance = isset($_POST['type_intolerance']) ? $_POST['type_intolerance'] : '';

    if ($_POST['type_intolerance'] == 'Sí') {

        $check_pollo = isset($_POST['check_pollo']) ? $_POST['check_pollo'] : '';
        $check_res = isset($_POST['check_res']) ? $_POST['check_res'] : '';
        $check_pescado = isset($_POST['check_pescado']) ? $_POST['check_pescado'] : '';
        $check_pavo = isset($_POST['check_pavo']) ? $_POST['check_pavo'] : '';
        $check_zanahoria = isset($_POST['check_zanahoria']) ? $_POST['check_zanahoria'] : '';
        $check_remolacha = isset($_POST['check_remolacha']) ? $_POST['check_remolacha'] : '';
        $check_espinaca = isset($_POST['check_espinaca']) ? $_POST['check_espinaca'] : '';
        $check_zuquini = isset($_POST['check_zuquini']) ? $_POST['check_zuquini'] : '';
        $check_otro = isset($_POST['check_otro']) ? $_POST['check_otro'] : '';
        $name_text = isset($_POST['name_text']) ? $_POST['name_text'] : '';


        // Verificación de si trae data
        $array = array($check_pollo, $check_pollo, $check_res, $check_pescado, $check_pavo, $check_zanahoria, $check_remolacha, $check_espinaca, $check_zuquini, $check_otro, $name_text);

        $count = 0;

        foreach ($array as $row) {
            if ($row != "") {
                $count += 1;
            }
        }

        if ($count >= 1) {
            $check_pollo = $yo->limpiar_cadena($check_pollo);
            $check_res = $yo->limpiar_cadena($check_res);
            $check_pescado = $yo->limpiar_cadena($check_pescado);
            $check_pavo = $yo->limpiar_cadena($check_pavo);
            $check_zanahoria = $yo->limpiar_cadena($check_zanahoria);
            $check_remolacha = $yo->limpiar_cadena($check_remolacha);
            $check_espinaca = $yo->limpiar_cadena($check_espinaca);
            $check_zuquini = $yo->limpiar_cadena($check_zuquini);
            $check_otro = $yo->limpiar_cadena($check_otro);
            $name_text = $yo->limpiar_cadena($name_text);

            $_SESSION['type_intolerance'][$_SESSION['id']] = [
                "type_intolerance" => $type_intolerance,
                "check_pollo" => $check_pollo,
                "check_res" => $check_res,
                "check_pescado" => $check_pescado,
                "check_pavo" => $check_pavo,
                "check_zanahoria" => $check_zanahoria,
                "check_remolacha" => $check_remolacha,
                "check_espinaca" => $check_espinaca,
                "check_zuquini" => $check_zuquini,
                "check_otro" => $check_otro,
                "name_text" => $name_text
            ]; ?>

            <script>
                window.location.replace("<?php echo SERVERURL . 'medical-condition/' ?>");
            </script>
        <?php
        } else {
            $sessionSmg  = "Debe seleccionar almenos una opción";
        }
    } else {

        $_SESSION['type_intolerance'][$_SESSION['id']] = [

            "type_intolerance" => $type_intolerance,
            "check_pollo" => "",
            "check_res" => "",
            "check_pescado" => "",
            "check_pavo" => "",
            "check_zanahoria" => "",
            "check_remolacha" => "",
            "check_espinaca" => "",
            "check_zuquini" => "",
            "check_otro" => "",
            "name_text" => ""
        ];
        ?>
        <script>
            window.location.replace("<?php echo SERVERURL . 'medical-condition/' ?>");
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
                <form action="" method="post" class="forms-condiction" style="text-align: center; align-items:center ; align-content: center;">
                    <h2><span class="color-test-h2">'<?php echo ucfirst($_SESSION['mi_pet'][$_SESSION['id']]['Name_Pet']); ?>'</span> tiene alguna intolerancia alimentaria</h2>
                    <?php
                    if (isset($sessionSmg)) {
                        if ($sessionSmg != '') {
                    ?>
                            <div class="alert alert-warning alert-dismissible fade show text-center alert-message " role="alert">
                                <?php echo $sessionSmg; ?>
                            </div>
                    <?php
                        }
                    }
                    ?>
                    <br>
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm">
                            <select class="form-select-condiction" name="type_intolerance">
                                <option value="No" <?php echo $type_intolerance == 'No' ? 'selected' : '' ?>>No</option>
                                <option value="Sí" <?php echo $type_intolerance == 'Sí' ? 'selected' : '' ?>>Sí</option>
                            </select>
                        </div>
                        <div class="col-sm-3"></div>
                    </div>

                    <div id="checks" <?php echo $type_intolerance == 'Sí' ? 'style="display:block;"' : 'style="display:none;"' ?>>
                        <p class="text-20">Por favor seleccione las intolerancias que tiene su mascota.</p>
                        <!-- Primera sección -->
                        <div class="row">
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Pollo" id="Pollo" name="check_pollo" <?php echo !empty($type_name['check_pollo']) ? 'checked' : '' ?>> <br>
                                    <label class="form-check-label" for="Pollo">
                                        Pollo
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Res" id="Res" name="check_res" <?php echo !empty($type_name['check_res']) ? 'checked' : '' ?>>
                                    <br>
                                    <label class="form-check-label" for="Res">
                                        Res
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Pescado" id="Pescado" name="check_pescado" <?php echo !empty($type_name['check_pescado']) ? 'checked' : '' ?>>
                                    <br>
                                    <label class="form-check-label" for="Pescado">
                                        Pescado
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Pavo" id="Pavo" name="check_pavo" <?php echo !empty($type_name['check_pavo']) ? 'checked' : '' ?>>
                                    <br>
                                    <label class="form-check-label" for="Pavo">
                                        Pavo
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- Segunda sección -->
                        <div class="row">
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Zanahoría" id="Zanahoría" name="check_zanahoria" <?php echo !empty($type_name['check_zanahoria']) ? 'checked' : '' ?>>
                                    <br>
                                    <label class="form-check-label" for="Zanahoría">
                                        Zanahoría
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Remolacha" id="Remolacha" name="check_remolacha" <?php echo !empty($type_name['check_remolacha']) ? 'checked' : '' ?>>
                                    <br>
                                    <label class="form-check-label" for="Remolacha">
                                        Remolacha
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Espinaca" id="Espinaca" name="check_espinaca" <?php echo !empty($type_name['check_espinaca']) ? 'checked' : '' ?>>
                                    <br>
                                    <label class="form-check-label" for="Espinaca">
                                        Espinaca
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Zuquíni" id="Zuquíni" name="check_zuquini" <?php echo !empty($type_name['check_zuquini']) ? 'checked' : '' ?>>
                                    <br>
                                    <label class="form-check-label" for="Zuquíni">
                                        Zuquíni
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- Tercera sección -->
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-5">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Zanahoría" id="otro_check" name="check_otro" value="Otro" onchange="javascript:showContent()">
                                    <br>
                                    <label class="form-check-label" for="otro_check">
                                        Otro
                                    </label>
                                </div>
                            </div>
                            <div class="col-5">
                                <textarea class="form-textarea" name="name_text" id="text_check-text-area" rows="7" placeholder="Describe la intolerancía de tu mascota aquí!"></textarea>
                            </div>
                            <div class="col-1"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 cont-button-g">
                            <div class="button-g text-center margin-60 regresar">
                                <a class="btn" href="<?php echo SERVERURL; ?>snackConsumption/"> Atras <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></a>
                            </div>
                            <br>
                        </div>
                        <div class="col-6 cont-button-g">
                            <div class="button-g text-center margin-60">
                                <button class="btn withe-l" type="submit" name="intolerance" value="intolerance">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
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
    // Función para mostrar los tipos de intolerancias
    $(document).ready(function() {
        $('.form-select-condiction').change(function() {
            var valorCambiado = $(this).val();
            if ((valorCambiado == 'Sí')) {
                $('#checks').css('display', 'block');
            } else if (valorCambiado == 'No') {
                $('#checks').css('display', 'none');
            }
        });
    });

    // Función para mostrar el campo de otro
    function showContent() {
        element = document.getElementById("text_check-text-area");
        check = document.getElementById("otro_check");
        if (check.checked) {
            element.style.display = 'block';
        } else {
            element.style.display = 'none';
        }
    }

    // Función para cerrar la ventana de alerta
    window.setTimeout(function() {
        $(".alert-message").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
</script>