<?php
include "./model/mainModel.php";

$yo = new mainModel();

if (isset($_POST['food'])) {

    $food_style = $yo->limpiar_cadena($_POST['food-style']);


    $sessionSmg = "";

    if ($food_style == "") {

        $sessionSmg = "Todos los campos son obligatorios";
    } else {

        $_SESSION['food_style'] = [
            "food_style" => $food_style,
        ];
        header('Location:' . SERVERURL . 'food-type/');
    }
} ?>
<div class="container-fluid condiction">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <form action="" method="post" class="forms-condiction">
                <span>Actualmente la comida que le doy a <?php echo $_SESSION['mi_pet']['Name_Pet']; ?> es</span>
                <div class="row">
                    <div class="col">
                        <select class="form-select-raze" name="food-style">
                            <option value="Quisquilloso" selected>Quisquilloso</option>
                            <option value="Normal">Normal</option>
                            <option value="Muy glotón">Muy glotón</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col cont-button-yo">
                        <div class="button-yo">
                            <button class="btn btn" type="submit" name="food" value="food">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
                        </div>
                    </div>
                    <div class="col-4"></div>
                </div>
                </span>
            </form>
        </div>
        <div class="col-2"></div>
    </div>
</div>