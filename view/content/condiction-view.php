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
<div class="container-fluid condiction" ondragstart="return false" onselectstart="return false" oncontextmenu="return false">
    <div class="row">
        <div class="col-2"></div>
        <div class="col">
            <div style="padding: 3% 15% 0px 15%;">
                <form action="" method="post" class="forms-condiction">
                    <?php
                    if (isset($sessionSmg)) {
                        if ($sessionSmg != '') {
                    ?>
                            <div class="alert alert-warning alert-dismissible fade show text-center alert-message " role="alert">
                                <?php echo $sessionSmg; ?>
                            </div>
                    <?php }
                    } ?>
                    <span><?php echo ucfirst($_SESSION['mi_pet']['Name_Pet']); ?> es</span>
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col">
                            <select class="form-select-condiction" name="type" value="<?php echo  $type = isset($type) ? $type : ' ' ?>">
                                <option value="Macho" class="inpt_cond">Macho</option>
                                <option value="Hembra">Hembra</option>
                            </select>
                        </div>
                        <div class="col-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-sm-8 cont-button-g">
                            <div class="button-g">
                                <button class="btn btn" type="submit" name="condiction" value="condiction">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>
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