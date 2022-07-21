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

        $_SESSION['food_check'] = [
            "ideal_check" => $ideal_check,
            "cuidado_check" => $cuidado_check
        ];
        header('Location:' . SERVERURL . 'diet/');
    }
} ?>
<div class="container-fluid condiction" ondragstart="return false" onselectstart="return false" oncontextmenu="return false">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div style="padding: 3% 15% 0px 15%;">
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
                    <span>Teniendo en cuenta la información entregada, diseñamos
                        varias opciones perfectas para <?php echo $_SESSION['mi_pet']['Name_Pet']; ?>.
                        <br>Selecciona la que más te guste</span>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-1">
                            <span>IDEAL</span>
                        </div>
                        <div class="col-9">
                            <span>Alimento</span>
                        </div>
                        <div class="col-2">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col food-balance">
                            <div class="card" style="width: 18rem;">
                                <img src="<?php echo SERVERURL ?>view/assets/img/Balance_res.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <div class="form-check-fd">
                                        <label class="form-check-label" for="BALANCE_RES" style="font-size:24px;">
                                            BALANCE RES
                                        </label>
                                        <input class="form-check-input check-food" type="radio" value="BALANCE RES" id="BALANCE_RES" name="ideal_check">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col food-balance">
                            <div class="card" style="width: 18rem;">
                                <img src="<?php echo SERVERURL ?>view/assets/img/Balance_pollo.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <div class="form-check-fd">
                                        <label class="form-check-label" for="CUIDADO_DIG" style="font-size:24px;">
                                            CUIDADO DIG
                                        </label>
                                        <input class="form-check-input check-food" type="radio" value="CUIDADO DIG" id="CUIDADO_DIG" name="ideal_check">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col food-balance">
                            <div class="card" style="width: 18rem;">
                                <img src="<?php echo SERVERURL ?>view/assets/img/Balance_pavo.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <div class="form-check-fd">
                                        <label class="form-check-label" for="CUIDADO_RENAL" style="font-size:24px;">
                                            CUIDADO RENAL
                                        </label>
                                        <input class="form-check-input check-food" type="radio" value="CUIDADO RENAL" id="CUIDADO_RENAL" name="ideal_check">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-2">
                            <span>CUIDADO DIG</span>
                        </div>
                        <div class="col-8">
                            <span>Suplementos</span>
                        </div>
                        <div class="col-2">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col food-balance">
                            <div class="card" style="width: 18rem;">
                                <img src="<?php echo SERVERURL ?>view/assets/img/Balance_res.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <div class="form-check-fd">
                                        <label class="form-check-label" for="res_check" style="font-size:24px;">
                                            RES
                                        </label>
                                        <input class="form-check-input check-food" type="radio" value="RES" id="res_check" name="cuidado_check">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col food-balance">
                            <div class="card" style="width: 18rem;">
                                <img src="<?php echo SERVERURL ?>view/assets/img/Balance_pollo.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <div class="form-check-fd">
                                        <label class="form-check-label" for="pollo_check" style="font-size:24px;">
                                            POLLO
                                        </label>
                                        <input class="form-check-input check-food" type="radio" value="POLLO" id="pollo_check" name="cuidado_check">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col food-balance">
                            <div class="card" style="width: 18rem;">
                                <img src="<?php echo SERVERURL ?>view/assets/img/Balance_pavo.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <div class="form-check-fd">
                                        <label class="form-check-label" for="pavo_check" style="font-size:24px;">
                                            PAVO
                                        </label>
                                        <input class="form-check-input check-food" type="radio" value="PAVO" id="pavo_check" name="cuidado_check">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row ">
                        <div class="col-2"></div>
                        <div class="col cont-button-g">
                            <div class="button-g">
                                <button class="btn btn" type="submit" name="condiction" value="condiction">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
                            </div>
                            <br><br>
                        </div>
                        <div class="col-2">
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