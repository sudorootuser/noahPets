<?php
include "./model/mainModel.php";

$yo = new mainModel();

if (isset($_POST['type'])) {

    $tipo = $yo->limpiar_cadena($_POST['tipo']);
    $type_food = $yo->limpiar_cadena($_POST['type_food']);

    $sessionSmg = "";

    if ($tipo == "" || $type_food == "") {

        $sessionSmg = "Todos los campos son obligatorios";
    } else {

        $_SESSION['type_food'] = [
            "tipo" => $tipo,
            "type_food" => $type_food
        ];
        header('Location:' . SERVERURL . 'medical-condition/');
    }
} ?>
<div class="container-fluid condiction">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <form action="" method="post" class="forms-condiction">
                <span><?php echo $_SESSION['mi_pet']['Name_Pet']; ?> tiene alguna intolerancia alimentaria</span>
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
                    <div class="row">
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Pollo" id="type_food" name="type_food">
                                <label class="form-check-label" for="type_food">
                                    Pollo
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Res" id="type_food" name="type_food">
                                <label class="form-check-label" for="type_food">
                                    Res
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Pescado" id="type_food" name="type_food">
                                <label class="form-check-label" for="type_food">
                                    Pescado
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Pavo" id="type_food" name="type_food">
                                <label class="form-check-label" for="type_food">
                                    Pavo
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Zanahoría" id="type_food" name="type_food">
                                <label class="form-check-label" for="type_food">
                                    Zanahoría
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Remolacha" id="type_food" name="type_food">
                                <label class="form-check-label" for="type_food">
                                    Remolacha
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Espinaca" id="type_food" name="type_food">
                                <label class="form-check-label" for="type_food">
                                    Espinaca
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Zuquini" id="type_food" name="type_food">
                                <label class="form-check-label" for="type_food">
                                    Zuquini
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Otro" id="type_food" name="type_food">
                                <label class="form-check-label" for="type_food">
                                    Otro
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Ningúna" id="type_food" name="type_food">
                                <label class="form-check-label" for="type_food">
                                    Ningúna
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
                            <button class="btn btn" type="submit" name="type" value="type">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
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