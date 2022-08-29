<?php
// Conexión a la db y funciones
include "./model/mainModel.php";

$yo = new mainModel();

// Se valida que las sessiones esten iniciadas
include_once './controller/controllerOperaction.php';

$lo_out = new controllerOperation();
$lo_out->serrar_sesion();

// Validación para mostrar la data si ya guardo en sesion
if (isset($_SESSION['medical_condition'][$_SESSION['id']]['cond_medica'])) {
    $cond_medica = $_SESSION['medical_condition'][$_SESSION['id']]['cond_medica'];
    $cond_name = $_SESSION['medical_condition'][$_SESSION['id']];

    // var_dump($cond_name);die;
} else {
    $cond_medica = 'No aplica';
    $cond_name =  $_SESSION['medical_condition'][$_SESSION['id']] = [
        "cond_medica" => 'No',
        "check_problem_digest" => '',
        "check_problem_renales" => '',
        "check_cancer" => '',
        "check_problem_card" => '',
        "check_obsesidad" => '',
        "check_problem_hepat" => '',
        "check_problem_articu" => '',
        "check_problem_piel" => '',
        "check_calc_oxal" => '',
        "check_calc_estruv" => '',
        "check_alerg_aliment" => '',
        "check_estren" => '',
        "check_chunt" => '',
        "check_pancreatitis" => '',
        "check_problem_articul" => '',
        "check_otro" => '',
        "check_textarea" => ''
    ];
}

