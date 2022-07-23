<?php
include "./model/mainModel.php";

$yo = new mainModel();

$hoy = date("Y-m-d");

if (isset($_POST['date'])) {

    $date_nacio = $yo->limpiar_cadena($_POST['date_nacio']);

    $sessionSmg = "";

    if ($date_nacio == "") {

        $sessionSmg = "La fecha es obligatoría";
    } else if ($date_nacio > $hoy) {
        $sessionSmg = "La fecha no puede superar el día actual";
    } else {

        $_SESSION['date_nacio'] = [
            "date_nacio" => $date_nacio
        ];
        header('Location:' . SERVERURL . 'weight/');
    }
} ?>
<div class="container-fluid date" ondragstart="return false" onselectstart="return false" oncontextmenu="return false">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div style="padding: 3% 15% 0px 15%;">
                <form action="" method="post" class="forms-date">
                    <?php
                    if (isset($sessionSmg)) {
                        if ($sessionSmg != '') {
                    ?>
                            <div class="alert alert-warning alert-dismissible fade show text-center alert-message " role="alert">
                                <?php echo $sessionSmg; ?>
                            </div>
                    <?php }
                    } 
                    
                     $hoy = date("Y-m-d");
                    ?>
                    <span><?php echo ucfirst($_SESSION['mi_pet']['Name_Pet']); ?> nacio el</span>
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col">
                            <input class="form-select-date" type="date" name="date_nacio" id="" value="<?php echo $date_nacio = isset($date_nacio) ? $date_nacio : ' ' ?>" max="<?php echo $hoy;?>">
                            <br>
                            <label for="formFile" class="form-label">¿No estás seguro? Escribe un aproximado</label>
                        </div>
                        <div class="col-sm-3"></div>
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
        </div>
        <div class="col-2"></div>
    </div>
</div>
<script>
    window.setTimeout(function() {
        $(".alert-message").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
</script>