<?php
include "./model/mainModel.php";

$yo = new mainModel();


if (isset($_POST['condiction'])) {

    $type_cond = $yo->limpiar_cadena($_POST['type']);
    $sessionSmg = "";

    if ($type_cond == "") {

        $sessionSmg = "Todos los campos son obligatorios";
    } else {

        $_SESSION['condiction'] = [
            "Type_Cond" => $type_cond
        ];
        header('Location:' . SERVERURL . 'esterilized/');
    }
} ?>
<div class="container-fluid condiction">
    <div class="row">
        <div class="col-4"></div>
        <div class="col">
            <form action="" method="post" class="forms-condiction">
                <span><?php echo $_SESSION['mi_pet']['Name_Pet']; ?></span>
                <div class="row">
                    <div class="col">
                        <select class="form-select-condiction" name="type">
                            <option value="Macho">Macho</option>
                            <option value="Hembra">Hembra</option>
                        </select>
                    </div>
                </div>
        </div>
        <div class="col-4"></div>
    </div>
    <div class="row">
        <div class="col-3"></div>
        <div class="col cont-button-yo">
            <div class="button-yo">
                <button class="btn btn" type="submit" name="condiction" value="condiction">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
    </form>
</div>