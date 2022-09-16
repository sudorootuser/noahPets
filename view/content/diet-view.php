<?php
// Conexión a la db y funciones
include "./model/mainModel.php";
include "./controller/controllerOperaction.php";

$yo = new mainModel();

$mi = new controllerOperation();

$mi->contexturFisica();

// Condición para procesar la data del formulario
if (isset($_POST['condiction'])) {

    $ideal_check = isset($_POST['ideal_check']) ? $_POST['ideal_check'] : '';
    $otra_plan = isset($_POST['otra_plan']) ? $_POST['otra_plan'] : '';

    $sessionSmg = "";


    $array = array($ideal_check, $otra_plan);

    $count = 0;

    foreach ($array as $row) {
        if ($row != "") {
            $count += 1;
        }
    }

    if ($count > 0) {

        if (!empty($_POST['ideal_check'])) {
            $ideal_check = $yo->limpiar_cadena($_POST['ideal_check']);
        } else {
            $ideal_check = 'No aplica';
        }

        if (!empty($_POST['otra_plan'])) {
            $otra_plan = $yo->limpiar_cadena($_POST['otra_plan']);
        } else {
            $otra_plan = 'No aplica';
        }

        $_SESSION['diet'][$_SESSION['id']] = [
            "ideal_check" => $ideal_check,
            "otra_plan" => $otra_plan
        ]; ?>
        <script>
            window.location.replace("<?php echo SERVERURL . 'checkout/' ?>");
        </script>
<?php
    } else {
        $sessionSmg = "Debe seleccionar al menos una opción";
    }
} ?>

<div class="container condiction" ondragstart="return false" onselectstart="return false" oncontextmenu="return false">
    <div class="row">
        <div class="col-12">
            <div>
                <form action="" method="post" class="forms-condiction">
                    <?php
                    if (isset($sessionSmg)) {
                        if ($sessionSmg != '') { ?>
                            <div class="alert alert-warning alert-dismissible fade show text-center alert-message mt-3" role="alert">
                                <?php echo $sessionSmg; ?>
                            </div>
                    <?php }
                    } ?>
                    <p><span class="color-test-h1">'<?php echo $_SESSION['mi_pet'][$_SESSION['id']]['Name_Pet']; ?>' </span>, necesita consumir
                        <!--<select class="form-select-raze-diet" name="marca" disabled>-->
                        <input class="form-select-raze-diet" name="marca" disabled value="<?php echo  $_SESSION['consumoDía'] ?> (g)">
                        <!--<option selected><?php echo  $_SESSION['consumoDía'] ?> (kcal/kg)</option>-->
                        <!--</select>-->
                        diariamente de su dieta 100% natural
                        Escoge la opción 100% natural para una dieta totalmente saludable y
                        balanceada.
                    </p>

                    <div class="row">
                        <div class="col">
                            <p class="badge-diet text-20 texto-custom-diet">DIETA</p>
                        </div>
                        <?php if ($_SESSION['medical_condition'][$_SESSION['id']]['cond_medica'] == 'Sí') { ?>
                            <div class="col">
                                <p class="badge-diet text-20 texto-custom-diet">PREINSCRIPCIÓN</p>
                            </div>
                        <?php } ?>
                    </div>
                    <br>
                    <br>
                    <div class="row food-diet">
                        <div class="col">
                            <div class="card">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="card-body">
                                            <h4 class="card-title title-plan"><?php echo $_SESSION['food_check'][$_SESSION['id']]['ideal_check'] ?></h4>
                                            <p class="card-text text-plan">Nuestra dieta " <b><?php echo  $_SESSION['nombreFoodCheck']; ?>' "</b>, te ofrece lo mejor en alimento para la mascota y su salud!</p>
                                            <p class="card-text text-plan">Lorem ipsum dolor sit amet consectetur. </p>
                                            <h1 class="card-title price-plan">$220.000</h1>
                                            <hr class="hr-line-white">
                                        </div>

                                    </div>
                                    <div class="col-6">
                                        <img src="<?php echo SERVERURL ?>view/assets/img/Full_plan.png" class="card-img-top-custom" alt="...">
                                    </div>
                                </div>
                            </div>
                            <div class="form-check-dt">
                                <label class="form-check-label" for="ideal_full_plan">
                                    Añadir
                                </label>
                                <br>
                                <input class="form-check-input check-food check-custom-food" type="radio" value="Ideal Full Plan" id="ideal_full_plan" name="ideal_check">
                            </div>
                        </div>
                        <?php if ($_SESSION['medical_condition'][$_SESSION['id']]['cond_medica'] == 'Sí') { ?>
                            <div class="col">
                                <div class="card" style="background-color: white;">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="card-body">
                                                <h4 class="card-title title-plan"><?php echo $_SESSION['food_check'][$_SESSION['id']]['cuidado_check'] ?></h4>
                                                <p class="card-text text-plan-white">Nuestra dieta " <b><?php echo  $_SESSION['nombreFoodCuidado']; ?>' "</b>, te ofrece lo mejor en alimento para la mascota y su salud!</p>
                                                <p class="card-text text-plan-white">Lorem ipsum dolor sit amet consectetur. </p>
                                                <h1 class="card-title price-plan">$220.000</h1>
                                                <hr class="hr-line">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <img src="<?php echo SERVERURL ?>view/assets/img/Full_plan.png" class="card-img-top-custom" alt="...">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check-dt">
                                    <label class="form-check-label" for="ideal_topper_plan">
                                        Añadir
                                    </label>
                                    <br>
                                    <input class="form-check-input check-food check-custom-food" type="radio" value="Ideal Topper Plan" id="ideal_topper_plan" name="ideal_check">
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6 cont-button-g">
                            <div class="button-g text-center margin-50 regresar">
                                <a class="btn" href="<?php echo SERVERURL; ?>food/"> Atras <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></a>
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
    </div>
</div>

<!-- Inicio del escript -->
<script>
    // Función para cerrar la ventana de alerta
    window.setTimeout(function() {
        $(".alert-message").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
</script>