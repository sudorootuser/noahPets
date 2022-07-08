<?php
include "./model/mainModel.php";

$yo = new mainModel();

if (isset($_POST['condiction'])) {

    $symptoms_check = $yo->limpiar_cadena($_POST['symptoms_check']);

    $sessionSmg = "";

    if ($symptoms_check == "") {

        $sessionSmg = "Todos los campos son obligatorios";
    } else {

        $_SESSION['symptoms'] = [
            "symptoms_check" => $symptoms_check
        ];
        header('Location:' . SERVERURL . 'veterinary-qualification/');
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
                <span>¿Qué síntomas ha tenido o tiene <?php echo $_SESSION['mi_pet']['Name_Pet']; ?><?php echo $_SESSION['mi_pet']['Name_Pet']; ?> asociadas a esta condición?</span>
                <div class="row">
                    <div class="row">
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="DIARREA" id="symptoms_check" name="symptoms_check">
                                <label class="form-check-label" for="symptoms_check">
                                    DIARREA
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="VÓMITO" id="symptoms_check" name="symptoms_check">
                                <label class="form-check-label" for="symptoms_check">
                                    VÓMITO
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="GASES" id="symptoms_check" name="symptoms_check">
                                <label class="form-check-label" for="symptoms_check">
                                    GASES
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="MAL ALIENTO" id="symptoms_check" name="symptoms_check">
                                <label class="form-check-label" for="symptoms_check">
                                    MAL ALIENTO
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="CAÍDA DEL PELO" id="symptoms_check" name="symptoms_check">
                                <label class="form-check-label" for="symptoms_check">
                                    CAÍDA DEL PELO
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="PICAZÓN" id="symptoms_check" name="symptoms_check">
                                <label class="form-check-label" for="symptoms_check">
                                    PICAZÓN
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="PELO OPACO" id="symptoms_check" name="symptoms_check">
                                <label class="form-check-label" for="symptoms_check">
                                    PELO OPACO
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="CONVULSIONES" id="symptoms_check" name="symptoms_check">
                                <label class="form-check-label" for="symptoms_check">
                                    CONVULSIONES
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="DOLOR ARTICULAS" id="symptoms_check" name="symptoms_check">
                                <label class="form-check-label" for="symptoms_check">
                                    DOLOR ARTICULAS
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="DESÁNIMO" id="symptoms_check" name="symptoms_check">
                                <label class="form-check-label" for="symptoms_check">
                                    DESÁNIMO
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="AYUNO PROLONGADO" id="symptoms_check" name="symptoms_check">
                                <label class="form-check-label" for="symptoms_check">
                                    AYUNO PROLONGADO
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="OTRO" id="symptoms_check" name="symptoms_check">
                                <label class="form-check-label" for="symptoms_check">
                                    OTRO
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col cont-button-yo">
                        <div class="button-yo">
                            <button class="btn btn" type="submit" name="condiction" value="condiction">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
                        </div>
                    </div>
                    <div class="col-5"></div>
                </div>
                </span>
            </form>
        </div>
        <div class="col-2"></div>
    </div>
</div>