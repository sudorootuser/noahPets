<?php
include "./model/mainModel.php";

$yo = new mainModel();


if (isset($_POST['estery'])) {

    $esterilizad = $yo->limpiar_cadena($_POST['esterilizad']);

    $sessionSmg = "";

    if ($esterilizad == "") {

        $sessionSmg = "Todos los campos son obligatorios";
    } else {

        $_SESSION['esterilizad'] = [
            "esterilizad" => $esterilizad
        ];
        header('Location:' . SERVERURL . 'raze/');
    }
} ?>
<div class="container-fluid condiction">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <?php echo $_SESSION['condiction']['Type_Cond'] ?>
            <form action="" method="post" class="forms-condiction">
                <?php if ($_SESSION['condiction']['Type_Cond'] == 'Macho') { ?>
                    <span><?php echo $_SESSION['mi_pet']['Name_Pet']; ?> esta castrado</span>
                <?php } else { ?>
                    <span><?php echo $_SESSION['mi_pet']['Name_Pet']; ?> Zoe esta esterilizada</span>
                <?php }
                ?>
                <div class="row">
                    <div class="col">
                        <select class="form-select-condiction" name="esterilizad">
                            <option value="Sí" selected>Sí</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col">
                        <div class="col cont-button-yo">
                            <div class="button-yo">
                                <button class="btn btn" type="submit" name="estery" value="estery">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-4"></div>
                </div>
                </span>
            </form>
        </div>
        <div class="col-2"></div>
    </div>
</div>