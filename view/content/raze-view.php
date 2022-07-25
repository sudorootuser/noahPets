<?php
include "./model/mainModel.php";

$yo = new mainModel();

if (isset($_POST['raze'])) {

    $type_raze = $yo->limpiar_cadena($_POST['type_raze']);

    $sessionSmg = "";

    if ($type_raze == "") {

        $sessionSmg = "Todos los campos son obligatorios";
    } else {

        $_SESSION['type_raze'][$_SESSION['id']] = [
            "type_raze" => $type_raze
        ];
        header('Location:' . SERVERURL . 'date/');
    }
}
?>
<div class="container condiction" ondragstart="return false" onselectstart="return false" oncontextmenu="return false">
    <div class="row">
        <div class="col-3">
            <div class="fondo-image-div margin-50">

            </div>
        </div>
        <div class="col-9">

            <div>
                <form action="" method="post" class="forms-condiction">
                    <h2>La raza de <span class="color-test-h2">'<?php echo ucfirst($_SESSION['mi_pet'][$_SESSION['id']]['Name_Pet']); ?>'</span> es</h2>
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
                    <p class="text-20">Por favor seleccione una la raza de su mascota.</p>
                    <div class="row">
                        <div class="col">

                            <?php include_once './controller/registerData.php';

                            $dataPet = new registerData();

                            $data = $dataPet->consultaSimple("SELECT * FROM raza");
                            ?>
                            <select class="form-select-condiction" name="type_raze" value="<?php echo  $type_raze = isset($_SESSION['type_raze'][$_SESSION['id']]['type_raze']) ? $_SESSION['type_raze'][$_SESSION['id']]['type_raze'] : ' ' ?>">
                                <?php foreach ($data as $key => $row) { ?>
                                    <option value="<?php echo $row['idRaza'] ?>" selected><?php echo $row['raza_nombre'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 cont-button-g">
                            <div class="button-g text-center margin-80 regresar">
                                <a class="btn" href="<?php echo SERVERURL; ?>esterilized/"> Atras <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></a>
                            </div>
                            <br><br>
                        </div>
                        <div class="col-6 cont-button-g">
                            <div class="button-g text-center margin-80">
                                <button class="btn withe-l" type="submit" name="raze" value="raze">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
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