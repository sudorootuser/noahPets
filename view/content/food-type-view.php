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

        $_SESSION['food_type'] = [
            "concentrado" => $concentrado,
            "marca" => $marca,
        ];
        header('Location:' . SERVERURL . 'physical-build/');
    }
} ?>
<div class="container-fluid condiction" ondragstart="return false" onselectstart="return false" oncontextmenu="return false">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div style="padding: 3% 15% 0px 15%;">
                <form action="" method="post" class="forms-condiction">
                    <span>Actualmente la comida que le doy a <?php echo ucfirst($_SESSION['mi_pet']['Name_Pet']); ?> es</span>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <select class="form-select-condiction" name="concentrado" value="<?php echo $concentrado = isset($concentrado) ? $concentrado : ' ' ?>">
                                <option value="Concentrado" selected>Concentrado</option>
                                <option value="Barf">Barf</option>
                                <option value="Natural Horneada">Natural Horneada</option>
                                <option value="Preparada en casa">Preparada en casa</option>
                            </select>
                        </div>
                        <span>De la marca</span>
                        <div class="col-12">
                            <select class="form-select-condiction" name="marca" value="<?php echo $marca = isset($marca) ? $marca : ' ' ?>">
                                <option value="Monello" selected>Monello</option>
                                <option value="Chunky">Chunky</option>
                                <option value="Hills">Hills</option>
                                <option value="Purina">Purina</option>
                                <option value="Barf Origenes">Barf Origenes</option>
                            </select>
                        </div>
                    </div>
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
        </div>
        <div class="col-2"></div>
    </div>
</div>