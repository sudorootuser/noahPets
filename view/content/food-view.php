<?php
include "./model/mainModel.php";

$yo = new mainModel();

if (isset($_POST['condiction'])) {

    $ideal_check = $yo->limpiar_cadena($_POST['ideal_check']);
    $cuidado_check = $yo->limpiar_cadena($_POST['cuidado_check']);

    $sessionSmg = "";

    if ($ideal_check == "" || $ideal_check == "") {

        $sessionSmg = "Todos los campos son obligatorios";
    } else {

        $_SESSION['food_check'][$_SESSION['id']] = [
            "ideal_check" => $ideal_check,
            "cuidado_check" => $cuidado_check
        ];
        header('Location:' . SERVERURL . 'diet/');
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
                    <?php
                    if (isset($sessionSmg)) {
                        if ($sessionSmg != '') {
                    ?>
                            <div class="alert alert-warning alert-dismissible fade show text-center alert-message " role="alert">
                                <?php echo $sessionSmg; ?>
                            </div>
                    <?php }
                    } ?>
                    <p class="text-20">Teniendo en cuenta la información entregada, diseñamos
                        varias opciones perfectas para <span class="color-test-h2">'<?php echo $_SESSION['mi_pet'][$_SESSION['id']]['Name_Pet']; ?>'</span>.
                        <br>Selecciona la que más te guste
                    <p>

                    <div class="row">
                        <div class="col-2">
                            <p class="badge-diet text-20 texto-custom-diet">IDEAL</p>
                        </div>
                        <div class="col-10">
                            <p class="font-size-26 custom-diet">Alimento</p>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col food-balance">
                            <div class="card">
                                <img src="<?php echo SERVERURL ?>view/assets/img/Balance_res.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <div class="form-check-fd">
                                        <label class="form-check-label" for="BALANCE_RES">
                                            BALANCE RES
                                        </label>
                                        <br>
                                        <input class="form-check-input check-food check-custom-food" type="radio" value="BALANCE RES" id="BALANCE_RES" name="ideal_check">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col food-balance">
                            <div class="card">
                                <img src="<?php echo SERVERURL ?>view/assets/img/Balance_pollo.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <div class="form-check-fd">
                                        <label class="form-check-label" for="CUIDADO_DIG">
                                            CUIDADO DIG
                                        </label>
                                        <br>
                                        <input class="form-check-input check-food check-custom-food" type="radio" value="CUIDADO DIG" id="CUIDADO_DIG" name="ideal_check">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col food-balance">
                            <div class="card">
                                <img src="<?php echo SERVERURL ?>view/assets/img/Balance_pavo.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <div class="form-check-fd">
                                        <label class="form-check-label" for="CUIDADO_RENAL">
                                            CUIDADO RENAL
                                        </label>
                                        <br>
                                        <input class="form-check-input check-food check-custom-food" type="radio" value="CUIDADO RENAL" id="CUIDADO_RENAL" name="ideal_check">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-2">
                            <p class="badge-diet text-20 texto-custom-diet-sub">CUIDADO DIG</p>
                        </div>
                        <div class="col-10">
                            <p class="font-size-26 custom-diet">Suplementos</p>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col food-balance">
                            <div class="card text-centerß">
                                <img src="<?php echo SERVERURL ?>view/assets/img/Balance_res.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <div class="form-check-fd">
                                        <label class="form-check-label" for="res_check">
                                            RES
                                        </label>
                                        <br>
                                        <input class="form-check-input check-food check-custom-food" type="radio" value="RES" id="res_check" name="cuidado_check">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col food-balance">
                            <div class="card">
                                <img src="<?php echo SERVERURL ?>view/assets/img/Balance_pollo.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <div class="form-check-fd">
                                        <label class="form-check-label" for="pollo_check">
                                            POLLO
                                        </label>
                                        <br>
                                        <input class="form-check-input check-food check-custom-food" type="radio" value="POLLO" id="pollo_check" name="cuidado_check">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col food-balance">
                            <div class="card">
                                <img src="<?php echo SERVERURL ?>view/assets/img/Balance_pavo.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <div class="form-check-fd">
                                        <label class="form-check-label" for="pavo_check">
                                            PAVO
                                        </label>
                                        <br>
                                        <input class="form-check-input check-food check-custom-food" type="radio" value="PAVO" id="pavo_check" name="cuidado_check">
                                    </div>
                                </div>
                            </div>
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
        <div class="col-1"></div>
    </div>
</div>
<script>
    window.setTimeout(function() {
        $(".alert-message").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
</script>