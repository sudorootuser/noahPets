<?php
include "./model/mainModel.php";

$yo = new mainModel();

if (isset($_POST['type'])) {

    $concentrado = $yo->limpiar_cadena($_POST['concentrado']);
    $marca = $yo->limpiar_cadena($_POST['marca']);


    $sessionSmg = "";

    if ($concentrado == "" || $marca == "") {

        $sessionSmg = "Todos los campos son obligatorios";
    } else {

        $_SESSION['food_style'] = [
            "concentrado" => $concentrado,
            "marca" => $marca,
        ];
        header('Location:' . SERVERURL . 'physical-build/');
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
                        <select class="form-select-raze" name="concentrado">
                            <option value="Concentrado" selected>Concentrado</option>
                            <option value="Barf">Barf</option>
                            <option value="Natural Horneada">Natural Horneada</option>
                            <option value="Preparada en casa">Preparada en casa</option>
                        </select>
                    </div>
                </div>
                <br>
                <span>De la marca</span>
                <div class="row">
                    <div class="col">
                        <select class="form-select-raze" name="marca">
                            <option value="Monello" selected>Monello</option>
                            <option value="Chunky">Chunky</option>
                            <option value="Hills">Hills</option>
                            <option value="Purina">Purina</option>
                            <option value="Barf Origenes">Barf Origenes</option>
                        </select>
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
                    <div class="col-4"></div>
                </div>
                </span>
            </form>
        </div>
        <div class="col-2"></div>
    </div>
</div>