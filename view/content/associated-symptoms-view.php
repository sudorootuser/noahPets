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

    $_SESSION['associated_sympt'] = [
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
}
?>
<div class="container-fluid condiction" ondragstart="return false" onselectstart="return false" oncontextmenu="return false">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <?php
            if (isset($sessionSmg)) {
                if ($sessionSmg != '') {
            ?>
                    <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                        <strong>Error! </strong><?php echo $sessionSmg; ?><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
            <?php
                }
            }
            ?>
            <form action="" method="post" class="forms-condiction">
                <span>¿Qué síntomas ha tenido o tiene <?php echo ucfirst($_SESSION['mi_pet']['Name_Pet']); ?> asociadas a esta condición?</span>
                <div class="row">
                    <div class="col-sm-12">
                        <br>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Diarrea" id="type_food" name="check_diarrea">
                                    <label class="form-check-label" for="type_food">
                                        Diarrea
                                    </label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Vómito" id="type_food" name="check_vomito">
                                    <label class="form-check-label" for="type_food">
                                        Vómito
                                    </label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Gases" id="type_food" name="check_gases">
                                    <label class="form-check-label" for="type_food">
                                        Gases
                                    </label>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Mal Aliento" id="type_food" name="check_mal_aliento">
                                    <label class="form-check-label" for="type_food">
                                        Mal Aliento
                                    </label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Caída de Pelo" id="type_food" name="check_caida_pelo">
                                    <label class="form-check-label" for="type_food">
                                        Caída de Pelo
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Picazon" id="type_food" name="check_picazon">
                                    <label class="form-check-label" for="type_food">
                                        Picazón
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Pelo Opaco" id="type_food" name="check_pelo_opaco">
                                    <label class="form-check-label" for="type_food">
                                        Pelo Opaco
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Conculsiones" id="type_food" name="check_convulsiones">
                                    <label class="form-check-label" for="type_food">
                                        Convulsiones
                                    </label>
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Dolor Articulas" id="type_food" name="check_dolor_articulas">
                                    <label class="form-check-label" for="type_food">
                                        Dolor Articulas
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Desánimo" id="type_food" name="check_desanimo">
                                    <label class="form-check-label" for="type_food">
                                        Desánimo
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Ayuno Prolongado" id="type_food" name="check_ayuno_prol">
                                    <label class="form-check-label" for="type_food">
                                        Ayuno Prolongado
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Otro" id="check_otro" name="check_otro" value="Otro" onchange="javascript:showContent()">
                                    <label class="form-check-label" for="type_food">
                                        Otro
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <textarea style="border: 2px solid #F07639; width: 100%; font-size: 25px; font-weight: 600; color: #7a7a7a; border-radius: 20px; display: none;" class="form-text" name="check_textarea" id="text_check" rows="7" placeholder="Describe que síntomas tiene tu mascota!"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col cont-button-yo">
                        <div class="button-yo">
                            <button class="btn btn" type="submit" name="condiction" value="condiction">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
                            <br>
                            <br>
                        </div>
                    </div>
                    <div class="col-1"></div>
                </div>
                </span>
            </form>
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
</script>