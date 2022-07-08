<?php
include "./model/mainModel.php";

$yo = new mainModel();

if (isset($_POST['condiction'])) {

    $tipo = $yo->limpiar_cadena($_POST['tipo']);
    $medical_check = $yo->limpiar_cadena($_POST['medical_check']);

 
    $sessionSmg = "";

    if ($tipo == "" || $medical_check == "") {

        $sessionSmg = "Todos los campos son obligatorios";
    } else {

        $_SESSION['medical_condition'] = [
            "tipo" => $tipo,
            "medical_check" => $medical_check
        ];
        header('Location:' . SERVERURL . 'associated-symptoms/');
    }
} ?>
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
                <span><?php echo $_SESSION['mi_pet']['Name_Pet']; ?> tiene diagnósticada al menos una condición médica</span>
                <div class="row">
                    <div class="row">
                        <div class="col">
                            <select class="form-select-condiction" name="tipo">
                                <option selected>Tipo</option>
                                <option value="Sí">Sí</option>
                                <option value="Sí">No</option>
                            </select>
                        </div>
                    </div>
                    <span>¿Cuál es la principal condición diagnósticada en <?php echo $_SESSION['mi_pet']['Name_Pet']; ?>?</span>
                    <div class="row">
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="PROBLEMAS DIGESTIVOS" id="medical_check" name="medical_check">
                                <label class="form-check-label" for="medical_check">
                                    PROBLEMAS DIGESTIVOS
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="PROBLEMAS RENALES" id="medical_check" name="medical_check">
                                <label class="form-check-label" for="medical_check">
                                    PROBLEMAS RENALES
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="PROBLEMAS CANCÉR" id="medical_check" name="medical_check">
                                <label class="form-check-label" for="medical_check">
                                    PROBLEMAS CANCÉR
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="PROBLEMAS CARDIACOS" id="medical_check" name="medical_check">
                                <label class="form-check-label" for="medical_check">
                                    PROBLEMAS CARDIACOS
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="OBESIDAD" id="medical_check" name="medical_check">
                                <label class="form-check-label" for="medical_check">
                                    OBESIDAD
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="PROBLEMAS HEPÁTICOS" id="medical_check" name="medical_check">
                                <label class="form-check-label" for="medical_check">
                                    PROBLEMAS HEPÁTICOS
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="PROBLEMAS ARTICULARES" id="medical_check" name="medical_check">
                                <label class="form-check-label" for="medical_check">
                                    PROBLEMAS ARTICULARES
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="PROBLEMAS DE PIEL" id="medical_check" name="medical_check">
                                <label class="form-check-label" for="medical_check">
                                    PROBLEMAS DE PIEL
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="CÁLCULOS DE OXALATO" id="medical_check" name="medical_check">
                                <label class="form-check-label" for="medical_check">
                                    CÁLCULOS DE OXALATO
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="CÁLCULOS DE ESTRUVITA" id="medical_check" name="medical_check">
                                <label class="form-check-label" for="medical_check">
                                    CÁLCULOS DE ESTRUVITA
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="ALERGIA ALIMENTARÍA" id="medical_check" name="medical_check">
                                <label class="form-check-label" for="medical_check">
                                    ALERGIA ALIMENTARÍA
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="ESTREÑIMIENTO" id="medical_check" name="medical_check">
                                <label class="form-check-label" for="medical_check">
                                    ESTREÑIMIENTO
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="SHUNT" id="medical_check" name="medical_check">
                                <label class="form-check-label" for="medical_check">
                                    SHUNT
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="PANCREATITIS" id="medical_check" name="medical_check">
                                <label class="form-check-label" for="medical_check">
                                    PANCREATITIS
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="OTRA" id="medical_check" name="medical_check">
                                <label class="form-check-label" for="medical_check">
                                    OTRA
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
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
                </span>
            </form>
        </div>
        <div class="col-2"></div>
    </div>
</div>