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
<div class="container condiction" ondragstart="return false" onselectstart="return false" oncontextmenu="return false">
    <div class="row">
        <div class="col-3">
            <div class="fondo-image-div margin-50">

            </div>
        </div>
        <div class="col-9">
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
            ?>
            <div>
                <form action="" method="post" class="forms-condiction">
                    <h2>Actualmente la comida que le doy a <span class="color-test-h2">'<?php echo ucfirst($_SESSION['mi_pet']['Name_Pet']); ?>'</span> es</h2>
                    <p class="text-20">Por favor seleccione la comida que le da a su mascota.</p>
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
                        <p class="text-20">De la marca</p>
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
                        <div class="col-6 cont-button-g">
                            <div class="button-g text-center margin-50 regresar">
                                <a class="btn" href="<?php echo SERVERURL; ?>food-style/"> Atras <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></a>
                            </div>
                        </div>
                        <div class="col-6 cont-button-g">
                            <div class="button-g text-center margin-50">
                                <button class="btn withe-l" type="submit" name="type" value="type">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
                            </div>
                        </div>
                    </div>
                    </span>
                </form>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
</div>
<script>
    window.setTimeout(function() {
        $(".alert-message").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
</script>