<?php
include "./model/mainModel.php";

$yo = new mainModel();

if (isset($_POST['condiction'])) {

    $additional_check = $yo->limpiar_cadena($_POST['additional_check']);

    $sessionSmg = "";

    if ($additional_check == "") {

        $sessionSmg = "Todos los campos son obligatorios";
    } else {

        $_SESSION['additional'] = [
            "additional_check" => $additional_check
        ];
        header('Location:' . SERVERURL . 'food/');
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
                <span>Perfecto, hemos terminado de recoger la información de <?php echo $_SESSION['mi_pet']['Name_Pet']; ?>
                <br> ¿Tienes otra mascota a la que quieras consentir con un producto especificamente para ella?</span>
                <div class="row">
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Sí" id="additional_check" name="additional_check">
                            <label class="form-check-label" for="additional_check" style="font-size:28px;">
                                SÍ
                            </label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="No" id="additional_check" name="additional_check">
                            <label class="form-check-label" for="additional_check" style="font-size:28px;">
                                NO
                            </label>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row another-pet-div">
                    <div class="col-1"></div>
                    <div class="col cont-button-p">
                        <div class="button-p">
                            <button class="btn btn" type="submit" name="condiction" value="condiction">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
                        </div>
                    </div>
                    <div class="col-4 another-pet" >
                        <img class="another-pet-img" src="<?php echo SERVERURL; ?>view/assets/img/pet-another.png" alt="" srcset="">
                    </div>
                </div>
                </span>
            </form>
        </div>
        <div class="col-1"></div>
    </div>
</div>