<?php
include "./model/mainModel.php";

$yo = new mainModel();

if (isset($_POST['type'])) {

    $physical_build = $yo->limpiar_cadena($_POST['physical-build']);

    $sessionSmg = "";

    if ($physical_build == "") {

        $sessionSmg = "Todos los campos son obligatorios";
    } else {

        $_SESSION['physical_build'] = [
            "physical_build" => $physical_build
        ];
        header('Location:' . SERVERURL . 'physical-activity/');
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
                <span>La contextura física de <?php echo $_SESSION['mi_pet']['Name_Pet']; ?> es</span>
                <br><br><br>
                <div class="row">
                    <div class="col-4">
                        <img style="width: 100%;" src="../view/assets/img/Delgado.png" alt="" srcset="">
                    </div>
                    <div class="col-4">
                        <img style="width: 100%;" src="../view/assets/img/Ideal.png" alt="" srcset="">
                    </div>
                    <div class="col-4">
                        <img style="width: 100%;" src="../view/assets/img/sobrepeso.png" alt="" srcset="">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <span>Delgado</span>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="physical-build" id="physical-build1" value="Delgado">
                        </div>
                    </div>
                    <div class="col">
                        <span>Ideal</span>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="physical-build" id="physical-build1" value="Ideal" checked>
                        </div>
                    </div>
                    <div class="col">
                        <span>Sobrepeso</span>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="physical-build" id="physical-build1" value="Sobrepeso">
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col cont-button-g">
                        <div class="button-g">
                            <button class="btn btn" type="submit" name="type" value="type">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
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