<?php
include "./model/mainModel.php";

$yo = new mainModel();

if (isset($_POST['intolerance'])) {


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

    header('Location:' . SERVERURL . 'medical-condition/');
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
                <span><?php echo ucfirst($_SESSION['mi_pet']['Name_Pet']); ?> tiene alguna intolerancia alimentaria</span>
                <div class="row">
                    <div class="col">
                        <select class="form-select form-select-condiction" name="type_intolerance">
                            <option selected>Tipo</option>
                            <option value="Sí">Sí</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
                <div id="checks" style="display:none;">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Pollo" id="type_food" name="check_pollo" checked>
                                <label class="form-check-label" for="type_food">
                                    Pollo
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Res" id="type_food" name="check_res">
                                <label class="form-check-label" for="type_food">
                                    Res
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Pescado" id="type_food" name="check_pescado">
                                <label class="form-check-label" for="type_food">
                                    Pescado
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Pavo" id="type_food" name="check_pavo">
                                <label class="form-check-label" for="type_food">
                                    Pavo
                                </label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Zanahoría" id="type_food" name="check_zanahoria">
                                <label class="form-check-label" for="type_food">
                                    Zanahoría
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Remolacha" id="type_food" name="check_remolacha">
                                <label class="form-check-label" for="type_food">
                                    Remolacha
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Espinaca" id="type_food" name="check_espinaca">
                                <label class="form-check-label" for="type_food">
                                    Espinaca
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Zuquíni" id="type_food" name="check_zuquini">
                                <label class="form-check-label" for="type_food">
                                    Zuquíni
                                </label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Zanahoría" id="otro_check" name="check_otro" value="Otro" onchange="javascript:showContent()">
                                <label class="form-check-label" for="type_food">
                                    Otro
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <textarea style="border: 2px solid #F07639; width: 100%; font-size: 25px; font-weight: 600; color: #7a7a7a; border-radius: 20px; display: none;" class="form-text" name="name_text" id="text_check" rows="7" placeholder="Describe la intolerancía de tu mascota aquí!"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col cont-button-g">
                        <div class="button-g">
                            <button class="btn btn" type="submit" name="intolerance" value="intolerance">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
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
        check = document.getElementById("otro_check");
        if (check.checked) {
            element.style.display = 'block';
        } else {
            element.style.display = 'none';
        }
    }
</script>