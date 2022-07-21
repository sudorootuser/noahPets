<?php
include "./model/mainModel.php";

$yo = new mainModel();

if (isset($_POST['condiction'])) {

    $ideal_check = $yo->limpiar_cadena($_POST['ideal_check']);
    $otra_plan = $yo->limpiar_cadena($_POST['otra_plan']);

    $sessionSmg = "";

    if ($ideal_check == "" || $otra_plan == "") {

        $sessionSmg = "Todos los campos son obligatorios";
    } else {

        $_SESSION['diet'] = [
            "ideal_check" => $ideal_check,
            "otra_plan" => $otra_plan
        ];
        header('Location:' . SERVERURL . 'checkout/');
    }
} ?>
<div class="container-fluid condiction" ondragstart="return false" onselectstart="return false" oncontextmenu="return false">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div style="padding: 3% 10% 0px 10%;">
                <form action="" method="post" class="forms-condiction">
                    <?php
                    if (isset($sessionSmg)) {
                        if ($sessionSmg != '') {
                    ?>
                            <div class="alert alert-warning alert-dismissible fade show text-center alert-message mt-3" role="alert">
                                <?php echo $sessionSmg; ?>
                            </div>
                    <?php }
                    } ?>
                    <span>Teniendo en cuenta la información entregada, diseñamos
                        varias opciones perfectas para <?php echo $_SESSION['mi_pet']['Name_Pet']; ?>.
                        <br>Selecciona la que más te guste</span>

                    <div class="row">
                        <div class="col">
                            <span>IDEAL</span>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row food-diet">
                        <div class="col-6">
                            <div class="card">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="card-body">
                                            <h1 class="card-title"><b>Pull Plan</b></h1>
                                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi corrupti quas illum inventore, placeat ipsum!</p>
                                            <h1 class="card-title"><b>$220.000</b></h1>
                                        </div>

                                    </div>
                                    <div class="col-6">
                                        <img src="<?php echo SERVERURL ?>view/assets/img/Full_plan.png" class="card-img-top" alt="...">
                                    </div>
                                </div>

                            </div>
                            <div class="form-check-dt" style="margin: -15px 10% 0 10%">
                                <label class="form-check-label" for="ideal_full_plan" style="font-size:24px;">
                                    Añadir
                                </label>
                                <input class="form-check-input check-food" type="radio" value="Ideal Full Plan" id="ideal_full_plan" name="ideal_check">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card" style="background-color: white;">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="card-body">
                                            <h1 class="card-title"><b>Topper Plan</b></h1>
                                            <p class="card-text" style="color:#000000 ;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi corrupti quas illum inventore, placeat ipsum!</p>
                                            <h1 class="card-title"><b>$220.000</b></h1>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <img src="<?php echo SERVERURL ?>view/assets/img/Full_plan.png" class="card-img-top" alt="...">
                                    </div>
                                </div>
                            </div>
                            <div class="form-check-dt" style="margin: -15px 10% 0 10%">
                                <label class="form-check-label" for="ideal_topper_plan" style="font-size:24px;">
                                    Añadir
                                </label>
                                <input class="form-check-input check-food" type="radio" value="Ideal Topper Plan" id="ideal_topper_plan" name="ideal_check">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <span><?php echo $_SESSION['mi_pet']['Name_Pet']; ?> necesita consumir
                                <select class="form-select-raze" name="marca">
                                    <option value="Monello" selected>150 Gramos</option>
                                    <option value="Chunky">130 Gramos</option>
                                </select>
                                diariamente de su dieta 100% natural
                                Escoge la opción 100% natural para una dieta totalmente saludable y
                                balanceada. Escoge la opción Mix si deseas mezclarla con su dieta actual
                            </span>
                        </div>
                    </div>
                    <br>
                    <div class="row food-diet">
                        <div class="col-6">
                            <div class="card">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="card-body">
                                            <h1 class="card-title"><b>Full Plan</b></h1>
                                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi corrupti quas illum inventore, placeat ipsum!</p>
                                            <h1 class="card-title"><b>$220.000</b></h1>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <img src="<?php echo SERVERURL ?>view/assets/img/Full_plan.png" class="card-img-top" alt="...">
                                    </div>
                                </div>
                            </div>
                            <div class="form-check-dt" style="margin: -15px 10% 0 10%">
                                <label class="form-check-label" for="Full_pan_ot" style="font-size:24px;">
                                    Añadir
                                </label>
                                <input class="form-check-input check-food" type="radio" value="Full Plan Otro" id="Full_pan_ot" name="otra_plan">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card" style="background-color: white;">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="card-body">
                                            <h1 class="card-title"><b>Topper Plan</b></h1>
                                            <p class="card-text" style="color:#000000 ;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi corrupti quas illum inventore, placeat ipsum!</p>
                                            <h1 class="card-title"><b>$220.000</b></h1>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <img src="<?php echo SERVERURL ?>view/assets/img/Full_plan.png" class="card-img-top" alt="...">
                                    </div>
                                </div>
                            </div>
                            <div class="form-check-dt" style="margin: -15px 10% 0 10%">
                                <label class="form-check-label" for="Topper_plan_ot" style="font-size:24px;">
                                    Añadir
                                </label>
                                <input class="form-check-input check-food" type="radio" value="Topper Plan Otro" id="Topper_plan_ot" name="otra_plan">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 cont-button-g">
                            <div class="button-g">
                                <button class="btn btn" type="submit" name="condiction" value="condiction"> Atras <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
                            </div>
                            <br><br>
                        </div>
                        <div class="col-6 cont-button-g">
                            <div class="button-g">
                                <button class="btn btn" type="submit" name="condiction" value="condiction">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
                            </div>
                        </div>
                        <br><br>
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