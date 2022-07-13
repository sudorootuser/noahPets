<?php
include "./model/mainModel.php";

$yo = new mainModel();


if (isset($_POST['raze'])) {

    $type_raze = $yo->limpiar_cadena($_POST['type_raze']);

    $sessionSmg = "";

    if ($type_raze == "") {

        $sessionSmg = "Todos los campos son obligatorios";
    } else {

        $_SESSION['type_raze'] = [
            "type_raze" => $type_raze
        ];
        header('Location:' . SERVERURL . 'date/');
    }
} ?>
<div class="container-fluid condiction" ondragstart="return false" onselectstart="return false" oncontextmenu="return false">
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
                <span>La raza de <?php echo ucfirst($_SESSION['mi_pet']['Name_Pet']); ?> es</span>
                <div class="row">
                    <div class="col">
                        <select class="form-select-raze" name="type_raze" value="<?php echo  $type_raze = isset($type_raze) ? $type_raze : ' ' ?>">
                            <option value="Akita" selected>Akita</option>
                            <option value="American Pit Bull Terrier">American Pit Bull Terrier</option>
                            <option value="Beagle">Beagle</option>
                            <option value="Boston Terrier">Boston Terrier</option>
                            <option value="Doberman">Doberman</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col cont-button-g">
                        <div class="button-g">
                            <button class="btn btn" type="submit" name="raze" value="estery">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
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