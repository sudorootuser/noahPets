<?php
include "./model/mainModel.php";

$yo = new mainModel();

if (isset($_POST['date'])) {

    $date_nacio = $yo->limpiar_cadena($_POST['date_nacio']);

    $sessionSmg = "";

    if ($date_nacio == "") {

        $sessionSmg = "La fecha es obligatoría";
    } else {

        $_SESSION['date_nacio'] = [
            "date_nacio" => $date_nacio
        ];
        header('Location:' . SERVERURL . 'weight/');
    }
} ?>
<div class="container-fluid date" ondragstart="return false" onselectstart="return false" oncontextmenu="return false">
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
            <form action="" method="post" class="forms-date">
                <span><?php echo ucfirst($_SESSION['mi_pet']['Name_Pet']); ?> nacio el</span>
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col">
                        <input class="form-select-date" type="date" name="date_nacio" id="">
                        <br>
                        <label for="formFile" class="form-label">¿No estás seguro? Escribe un aproximado</label>
                    </div>
                    <div class="col-sm-1"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col cont-button-g">
                        <div class="button-g">
                            <button class="btn btn" type="submit" name="date" value="date">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
                        </div>
                    </div>
                    <div class="col-2"></div>
                </div>
                </span>
            </form>
        </div>
        <div class="col-1"></div>
    </div>
</div>