<?php
// Conexión a la db y funciones
include "./model/mainModel.php";

$yo = new mainModel();

// Se valida que las sessiones esten iniciadas
include_once './controller/controllerOperaction.php';

$lo_out = new controllerOperation();
$lo_out->serrar_sesion();

// Validación para mostrar la data si ya guardo en sesion
if (!empty($_SESSION['food_check'][$_SESSION['id']]['ideal_check'])) {
    $ideal_check = $_SESSION['food_check'][$_SESSION['id']]['ideal_check'];
} else {

    $ideal_check = '';
}

if (!empty($_SESSION['food_check'][$_SESSION['id']]['cuidado_check'])) {
    $cuidado_check = $_SESSION['food_check'][$_SESSION['id']]['cuidado_check'];
} else {
    $cuidado_check = '';
}

// Condición para procesar la data del formulario
if (isset($_POST['condiction'])) {

    $ideal_check = isset($_POST['ideal_check']) ? $_POST['ideal_check'] : '';
    $cuidado_check = isset($_POST['cuidado_check']) ? $_POST['cuidado_check'] : '';

    $sessionSmg = "";

    $array = array($ideal_check, $cuidado_check);

    $count = 0;

    foreach ($array as $row) {
        if ($row != "") {
            $count += 1;
        }
    }

    if ($count) {

        if (!empty($_POST['ideal_check'])) {
            $ideal_check = $yo->limpiar_cadena($_POST['ideal_check']);
        } else {
            $ideal_check = '';
        }

        if (!empty($_POST['cuidado_check'])) {
            $cuidado_check = $yo->limpiar_cadena($_POST['cuidado_check']);
        } else {
            $cuidado_check = '';
        }

        $_SESSION['food_check'][$_SESSION['id']] = [
            "ideal_check" => $ideal_check,
            "cuidado_check" => $cuidado_check
        ]; ?>

        <script>
            window.location.replace("<?php echo SERVERURL . 'diet/' ?>");
        </script>
<?php
    } else {
        $sessionSmg = "Debe seleccionár al menos un opción";
    }
} ?>