// Condición para procesar la data del formulario
if (isset($_POST['condiction'])) {

    $cond_medica = isset($_POST['cond_medica']);

    if ($_POST['cond_medica'] == 'Sí') {

        $check_problem_digest = isset($_POST['check_problem_digest']) ?  $_POST['check_problem_digest'] : '';
        $check_problem_renales = isset($_POST['check_problem_renales']) ?  $_POST['check_problem_renales'] : '';
        $check_cancer = isset($_POST['check_cancer']) ?  $_POST['check_cancer'] : '';
        $check_problem_card = isset($_POST['check_problem_card']) ?  $_POST['check_problem_card'] : '';
        $check_obsesidad = isset($_POST['check_obsesidad']) ?  $_POST['check_obsesidad'] : '';
        $check_problem_hepat = isset($_POST['check_problem_hepat']) ?  $_POST['check_problem_hepat'] : '';
        $check_problem_articu = isset($_POST['check_problem_articu']) ?  $_POST['check_problem_articu'] : '';
        $check_problem_piel = isset($_POST['check_problem_piel']) ?  $_POST['check_problem_piel'] : '';
        $check_calc_oxal = isset($_POST['check_calc_oxal']) ?  $_POST['check_calc_oxal'] : '';
        $check_calc_estruv = isset($_POST['check_calc_estruv']) ?  $_POST['check_calc_estruv'] : '';
        $check_alerg_aliment = isset($_POST['check_alerg_aliment']) ?  $_POST['check_alerg_aliment'] : '';
        $check_estren = isset($_POST['check_estren']) ?  $_POST['check_estren'] : '';

        $check_chunt = isset($_POST['check_chunt']) ?  $_POST['check_chunt'] : '';
        $check_pancreatitis = isset($_POST['check_pancreatitis']) ?  $_POST['check_pancreatitis'] : '';
        $check_problem_articul = isset($_POST['check_problem_articul']) ?  $_POST['check_problem_articul'] : '';
        $check_otro = isset($_POST['check_otro']) ?  $_POST['check_otro'] : '';
        $check_textarea = isset($_POST['check_textarea']) ?  $_POST['check_textarea'] : '';

        // Verificación de si trae data
        $array = array($check_problem_digest, $check_problem_renales, $check_cancer, $check_problem_card, $check_obsesidad, $check_problem_hepat, $check_problem_articu, $check_problem_piel, $check_calc_oxal, $check_calc_estruv, $check_alerg_aliment, $check_estren, $check_chunt, $check_pancreatitis, $check_problem_articul, $check_otro, $check_textarea);

        $count = 0;

        foreach ($array as $row) {
            if ($row != "") {
                $count += 1;
            }
        }

        // Se valida almenos una opción seleccionada
        if ($count >= 1) {

            $cond_medica = $yo->limpiar_cadena($cond_medica);
            $check_problem_digest = $yo->limpiar_cadena($check_problem_digest);
            $check_problem_renales = $yo->limpiar_cadena($check_problem_renales);
            $check_cancer = $yo->limpiar_cadena($check_cancer);
            $check_problem_card = $yo->limpiar_cadena($check_problem_card);
            $check_obsesidad = $yo->limpiar_cadena($check_obsesidad);
            $check_problem_hepat = $yo->limpiar_cadena($check_problem_hepat);
            $check_problem_articu = $yo->limpiar_cadena($check_problem_articu);
            $check_calc_oxal = $yo->limpiar_cadena($check_calc_oxal);
            $check_problem_piel = $yo->limpiar_cadena($check_problem_piel);
            $check_calc_estruv = $yo->limpiar_cadena($check_calc_estruv);
            $check_alerg_aliment = $yo->limpiar_cadena($check_alerg_aliment);
            $check_estren = $yo->limpiar_cadena($check_estren);
            $check_chunt = $yo->limpiar_cadena($check_chunt);
            $check_pancreatitis = $yo->limpiar_cadena($check_pancreatitis);
            $check_problem_articul = $yo->limpiar_cadena($check_problem_articul);
            $check_otro = $yo->limpiar_cadena($check_otro);
            $check_textarea = $yo->limpiar_cadena($check_textarea);

            $_SESSION['medical_condition'][$_SESSION['id']] = [
                "cond_medica" => 'Sí',
                "check_problem_digest" => $check_problem_digest,
                "check_problem_renales" => $check_problem_renales,
                "check_cancer" => $check_cancer,
                "check_problem_card" => $check_problem_card,
                "check_obsesidad" => $check_obsesidad,
                "check_problem_hepat" => $check_problem_hepat,
                "check_problem_articu" => $check_problem_articu,
                "check_problem_piel" => $check_problem_piel,
                "check_calc_oxal" => $check_calc_oxal,
                "check_calc_estruv" => $check_calc_estruv,
                "check_alerg_aliment" => $check_alerg_aliment,
                "check_estren" => $check_estren,
                "check_chunt" => $check_chunt,
                "check_pancreatitis" => $check_pancreatitis,
                "check_problem_articul" => $check_problem_articul,
                "check_otro" => $check_otro,
                "check_textarea" => $check_textarea
            ]; ?>

            <script>
                // window.location.replace("<?php echo SERVERURL . 'associated-symptoms/' ?>");
                window.location.replace("<?php echo SERVERURL . 'veterinary-qualification/' ?>");
            </script>
        <?php
        } else {
            $sessionSmg = "Debe seleccionar almenos una opción";
        }
    } else {

        $_SESSION['medical_condition'][$_SESSION['id']] = [
            "cond_medica" => 'No',
            "check_problem_digest" => "",
            "check_problem_renales" => "",
            "check_cancer" => "",
            "check_problem_card" => "",
            "check_obsesidad" => "",
            "check_problem_hepat" => "",
            "check_problem_articu" => "",
            "check_calc_oxal" => '',
            "check_problem_piel" => "",
            "check_calc_estruv" => "",
            "check_alerg_aliment" => "",
            "check_estren" => "",
            "check_chunt" => "",
            "check_pancreatitis" => "",
            "check_problem_articul" => "",
            "check_otro" => "",
            "check_textarea" => ""
        ];

        // Sessión de Calificación del veterinario donde agregamos data si la respuesta es no
        $_SESSION['veterinary_qua'][$_SESSION['id']] = [
            "veterinary_check" => "",
            "newFileName" => "",
            "extenFile" => "extenFile"
        ];


        // Sessión de Condición medica donde agregamos data si la respuesta es no
        $_SESSION['additional_con'][$_SESSION['id']] = [
            "additional_check" => ""
        ];

        // Sessión de Sintomas asociados por si escogen no a la condición medica
        $_SESSION['associated_sympt'][$_SESSION['id']] = [
            "check_diarrea" => '',
            "check_vomito" => '',
            "check_gases" => '',
            "check_mal_aliento" => '',
            "check_caida_pelo" => '',
            "check_picazon" => '',
            "check_pelo_opaco" => '',
            "check_convulsiones" => '',
            "check_dolor_articulas" => '',
            "check_desanimo" => '',
            "check_ayuno_prol" => '',
            "check_otro" => '',
            "check_textarea" => ''
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
                    <h2><span class="color-test-h2">'<?php echo ucfirst($_SESSION['mi_pet'][$_SESSION['id']]['Name_Pet']); ?>'</span> tiene diagnósticada al menos una condición médica</h2>
                    <?php
                    if (isset($sessionSmg)) {
                        if ($sessionSmg != '') {
                    ?>
                            <div class="alert alert-warning alert-dismissible fade show text-center alert-message " role="alert">
                                <?php echo $sessionSmg; ?>
                            </div>
                    <?php
                        }
                    } ?>
                    <br>
                    <div class="row">
                        <div class="col">
                            <select class="form-select-condiction" name="cond_medica">
                                <option value="No" <?php echo $cond_medica == 'No' ?  'selected' : '' ?>>No</option>
                                <option value="Sí" <?php echo $cond_medica == 'Sí' ?  'selected' : '' ?>>Sí</option>
                            </select>
                        </div>
                    </div>

                    <div id="checks" <?php echo $cond_medica == 'Sí' ? 'style="display:block;"' : 'style="display:none;"' ?>>
                        <p class="text-20">Cuál es la principal condición diagnósticada en <span class="color-test-h5">'<?php echo ucfirst($_SESSION['mi_pet'][$_SESSION['id']]['Name_Pet']); ?>'.</span></p>
                        <br>
                        <br>
                        <!-- Primera session -->
                        <div class="row">
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Problemas Digestivos" id="Digestivos" name="check_problem_digest" <?php echo !empty($cond_name['check_problem_digest']) ? 'checked' : '' ?>><br>
                                    <label class="form-check-label" for="Digestivos">
                                        Problemas Digestivos
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Problemas Renales" id="Renales" name="check_problem_renales" <?php echo !empty($cond_name['check_problem_renales']) ? 'checked' : '' ?>><br>
                                    <label class="form-check-label" for="Renales">
                                        Problemas Renales
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Cáncer" id="Cáncer" name="check_cancer" <?php echo !empty($cond_name['check_cancer'])  ? 'checked' : '' ?>><br>
                                    <label class="form-check-label" for="Cáncer">
                                        Cáncer
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Problemas cardiacos" id="checkbox" name="check_problem_card" <?php echo !empty($cond_name['check_problem_card']) ? 'checked' : '' ?>><br>
                                    <label class="form-check-label" for="checkbox">
                                        Problemas Cardiacos
                                    </label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!-- Segunda session -->
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Obsesidad" id="Obsesidad" name="check_obsesidad" <?php echo !empty($cond_name['check_obsesidad']) ? 'checked' : '' ?>><br>
                                    <label class="form-check-label" for="Obsesidad">
                                        Obsesidad
                                    </label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Problemas Hepáticos" id="check_problem_hepat" name="check_problem_hepat" <?php echo !empty($cond_name['check_problem_hepat'])  ? 'checked' : '' ?>><br>
                                    <label class="form-check-label" for="check_problem_hepat">
                                        Problemas Hepáticos
                                    </label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Problemas Articulares" id="check_problem_articu" name="check_problem_articu" <?php echo !empty($cond_name['check_problem_articu'])  ? 'checked' : '' ?>><br>
                                    <label class="form-check-label" for="check_problem_articu">
                                        Problemas Articulares
                                    </label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Problemas de Piel" id="check_problem_piel" name="check_problem_piel" <?php echo !empty($cond_name['check_problem_piel'])  ? 'checked' : '' ?>><br>
                                    <label class="form-check-label" for="check_problem_piel">
                                        Problemas de Piel
                                    </label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!-- Tercera session -->
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Cálculos de Oxalato" id="check_calc_oxal" name="check_calc_oxal" <?php echo $cond_name['check_calc_oxal']  ? 'checked' : '' ?>><br>
                                    <label class="form-check-label" for="check_calc_oxal">
                                        Cálculos de Oxalato
                                    </label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Calculos Estruvita" id="check_calc_estruv" name="check_calc_estruv" <?php echo !empty($cond_name['check_calc_estruv'])  ? 'checked' : '' ?>><br>
                                    <label class="form-check-label" for="check_calc_estruv">
                                        Cálculos de Estruvita
                                    </label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Alergía Alimentaría" id="check_alerg_aliment" name="check_alerg_aliment" <?php echo !empty($cond_name['check_alerg_aliment'])  ? 'checked' : '' ?>><br>
                                    <label class="form-check-label" for="check_alerg_aliment">
                                        Alergía Alimentaría
                                    </label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Estreñimiento" id="check_estren" name="check_estren" <?php echo !empty($cond_name['check_estren']) ? 'checked' : '' ?>><br>
                                    <label class="form-check-label" for="check_estren">
                                        Estreñimiento
                                    </label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!-- Cuarta session -->
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Shunt" id="check_chunt" name="check_chunt" <?php echo !empty($cond_name['check_chunt'])  ? 'checked' : '' ?>><br>
                                    <label class="form-check-label" for="check_chunt">
                                        Shunt
                                    </label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Pancreatitis" id="check_pancreatitis" name="check_pancreatitis" <?php echo !empty($cond_name['check_pancreatitis'])  ? 'checked' : '' ?>><br>
                                    <label class="form-check-label" for="check_pancreatitis">
                                        Pancreatitis
                                    </label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Problemas Articulares" id="check_problem_articul" name="check_problem_articul" <?php echo !empty($cond_name['check_problem_articul']) ? 'checked' : '' ?>><br>
                                    <label class="form-check-label" for="check_problem_articul">
                                        Problemas Articulares
                                    </label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Otro" id="check_otro" name="check_otro" value="Otro" onchange="javascript:showContent()"><br>
                                    <label class="form-check-label" for="check_otro">
                                        Otro
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <textarea class="form-textarea" name="check_textarea" id="text_check" rows="7" placeholder="Describe la principal condición diagnosticada de tu mascota!"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 cont-button-g">
                            <div class="button-g text-center margin-60 regresar">
                                <a class="btn" href="<?php echo SERVERURL; ?>alimentary-intolerance/"> Atras <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></a>
                            </div>
                            <br>
                        </div>
                        <div class="col-6 cont-button-g">
                            <div class="button-g text-center margin-60">
                                <button class="btn withe-l" type="submit" name="condiction" value="condiction">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-2"></div>
</div>

<!-- Inicio del escript -->
<script type="text/javascript">
    // Función para mostrar los tipos de intolerancias
    $(document).ready(function() {
        $('.form-select-condiction').change(function() {
            var valorCambiado = $(this).val();
            if ((valorCambiado == 'Sí')) {
                // alert('asdasdasd');
                $('#checks').css('display', 'block');
            } else if (valorCambiado == 'No') {
                $('#checks').css('display', 'none');
            }
        });
    });

    // Función para mostrar el campo de otro
    function showContent() {
        element = document.getElementById("text_check");
        check = document.getElementById("check_otro");
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