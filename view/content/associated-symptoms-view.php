<?php
include "./model/mainModel.php";

$yo = new mainModel();

if (isset($_POST['condiction'])) {


    $check_diarrea = isset($_POST['check_diarrea']) ?  $_POST['check_diarrea'] : '';
    $check_vomito = isset($_POST['check_vomito']) ?  $_POST['check_vomito'] : '';
    $check_gases = isset($_POST['check_gases']) ?  $_POST['check_gases'] : '';
    $check_mal_aliento = isset($_POST['check_mal_aliento']) ?  $_POST['check_mal_aliento'] : '';
    $check_caida_pelo = isset($_POST['check_caida_pelo']) ?  $_POST['check_caida_pelo'] : '';
    $check_picazon = isset($_POST['check_picazon']) ?  $_POST['check_picazon'] : '';
    $check_pelo_opaco = isset($_POST['check_pelo_opaco']) ?  $_POST['check_pelo_opaco'] : '';
    $check_convulsiones = isset($_POST['check_convulsiones']) ?  $_POST['check_convulsiones'] : '';
    $check_dolor_articulas = isset($_POST['check_dolor_articulas']) ?  $_POST['check_dolor_articulas'] : '';
    $check_desanimo = isset($_POST['check_desanimo']) ?  $_POST['check_desanimo'] : '';
    $check_ayuno_prol = isset($_POST['check_ayuno_prol']) ?  $_POST['check_ayuno_prol'] : '';
    $check_otro = isset($_POST['check_otro']) ?  $_POST['check_otro'] : '';
    $check_textarea = isset($_POST['check_textarea']) ?  $_POST['check_textarea'] : '';

    // $array = array($check_diarrea, $check_vomito, $check_gases, $check_mal_aliento, $check_caida_pelo, $check_picazon, $check_pelo_opaco, $check_convulsiones, $check_dolor_articulas, $check_desanimo, $check_ayuno_prol, $check_otro, $check_textarea);

    // $count = 0;
    // foreach ($array as $row) {
    //     if ($row != "") {
    //         $count += 1;
    //     }
    // }

    // if ($count <= 0) {

    //     $sessionSmg = "Debe seleccionar al menos un !";
    // } else {
    $check_diarrea = $yo->limpiar_cadena($check_diarrea);
    $check_vomito = $yo->limpiar_cadena($check_vomito);
    $check_gases = $yo->limpiar_cadena($check_gases);
    $check_mal_aliento = $yo->limpiar_cadena($check_mal_aliento);
    $check_caida_pelo = $yo->limpiar_cadena($check_caida_pelo);
    $check_picazon = $yo->limpiar_cadena($check_picazon);
    $check_pelo_opaco = $yo->limpiar_cadena($check_pelo_opaco);
    $check_convulsiones = $yo->limpiar_cadena($check_convulsiones);
    $check_dolor_articulas = $yo->limpiar_cadena($check_dolor_articulas);
    $check_desanimo = $yo->limpiar_cadena($check_desanimo);
    $check_ayuno_prol = $yo->limpiar_cadena($check_ayuno_prol);
    $check_otro = $yo->limpiar_cadena($check_otro);
    $check_textarea = $yo->limpiar_cadena($check_textarea);

    $_SESSION['associated_sympt'][$_SESSION['id']] = [
        "check_diarrea" => $check_diarrea,
        "check_vomito" => $check_vomito,
        "check_gases" => $check_gases,
        "check_mal_aliento" => $check_mal_aliento,
        "check_caida_pelo" => $check_caida_pelo,
        "check_picazon" => $check_picazon,
        "check_pelo_opaco" => $check_pelo_opaco,
        "check_convulsiones" => $check_convulsiones,
        "check_dolor_articulas" => $check_dolor_articulas,
        "check_desanimo" => $check_desanimo,
        "check_ayuno_prol" => $check_ayuno_prol,
        "check_otro" => $check_otro,
        "check_textarea" => $check_textarea
    ];

    header('Location:' . SERVERURL . 'veterinary-qualification/');
    // }
}
?>
<div class="container condiction" ondragstart="return false" onselectstart="return false" oncontextmenu="return false">
    <div class="row">
        <div class="col-3">
            <div class="fondo-image-div margin-50">

            </div>
        </div>
        <div class="col-9">
            <div>
                <form action="" method="post" class="forms-condiction">
                    <h2>Qué síntomas ha tenido o tiene <span class="color-test-h2">'<?php echo ucfirst($_SESSION['mi_pet'][$_SESSION['id']]['Name_Pet']); ?>'</span> asociadas a esta condición?</h2>
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
                    <p class="text-20">Por favor seleccione los sintomas que tiene su mascota.</p>
                    <div class="row">
                        <div class="col-sm-12">
                            <br>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Diarrea" id="Diarrea" name="check_diarrea"><br>
                                        <label class="form-check-label" for="Diarrea">
                                            Diarrea
                                        </label>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Vómito" id="Vómito" name="check_vomito"><br>
                                        <label class="form-check-label" for="Vómito">
                                            Vómito
                                        </label>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Gases" id="Gases" name="check_gases"><br>
                                        <label class="form-check-label" for="Gases">
                                            Gases
                                        </label>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Mal Aliento" id="check_mal_aliento" name="check_mal_aliento"><br>
                                        <label class="form-check-label" for="check_mal_aliento">
                                            Mal Aliento
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Caída de Pelo" id="check_caida_pelo" name="check_caida_pelo"><br>
                                        <label class="form-check-label" for="check_caida_pelo">
                                            Caída de Pelo
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Picazon" id="Picazon" name="check_picazon"><br>
                                        <label class="form-check-label" for="Picazon">
                                            Picazón
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Pelo Opaco" id="check_pelo_opaco" name="check_pelo_opaco"><br>
                                        <label class="form-check-label" for="check_pelo_opaco">
                                            Pelo Opaco
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Conculsiones" id="check_convulsiones" name="check_convulsiones"><br>
                                        <label class="form-check-label" for="check_convulsiones">
                                            Convulsiones
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Dolor Articulas" id="check_dolor_articulas" name="check_dolor_articulas"><br>
                                        <label class="form-check-label" for="check_dolor_articulas">
                                            Dolor Articulas
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Desánimo" id="Desánimo" name="check_desanimo"><br>
                                        <label class="form-check-label" for="Desánimo">
                                            Desánimo
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Ayuno Prolongado" id="Ayuno" name="check_ayuno_prol"><br>
                                        <label class="form-check-label" for="Ayuno">
                                            Ayuno Prolongado
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
                                    <textarea class="form-textarea" name="check_textarea" id="text_check" rows="7" placeholder="Describe que síntomas tiene tu mascota!"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6 cont-button-g">
                            <div class="button-g text-center margin-50 regresar">
                                <a class="btn" href="<?php echo SERVERURL; ?>medical-condition/"> Atras <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></a>
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

<script type="text/javascript">
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

    function showContent() {
        element = document.getElementById("text_check");
        check = document.getElementById("check_otro");
        if (check.checked) {
            element.style.display = 'block';
        } else {
            element.style.display = 'none';
        }
    }
    window.setTimeout(function() {
        $(".alert-message").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
</script>