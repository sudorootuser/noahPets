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
}
?>
<div class="container condiction" ondragstart="return false" onselectstart="return false" oncontextmenu="return false">
    <div class="row">
        <div class="col-3">
            <div class="fondo-image-div margin-50">

            </div>
        </div>
        <div class="col-9">

            <div>
                <form action="" method="post" class="forms-condiction">
                    <?php if ($_SESSION['condiction']['Type_Cond'] == 'Macho') { ?>
                        <h2><span class="color-test-h2">'<?php echo ucfirst($_SESSION['mi_pet']['Name_Pet']); ?>'</span> esta castrado</h2>
                    <?php } else { ?>
                        <h2><span class="color-test-h2">'<?php echo ucfirst($_SESSION['mi_pet']['Name_Pet']); ?>'</span> esta esterilizada</h2>
                        <?php }

                    if (isset($sessionSmg)) {
                        if ($sessionSmg != '') {
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show text-center alert-message " role="alert">
                                <?php echo $sessionSmg; ?>
                            </div>
                    <?php
                        }
                    }
                    ?>
                    <p class="text-20">Por favor seleccione una opcion para su mascota.</p>
                    <div class="row">

                        <div class="col">
                            <select class="form-select-condiction" name="esterilizad">
                                <option value="" selected>Seleccione.</option>
                                <option value="Sí">Sí</option>
                                <option value="No">No</option>
                            </select>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-6 cont-button-g">
                            <div class="button-g text-center margin-50 regresar">
                                <a class="btn" href="<?php echo SERVERURL; ?>condiction/"> Atras <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></a>
                            </div>
                            <br><br>
                        </div>
                        <div class="col-6 cont-button-g">
                            <div class="button-g text-center margin-50">
                                <button class="btn withe-l" type="submit" name="estery" value="estery">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
                            </div>
                        </div>
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