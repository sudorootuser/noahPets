<?php
include "./model/mainModel.php";

$yo = new mainModel();

if (isset($_POST['weight'])) {

    $wight_peso = $yo->limpiar_cadena($_POST['wight_peso']);
    $wight_peso_op = $yo->limpiar_cadena($_POST['wight_peso_op']);


    $sessionSmg = "";

    if ($wight_peso == "" || $wight_peso_op == "") {

        $sessionSmg = "Todos los campos son obligatorios";
    } else {

        $_SESSION['wight_peso'] = [
            "wight_peso" => $wight_peso,
            "wight_peso_op" => $wight_peso_op
        ];
        header('Location:' . SERVERURL . 'food-style/');
    }
} ?>
<div class="container-fluid date">
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
            <form action="" method="post" class="forms-date">
                <span><?php echo $_SESSION['mi_pet']['Name_Pet']; ?> pesa</span>
                <div class="row">
                    <input class="form-select-date" type="number" name="wight_peso" id="">
                    <br>
                    <label for="formFile" class="form-label">¿No estás seguro? Escribe un aproximado</label>
                    <br>
                    <br>
                    <label for="formFile" class="form-label">¿El peso ideal de <?php echo $_SESSION['mi_pet']['Name_Pet']; ?> es?</label>

                    <input class="form-select-date" type="number" name="wight_peso_op" id="">
                    <br>
                    <label for="formFile" class="form-label">Opcional</label>
                </div>
                <br>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col cont-button-g">
                        <div class="button-g">
                            <button class="btn btn" type="submit" name="weight" value="weight">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
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