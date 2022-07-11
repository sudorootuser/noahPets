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
        <div class="col-2"></div>
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
                <span><?php echo ucfirst($_SESSION['mi_pet']['Name_Pet']); ?> es</span>
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col">
                        <select class="form-select form-select-condiction" name="type">
                            <option value="Macho">Macho</option>
                            <option value="Hembra">Hembra</option>
                        </select>
                    </div>
                    <div class="col-3"></div>
                </div>
                <div class="row">
                    <div class="col cont-button-g">
                        <div class="button-g">
                            <button class="btn btn" type="submit" name="condiction" value="condiction">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-2"></div>
    </div>
</div>