<div class="container condiction" ondragstart="return false" onselectstart="return false" oncontextmenu="return false">
    <div class="row">
        <div class="col-3">
            <div class="fondo-image-div margin-50">

            </div>
        </div>
        <div class="col-9">
            <form action="" method="post" class="forms-condiction">

                <p class="text-20">Teniendo en cuenta la información entregada, diseñamos
                    varias opciones perfectas para <span class="color-test-h2">'<?php echo $_SESSION['mi_pet'][$_SESSION['id']]['Name_Pet']; ?>'</span>.
                    <br>Selecciona la que más te guste
                <p>
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
                    if ($_SESSION['medical_condition'][$_SESSION['id']]['cond_medica'] == 'No') { ?>
            <div class="row">
                <div class="col-2">
                    <p class="badge-diet text-20 texto-custom-diet">IDEAL</p>
                </div>
                <div class="col-10">
                    <p class="font-size-26 custom-diet">Dieta</p>
                </div>
            </div>
            <br>
            <!-- Primera parte -->
            <div class="row">
                <div class="col food-balance">
                    <div class="card">
                        <img src="<?php echo SERVERURL ?>view/assets/img/Balance_res.png" class="card-img-top">
                        <div class="card-body">
                            <div class="form-check-fd">
                                <label class="form-check-label" for="Bcarne">
                                    Dieta Natural Balanceada - Res
                                </label>
                                <br>
                                <input class="form-check-input check-food check-custom-food" type="radio" value="BCarne" id="Bcarne" name="ideal_check" <?php echo $ideal_check == 'BCarne' ? 'checked' : '' ?>>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col food-balance">
                    <div class="card">
                        <img src="<?php echo SERVERURL ?>view/assets/img/Balance_pollo.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="form-check-fd">
                                <label class="form-check-label" for="BCarne_leguminosas">
                                    Dieta Natural Balanceada Light
                                </label>
                                <br>
                                <input class="form-check-input check-food check-custom-food" type="radio" value="BCarne y leguminosas" id="BCarne_leguminosas" name="ideal_check" <?php echo $ideal_check == 'BCarne y leguminosas' ? 'checked' : '' ?>>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col food-balance">
                    <div class="card">
                        <img src="<?php echo SERVERURL ?>view/assets/img/Balance_pavo.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="form-check-fd">
                                <label class="form-check-label" for="BCerdo">
                                    Dieta Natural Balanceada - Cerdo
                                </label>
                                <br>
                                <input class="form-check-input check-food check-custom-food" type="radio" value="BCerdo" id="BCerdo" name="ideal_check" <?php echo $ideal_check == 'BCerdo' ? 'checked' : '' ?>>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <!-- Segunda parte -->
            <div class="row">
                <div class="col food-balance">
                    <div class="card">
                        <img src="<?php echo SERVERURL ?>view/assets/img/Balance_res.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="form-check-fd">
                                <label class="form-check-label" for="BMix">
                                    Dieta Natural Balanceada - Res y Pollo
                                </label>
                                <br>
                                <input class="form-check-input check-food check-custom-food" type="radio" value="BMix" id="BMix" name="ideal_check" <?php echo $ideal_check == 'BMix' ? 'checked' : '' ?>>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col food-balance">
                    <div class="card">
                        <img src="<?php echo SERVERURL ?>view/assets/img/Balance_pollo.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="form-check-fd">
                                <label class="form-check-label" for="BPollo">
                                    Dieta Natural Balanceada - Pollo
                                </label>
                                <br>
                                <input class="form-check-input check-food check-custom-food" type="radio" value="BPollo" id="BPollo" name="ideal_check" <?php echo $ideal_check == 'BPollo' ? 'checked' : '' ?>>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col food-balance">
                    <div class="card">
                        <img src="<?php echo SERVERURL ?>view/assets/img/Balance_pavo.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="form-check-fd">
                                <label class="form-check-label" for="Senior ">
                                    Dieta Natural Balanceada - Senior
                                </label>
                                <br>
                                <input class="form-check-input check-food check-custom-food" type="radio" value="Senior " id="Senior " name="ideal_check" <?php echo $ideal_check == 'Senior' ? 'checked' : '' ?>>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <!-- Tercera parte -->
            <div class="row">
                <div class="col food-balance">
                    <div class="card">
                        <img src="<?php echo SERVERURL ?>view/assets/img/Balance_res.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="form-check-fd">
                                <label class="form-check-label" for="BCahorros">
                                    Dieta Natural Balanceada - Cachorros
                                </label>
                                <br>
                                <input class="form-check-input check-food check-custom-food" type="radio" value="BCahorros" id="BCahorros" name="ideal_check" <?php echo $ideal_check == 'BCahorros' ? 'checked' : '' ?>>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col food-balance"></div>
                <div class="col food-balance"></div>
            </div>
        <?php } else { ?>
            <div class="row">
                <div class="col-2">
                    <p class="badge-diet text-20 texto-custom-diet">IDEAL</p>
                </div>
                <div class="col-10">
                    <p class="font-size-26 custom-diet">Dieta</p>
                </div>
            </div>
            <br>
            <!-- Primera parte -->
            <div class="row">
                <div class="col food-balance">
                    <div class="card">
                        <img src="<?php echo SERVERURL ?>view/assets/img/Balance_res.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="form-check-fd">
                                <label class="form-check-label" for="Bcarne">
                                    Dieta Natural Balanceada - Res
                                </label>
                                <br>
                                <input class="form-check-input check-food check-custom-food" type="radio" value="BCarne" id="Bcarne" name="ideal_check" <?php echo $ideal_check == 'BCarne' ? 'checked' : '' ?>>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col food-balance">
                    <div class="card">
                        <img src="<?php echo SERVERURL ?>view/assets/img/Balance_pollo.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="form-check-fd">
                                <label class="form-check-label" for="BCarne_leguminosas">
                                    Dieta Natural Balanceada Light
                                </label>
                                <br>
                                <input class="form-check-input check-food check-custom-food" type="radio" value="BCarne y leguminosas" id="BCarne_leguminosas" name="ideal_check" <?php echo $ideal_check == 'BCarne y leguminosas' ? 'checked' : '' ?>>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col food-balance">
                    <div class="card">
                        <img src="<?php echo SERVERURL ?>view/assets/img/Balance_pavo.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="form-check-fd">
                                <label class="form-check-label" for="BCerdo">
                                    Dieta Natural Balanceada - Cerdo
                                </label>
                                <br>
                                <input class="form-check-input check-food check-custom-food" type="radio" value="BCerdo" id="BCerdo" name="ideal_check" <?php echo $ideal_check == 'BCerdo' ? 'checked' : '' ?>>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <!-- Segunda parte -->
            <div class="row">
                <div class="col food-balance">
                    <div class="card">
                        <img src="<?php echo SERVERURL ?>view/assets/img/Balance_res.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="form-check-fd">
                                <label class="form-check-label" for="BMix">
                                    Dieta Natural Balanceada - Res y Pollo
                                </label>
                                <br>
                                <input class="form-check-input check-food check-custom-food" type="radio" value="BMix" id="BMix" name="ideal_check" <?php echo $ideal_check == 'BMix' ? 'checked' : '' ?>>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col food-balance">
                    <div class="card">
                        <img src="<?php echo SERVERURL ?>view/assets/img/Balance_pollo.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="form-check-fd">
                                <label class="form-check-label" for="BPollo">
                                    Dieta Natural Balanceada - Pollo
                                </label>
                                <br>
                                <input class="form-check-input check-food check-custom-food" type="radio" value="BPollo" id="BPollo" name="ideal_check" <?php echo $ideal_check == 'BPollo' ? 'checked' : '' ?>>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col food-balance">
                    <div class="card">
                        <img src="<?php echo SERVERURL ?>view/assets/img/Balance_pavo.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="form-check-fd">
                                <label class="form-check-label" for="Senior ">
                                    Dieta Natural Balanceada - Senior
                                </label>
                                <br>
                                <input class="form-check-input check-food check-custom-food" type="radio" value="Senior " id="Senior " name="ideal_check" <?php echo $ideal_check == 'Senior' ? 'checked' : '' ?>>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <!-- Tercera parte -->
            <div class="row">
                <div class="col food-balance">
                    <div class="card">
                        <img src="<?php echo SERVERURL ?>view/assets/img/Balance_res.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="form-check-fd">
                                <label class="form-check-label" for="BCahorros">
                                    Dieta Natural Balanceada - Cachorros
                                </label>
                                <br>
                                <input class="form-check-input check-food check-custom-food" type="radio" value="BCahorros" id="BCahorros" name="ideal_check" <?php echo $ideal_check == 'BCahorros' ? 'checked' : '' ?>>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col food-balance"></div>
                <div class="col food-balance"></div>
            </div>

            <!-- Segundo Modulo -->
            <div class="row">
                <div class="col-2">
                    <p class="badge-diet text-20 texto-custom-diet-sub">CUIDADO DIG</p>
                </div>
                <div class="col-10">
                    <p class="font-size-26 custom-diet">Preinscripción</p>
                </div>
            </div>
            <br>
            <!-- Primera parte -->
            <div class="row">
                <div class="col food-balance">
                    <div class="card text-centerß">
                        <img src="<?php echo SERVERURL ?>view/assets/img/Balance_res.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="form-check-fd">
                                <label class="form-check-label" for="BCahorros_cuidado_digestivo">
                                    Dieta Natural Prescrita - Cachorros Digestiva
                                </label>
                                <br>
                                <input class="form-check-input check-food check-custom-food" type="radio" value="BCahorros cuidado digestivo" id="BCahorros_cuidado_digestivo" name="cuidado_check" <?php echo $cuidado_check == 'BCahorros cuidado digestivo' ? 'checked' : '' ?>>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col food-balance">
                    <div class="card">
                        <img src="<?php echo SERVERURL ?>view/assets/img/Balance_pollo.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="form-check-fd">
                                <label class="form-check-label" for="Cuidado_Digestivo">
                                    Dieta Natural Prescrita - Cuidado Digestivo
                                </label>
                                <br>
                                <input class="form-check-input check-food check-custom-food" type="radio" value="Cuidado Digestivo" id="Cuidado_Digestivo" name="cuidado_check" <?php echo $cuidado_check == 'Cuidado Digestivo' ? 'checked' : '' ?>>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col food-balance">
                    <div class="card">
                        <img src="<?php echo SERVERURL ?>view/assets/img/Balance_pavo.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="form-check-fd">
                                <label class="form-check-label" for="Dieta_Natural">
                                    Dieta Natural Prescrita - Alergias
                                </label>
                                <br>
                                <input class="form-check-input check-food check-custom-food" type="radio" value="Alergia sabor carne" id="Dieta_Natural" name="cuidado_check" <?php echo $cuidado_check == 'Alergia sabor carne' ? 'checked' : '' ?>>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <!-- Segunda parte -->
            <div class="row">
                <div class="col food-balance">
                    <div class="card text-centerß">
                        <img src="<?php echo SERVERURL ?>view/assets/img/Balance_res.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="form-check-fd">
                                <label class="form-check-label" for="Dieta_Natural_Prescrita_Estruvita">
                                    Dieta Natural Prescrita - Estruvita
                                </label>
                                <br>
                                <input class="form-check-input check-food check-custom-food" type="radio" value="Cálculos estruvita" id="Dieta_Natural_Prescrita_Estruvita" name="cuidado_check" <?php echo $cuidado_check == 'Cálculos estruvita' ? 'checked' : '' ?>>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col food-balance">
                    <div class="card">
                        <img src="<?php echo SERVERURL ?>view/assets/img/Balance_pollo.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="form-check-fd">
                                <label class="form-check-label" for="Cálculso_oxalatos">
                                    Dieta Natural Prescrita - Oxalatos
                                </label>
                                <br>
                                <input class="form-check-input check-food check-custom-food" type="radio" value="Cálculso oxalatos" id="Cálculso_oxalatos" name="cuidado_check" <?php echo $cuidado_check == 'Cálculso oxalatos' ? 'checked' : '' ?>>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col food-balance">
                    <div class="card">
                        <img src="<?php echo SERVERURL ?>view/assets/img/Balance_pavo.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="form-check-fd">
                                <label class="form-check-label" for="Control_peso">
                                    Dieta Natural Prescrita - Control de Peso
                                </label>
                                <br>
                                <input class="form-check-input check-food check-custom-food" type="radio" value="Control peso" id="Control_peso" name="cuidado_check" <?php echo $cuidado_check == 'Control peso' ? 'checked' : '' ?>>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <!-- Tercera parte -->
            <div class="row">
                <div class="col food-balance">
                    <div class="card text-centerß">
                        <img src="<?php echo SERVERURL ?>view/assets/img/Balance_res.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="form-check-fd">
                                <label class="form-check-label" for="Cuidado_articular">
                                    Dieta Natural Prescrita - Osteoarticular
                                </label>
                                <br>
                                <input class="form-check-input check-food check-custom-food" type="radio" value="Cuidado articular" id="Cuidado_articular" name="cuidado_check" <?php echo $cuidado_check == 'Cuidado articular' ? 'checked' : '' ?>>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col food-balance">
                    <div class="card">
                        <img src="<?php echo SERVERURL ?>view/assets/img/Balance_pollo.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="form-check-fd">
                                <label class="form-check-label" for="Cuidado_cardiaco">
                                    Dieta Natural Prescrita - Cuidado Cardíaco
                                </label>
                                <br>
                                <input class="form-check-input check-food check-custom-food" type="radio" value="Cuidado cardiaco" id="Cuidado_cardiaco" name="cuidado_check" <?php echo $cuidado_check == 'Cuidado cardiaco' ? 'checked' : '' ?>>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col food-balance">
                    <div class="card">
                        <img src="<?php echo SERVERURL ?>view/assets/img/Balance_pavo.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="form-check-fd">
                                <label class="form-check-label" for="Cuidado_de_la_piel">
                                    Dieta Natural Prescrita - Cuidado de Piel
                                </label>
                                <br>
                                <input class="form-check-input check-food check-custom-food" type="radio" value="Cuidado de la piel" id="Cuidado_de_la_piel" name="cuidado_check" <?php echo $cuidado_check == 'Cuidado de la piel' ? 'checked' : '' ?>>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <!-- Cuarto parte -->
            <div class="row">
                <div class="col food-balance">
                    <div class="card text-centerß">
                        <img src="<?php echo SERVERURL ?>view/assets/img/Balance_res.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="form-check-fd">
                                <label class="form-check-label" for="Cuidado_hepática">
                                    Dieta Natural Prescrita - Cuidado Hepático
                                </label>
                                <br>
                                <input class="form-check-input check-food check-custom-food" type="radio" value="Cuidado hepática" id="Cuidado_hepática" name="cuidado_check" <?php echo $cuidado_check == 'Cuidado hepática' ? 'checked' : '' ?>>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col food-balance">
                    <div class="card">
                        <img src="<?php echo SERVERURL ?>view/assets/img/Balance_pollo.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="form-check-fd">
                                <label class="form-check-label" for="Cuidado hepatica sabor carne">
                                    Dieta Natural Prescrita - Cuidado Hepático Res
                                </label>
                                <br>
                                <input class="form-check-input check-food check-custom-food" type="radio" value="Cuidado hepatica sabor carne" id="Cuidado hepatica sabor carne" name="cuidado_check" <?php echo $cuidado_check == 'Cuidado hepatica sabor carne' ? 'checked' : '' ?>>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col food-balance">
                    <div class="card">
                        <img src="<?php echo SERVERURL ?>view/assets/img/Balance_pavo.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="form-check-fd">
                                <label class="form-check-label" for="Cuidado renal">
                                    Dieta Natural Prescrita - Cuidado Renal
                                </label>
                                <br>
                                <input class="form-check-input check-food check-custom-food" type="radio" value="Cuidado renal" id="Cuidado renal" name="cuidado_check" <?php echo $cuidado_check == 'Cuidado renal' ? 'checked' : '' ?>>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <!-- quinta parte -->
            <div class="row">
                <div class="col food-balance">
                    <div class="card text-centerß">
                        <img src="<?php echo SERVERURL ?>view/assets/img/Balance_res.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="form-check-fd">
                                <label class="form-check-label" for="Diabetes">
                                    Dieta Natural Prescrita - Diabetes
                                </label>
                                <br>
                                <input class="form-check-input check-food check-custom-food" type="radio" value="Diabetes" id="Diabetes" name="cuidado_check" <?php echo $cuidado_check == 'Diabetes' ? 'checked' : '' ?>>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col food-balance">
                    <div class="card">
                        <img src="<?php echo SERVERURL ?>view/assets/img/Balance_pollo.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="form-check-fd">
                                <label class="form-check-label" for="Estreñimiento ">
                                    Dieta Natural Prescrita - Estreñimiento
                                </label>
                                <br>
                                <input class="form-check-input check-food check-custom-food" type="radio" value="Estreñimiento" id="Estreñimiento " name="cuidado_check" <?php echo $cuidado_check == 'Estreñimiento' ? 'checked' : '' ?>>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col food-balance">
                    <div class="card">
                        <img src="<?php echo SERVERURL ?>view/assets/img/Balance_pavo.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="form-check-fd">
                                <label class="form-check-label" for="Grain Free">
                                    Dieta Natural Prescrita - Cuidado Hepático Grain Free
                                </label>
                                <br>
                                <input class="form-check-input check-food check-custom-food" type="radio" value="Grain Free" id="Grain Free" name="cuidado_check" <?php echo $cuidado_check == 'Grain Free' ? 'checked' : '' ?>>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <!-- Sexta parte -->
            <div class="row">
                <div class="col food-balance">
                    <div class="card text-centerß">
                        <img src="<?php echo SERVERURL ?>view/assets/img/Balance_res.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="form-check-fd">
                                <label class="form-check-label" for="Hemoparásitos">
                                    Dieta Natural Prescrita - Hemoparásitos
                                </label>
                                <br>
                                <input class="form-check-input check-food check-custom-food" type="radio" value="Hemoparásitos" id="Hemoparásitos" name="cuidado_check" <?php echo $cuidado_check == 'Hemoparásitos' ? 'checked' : '' ?>>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col food-balance">
                    <div class="card">
                        <img src="<?php echo SERVERURL ?>view/assets/img/Balance_pollo.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="form-check-fd">
                                <label class="form-check-label" for="Hipoalergenica cerdo">
                                    Dieta Natural Prescrita - Hipoalergénica
                                </label>
                                <br>
                                <input class="form-check-input check-food check-custom-food" type="radio" value="Hipoalergenica cerdo" id="Hipoalergenica cerdo" name="cuidado_check" <?php echo $cuidado_check == 'Hipoalergenica cerdo' ? 'checked' : '' ?>>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col food-balance">
                    <div class="card">
                        <img src="<?php echo SERVERURL ?>view/assets/img/Balance_pavo.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="form-check-fd">
                                <label class="form-check-label" for="Oncológico">
                                    Dieta Natural Prescrita - Oncológica
                                </label>
                                <br>
                                <input class="form-check-input check-food check-custom-food" type="radio" value="Oncológico" id="Oncológico" name="cuidado_check" <?php echo $cuidado_check == 'Oncológico' ? 'checked' : '' ?>>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <!-- Septima parte -->
            <div class="row">
                <div class="col food-balance">
                    <div class="card text-centerß">
                        <img src="<?php echo SERVERURL ?>view/assets/img/Balance_res.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="form-check-fd">
                                <label class="form-check-label" for="Pancreatitis">
                                    Dieta Natural Prescrita - Pancreatitis
                                </label>
                                <br>
                                <input class="form-check-input check-food check-custom-food" type="radio" value="Pancreatitis" id="Pancreatitis" name="cuidado_check" <?php echo $cuidado_check == 'Pancreatitis' ? 'checked' : '' ?>>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col food-balance">
                    <div class="card">
                        <img src="<?php echo SERVERURL ?>view/assets/img/Balance_pollo.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="form-check-fd">
                                <label class="form-check-label" for="Shunt">
                                    Dieta Natural Prescrita - Shunt
                                </label>
                                <br>
                                <input class="form-check-input check-food check-custom-food" type="radio" value="Shunt" id="Shunt" name="cuidado_check" <?php echo $cuidado_check == 'Shunt' ? 'checked' : '' ?>>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col food-balance">

                </div>
            </div>
        <?php } ?>
        <br>
        <div class="row">
           <?php  
            if($_SESSION['medical_condition'][$_SESSION['id']]['cond_medica'] == 'Sí'){ ?>
                <div class="col-6 cont-button-g">
                <div class="button-g text-center margin-50 regresar">
                    <a class="btn" href="<?php echo SERVERURL; ?>veterinary-qualification/"> Atras <img class='mi-yo-img' src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></a>
                </div>
                <br>
            </div>
            <?php }else{ ?>
            <div class="col-6 cont-button-g">
                <div class="button-g text-center margin-50 regresar">
                    <a class="btn" href="<?php echo SERVERURL; ?>medical-condition/"> Atras <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></a>
                </div>
                <br>
            </div>
            <?php }?>
            <div class="col-6 cont-button-g">
                <div class="button-g text-center margin-50">
                    <button class="btn withe-l" type="submit" name="condiction" value="condiction">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
                </div>
            </div>
        </div>
            </form>
        </div>
        <div class="col-1"></div>
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