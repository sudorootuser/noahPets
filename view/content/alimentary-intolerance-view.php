<?php
include "./model/mainModel.php";

$yo = new mainModel();

if (isset($_POST['type'])) {

    $type_intolerance = $yo->limpiar_cadena($_POST['type_intolerance']);
    $type_food = $yo->limpiar_cadena($_POST['type_food']);

    $sessionSmg = "";

    if ($type_intolerance == "" || $type_food == "") {

        $sessionSmg = "Todos los campos son obligatorios";
    } else {

        $_SESSION['type_intolerance'] = [
            "type_intolerance" => $type_intolerance,
            "type_food_intolerance" => $type_food
        ];
        header('Location:' . SERVERURL . 'medical-condition/');
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
                <span><?php echo $_SESSION['mi_pet']['Name_Pet']; ?> tiene alguna intolerancia alimentaria</span>
                <div class="row">
                    <div class="row">
                        <div class="col">
                            <select class="form-select-condiction" name="type_intolerance">
                                <option selected>Tipo</option>
                                <option value="Sí">Sí</option>
                                <option value="Sí">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Pollo" id="type_food" name="type_food" checked>
                                <label class="form-check-label" for="type_food" >
                                    POLLO
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Res" id="type_food" name="type_food">
                                <label class="form-check-label" for="type_food">
                                    RES
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Pescado" id="type_food" name="type_food">
                                <label class="form-check-label" for="type_food">
                                    PESCADO
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Pavo" id="type_food" name="type_food">
                                <label class="form-check-label" for="type_food">
                                    PAVO
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Zanahoría" id="type_food" name="type_food">
                                <label class="form-check-label" for="type_food">
                                    ZANAHORÍA
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Remolacha" id="type_food" name="type_food">
                                <label class="form-check-label" for="type_food">
                                    REMOLACHA
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Espinaca" id="type_food" name="type_food">
                                <label class="form-check-label" for="type_food">
                                    ESPINACA
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Zuquini" id="type_food" name="type_food">
                                <label class="form-check-label" for="type_food">
                                    ZUQUINI
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Otro" id="type_food" name="type_food">
                                <label class="form-check-label" for="type_food">
                                    OTRO
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Ningúna" id="type_food" name="type_food">
                                <label class="form-check-label" for="type_food">
                                    NUNGÚNA
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
                    <button class="btn btn" type="submit" name="type" value="type">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
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