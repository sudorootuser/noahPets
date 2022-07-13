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
<div class="container-fluid condiction" ondragstart="return false" onselectstart="return false" oncontextmenu="return false">
    <div class="row">
        <div class="col">
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
                <?php if ($_SESSION['condiction']['Type_Cond'] == 'Macho') { ?>
                    <span><?php echo ucfirst($_SESSION['mi_pet']['Name_Pet']); ?> esta castrado</span>
                <?php } else { ?>
                    <span><?php echo ucfirst($_SESSION['mi_pet']['Name_Pet']); ?> esta esterilizada</span>
                <?php }
                ?>
                <div class="row">
                    <div class="col"></div>
                    <div class="col">
                        <select class="form-select form-select-condiction" name="esterilizad">
                            <option value="Sí" selected>Sí</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col cont-button-g">
                        <div class="button-g">
                            <button class="btn btn" type="submit" name="estery" value="estery">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
                        </div>
                    </div>
                    <div class="col-2"></div>
                </div>
            </form>
        </div>
    </div>
</div>