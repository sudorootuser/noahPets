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
<div class="container-fluid condiction" ondragstart="return false" onselectstart="return false" oncontextmenu="return false">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
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
                <span>Actualmente la comida que le doy a <?php echo ucfirst($_SESSION['mi_pet']['Name_Pet']); ?> es</span>
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
                    <div class="col-1"></div>
                    <div class="col cont-button-g">
                        <div class="button-g">
                            <button class="btn btn" type="submit" name="food" value="food">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
                        </div>
                    </div>
                    <div class="col-1"></div>
                </div>
                </span>
            </form>
        </div>
        <div class="col-1"></div>
    </div>
</div>