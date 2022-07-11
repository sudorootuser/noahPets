<?php
include "./model/mainModel.php";

$yo = new mainModel();

if (isset($_POST['condiction'])) {


    $check_pollo = isset($_POST['check_pollo']) ?  $_POST['check_pollo'] : '';
    $check_pollo = isset($_POST['check_pollo']) ?  $_POST['check_pollo'] : '';
    $check_res = isset($_POST['check_res']) ?  $_POST['check_res'] : '';
    $check_pescado = isset($_POST['check_pescado']) ?  $_POST['check_pescado'] : '';
    $check_pavo = isset($_POST['check_pavo']) ?  $_POST['check_pavo'] : '';
    $check_zanahoria = isset($_POST['check_zanahoria']) ?  $_POST['check_zanahoria'] : '';
    $check_remolacha = isset($_POST['check_remolacha']) ?  $_POST['check_remolacha'] : '';
    $check_espinaca = isset($_POST['check_espinaca']) ?  $_POST['check_espinaca'] : '';
    $check_zuquini = isset($_POST['check_zuquini']) ?  $_POST['check_zuquini'] : '';
    $check_otro = isset($_POST['check_otro']) ?  $_POST['check_otro'] : '';
    $name_text = isset($_POST['name_text']) ?  $_POST['name_text'] : '';




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

    $_SESSION['type_intolerance'] = [
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
    ];

    header('Location:' . SERVERURL . 'veterinary-qualification/');
}
?>
<div class="container-fluid condiction">
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
                                    <input class="form-check-input" type="checkbox" value="Ayuno Prolongado" id="type_food" name="check_ayuno_prolongado">
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