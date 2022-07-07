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
        <div class="col-4"></div>
        <div class="col-4">
            <form action="" method="post" class="forms-date">
                <span>Zoe pesa</span>
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
                    <div class="col">
                        <div class="col cont-button-yo">
                            <div class="button-yo">
                                <button class="btn btn" type="submit" name="weight" value="weight">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
                            </div>
                        </div>
                    </div>
                </div>
                </span>
            </form>
        </div>
        <div class="col-4"></div>
    </div>
</div>