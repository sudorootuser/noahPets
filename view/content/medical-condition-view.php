<?php
include "./model/mainModel.php";

$yo = new mainModel();

if (isset($_POST['condiction'])) {


    $cond_medica = isset($_POST['cond_medica']);

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


    $cond_medica = $yo->limpiar_cadena($cond_medica);
    $check_problem_digest = $yo->limpiar_cadena($check_problem_digest);
    $check_problem_renales = $yo->limpiar_cadena($check_problem_renales);
    $check_cancer = $yo->limpiar_cadena($check_cancer);
    $check_problem_card = $yo->limpiar_cadena($check_problem_card);
    $check_obsesidad = $yo->limpiar_cadena($check_obsesidad);
    $check_problem_hepat = $yo->limpiar_cadena($check_problem_hepat);
    $check_problem_articu = $yo->limpiar_cadena($check_problem_articu);
    $check_problem_piel = $yo->limpiar_cadena($check_problem_piel);
    $check_calc_estruv = $yo->limpiar_cadena($check_calc_estruv);
    $check_alerg_aliment = $yo->limpiar_cadena($check_alerg_aliment);
    $check_estren = $yo->limpiar_cadena($check_estren);
    $check_chunt = $yo->limpiar_cadena($check_chunt);
    $check_pancreatitis = $yo->limpiar_cadena($check_pancreatitis);
    $check_problem_articul = $yo->limpiar_cadena($check_problem_articul);
    $check_otro = $yo->limpiar_cadena($check_otro);
    $check_textarea = $yo->limpiar_cadena($check_textarea);

    $_SESSION['medical_condition'] = [
        "cond_medica" => $cond_medica,
        "check_problem_digest" => $check_problem_digest,
        "check_problem_renales" => $check_problem_renales,
        "check_cancer" => $check_cancer,
        "check_problem_card" => $check_problem_card,
        "check_obsesidad" => $check_obsesidad,
        "check_problem_hepat" => $check_problem_hepat,
        "check_problem_articu" => $check_problem_articu,
        "check_problem_piel" => $check_problem_piel,
        "check_calc_estruv" => $check_calc_estruv,
        "check_alerg_aliment" => $check_alerg_aliment,
        "check_estren" => $check_estren,
        "check_chunt" => $check_chunt,
        "check_pancreatitis" => $check_pancreatitis,
        "check_problem_articul" => $check_problem_articul,
        "check_otro" => $check_otro,
        "check_textarea" => $check_textarea
    ];

    header('Location:' . SERVERURL . 'associated-symptoms/');
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
                <span><?php echo ucfirst($_SESSION['mi_pet']['Name_Pet']); ?> tiene diagnósticada al menos una condición médica</span>
                <div class="row">
                    <div class="col">
                        <select class="form-select form-select-condiction" name="cond_medica">
                            <option value="Sí">Sí</option>
                            <option value="No" selected>No</option>
                        </select>
                    </div>
                </div>
                <div id="checks" style="display:show;">
                    <span><?php echo ucfirst($_SESSION['mi_pet']['Name_Pet']); ?> Cuál es la principal condición diagnósticada en Zoé</span>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Problemas Digestivos" id="type_food" name="check_problem_digest" checked>
                                <label class="form-check-label" for="type_food">
                                    Problemas Digestivos
                                </label>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Problemas Renales" id="type_food" name="check_problem_ren">
                                <label class="form-check-label" for="type_food">
                                    Problemas Renales
                                </label>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Cáncer" id="type_food" name="check_cancer">
                                <label class="form-check-label" for="type_food">
                                    Cáncer
                                </label>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Problemas cardiacos" id="type_food" name="check_problem_card">
                                <label class="form-check-label" for="type_food">
                                    Problemas Cardiacos
                                </label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Obsesidad" id="type_food" name="check_obsesidad">
                                <label class="form-check-label" for="type_food">
                                    Obsesidad
                                </label>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Problemas Hepáticos" id="type_food" name="check_problem_hepat">
                                <label class="form-check-label" for="type_food">
                                    Problemas Hepáticos
                                </label>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Problemas Articulares" id="type_food" name="check_problem_articu">
                                <label class="form-check-label" for="type_food">
                                    Problemas Articulares
                                </label>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Problemas de Piel" id="type_food" name="check_problem_piel">
                                <label class="form-check-label" for="type_food">
                                    Problemas de Piel
                                </label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Cálculos de Oxalato" id="type_food" name="check_calc_oxal">
                                <label class="form-check-label" for="type_food">
                                    Cálculos de Oxalato
                                </label>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Calculos Estruvita" id="type_food" name="check_calc_estruv">
                                <label class="form-check-label" for="type_food">
                                    Cálculos de Estruvita
                                </label>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Alergía Alimentaría" id="type_food" name="check_alerg_aliment">
                                <label class="form-check-label" for="type_food">
                                    Alergía Alimentaría
                                </label>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Estreñimiento" id="type_food" name="check_estren">
                                <label class="form-check-label" for="type_food">
                                    Estreñimiento
                                </label>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Shunt" id="type_food" name="check_chunt">
                                <label class="form-check-label" for="type_food">
                                    Shunt
                                </label>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Pancreatitis" id="type_food" name="check_pancreatitis">
                                <label class="form-check-label" for="type_food">
                                    Pancreatitis
                                </label>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Problemas Articulares" id="type_food" name="check_problem_articul">
                                <label class="form-check-label" for="type_food">
                                    Problemas Articulares
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
                            <textarea style="border: 2px solid #F07639; width: 100%; font-size: 25px; font-weight: 600; color: #7a7a7a; border-radius: 20px; display: none;" class="form-text" name="check_textarea" id="text_check" rows="7" placeholder="Describe la principal condición diagnosticada de tu mascota!"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col cont-button-g">
                        <div class="button-g">
                            <button class="btn btn" type="submit" name="condiction" value="condiction">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
                            <br>
                            <br>
                        </div>
                    </div>
                    <div class="col-2"></div>
                </div>
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