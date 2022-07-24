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
                            <?php include_once './controller/registerData.php';
                            $dataPet = new registerData();
                            $data = $dataPet->consultaSimple("SELECT * FROM tipocomida");
                            ?>
                            <select class="form-select-condiction" name="concentrado" value="<?php echo  $concentrado = isset($concentrado) ? $concentrado : ' ' ?>">
                                <?php foreach ($data as $key => $row) { ?>
                                    <option value="<?php echo $row['idComida'] ?>" selected><?php echo $row['comida_nombre'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <span>De la marca</span>
                        <div class="col-12">
                            <?php include_once './controller/registerData.php';
                            $dataPet = new registerData();
                            $data = $dataPet->consultaSimple("SELECT * FROM marca");
                            ?>
                            <select class="form-select-condiction" name="marca" value="<?php echo  $concentrado = isset($concentrado) ? $concentrado : ' ' ?>">
                                <?php foreach ($data as $key => $row) { ?>
                                    <option value="<?php echo $row['idMarca'] ?>" selected><?php echo $row['marca_nombre'] ?></option>
                                <?php } ?>
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