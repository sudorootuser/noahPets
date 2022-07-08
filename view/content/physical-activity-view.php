<?php
include "./model/mainModel.php";

$yo = new mainModel();

if (isset($_POST['type'])) {

    $physical_activity = $yo->limpiar_cadena($_POST['activity']);

    $sessionSmg = "";

    if ($physical_activity == "") {

        $sessionSmg = "Todos los campos son obligatorios";
    } else {

        $_SESSION['physical_activity'] = [
            "physical_activity" => $physical_activity
        ];
        header('Location:' . SERVERURL . 'alimentary-intolerance/');
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
                <span>El nivel de actividad física de <?php echo $_SESSION['mi_pet']['Name_Pet']; ?> es</span>
                <br><br><br>
                <div class="row">
                    <div class="col-4">
                        <img style="width: 100%;" src="../view/assets/img/poco_activo.png" alt="" srcset="">
                    </div>
                    <div class="col-4">
                        <img style="width: 100%;" src="../view/assets/img/activa.png" alt="" srcset="">
                    </div>
                    <div class="col-4">
                        <img style="width: 100%;" src="../view/assets/img/muy_activa.png" alt="" srcset="">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <span>Poco activa</span>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="activity" id="activity1" value="Poco activa">
                        </div>
                    </div>
                    <div class="col">
                        <span>Activa</span>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="activity" id="activity1" checked value="Activa">
                        </div>
                    </div>
                    <div class="col">
                        <span>Muy activa</span>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="activity" id="activity1" value="Muy activa">
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col cont-button-g">
                        <div class="button-g">
                            <button class="btn btn" type="submit" name="type" value="type">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
                            <br><br>

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