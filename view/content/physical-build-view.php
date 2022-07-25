<?php
include "./model/mainModel.php";

$yo = new mainModel();

if (isset($_POST['build'])) {


    $sessionSmg = "";

    if (!isset($_POST['physical-build'])) {

        $sessionSmg = "Debes seleccionar almenos un tipo de contextura fisíca";
    } else {

        $physical_build = $yo->limpiar_cadena($_POST['physical-build']);

        $_SESSION['physical_build'][$_SESSION['id']] = [
            "physical_build" => $physical_build
        ];
        header('Location:' . SERVERURL . 'physical-activity/');
    }
} ?>
<div class="container condiction" ondragstart="return false" onselectstart="return false" oncontextmenu="return false">
    <div class="row">
        <div class="col-sm-3">
            <div class="fondo-image-div margin-50">

            </div>
        </div>
        <div class="col-9">
            <div>
                <form action="" method="post" class="forms-condiction">
                    <h2>La contextura física de <span class="color-test-h2">'<?php echo $_SESSION['mi_pet'][$_SESSION['id']]['Name_Pet']; ?>'</span> es</h2>
                    <?php
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
                    <p class="text-20">Por favor seleccione la contextura de su mascota.</p>
                    <br>
                    <div class="row text-center" style="align-items: center; align-content: center; text-align: center;">
                        <div class="col-sm-4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div id="delgado_og" class="col-12" style="display:none;">
                                        <img class="img-contextura" src="../view/assets/img/ideal_orange.png" alt="" srcset="">
                                    </div>
                                    <div id="delgado_wt" class="col-12" style="display:block;">
                                        <img class="img-contextura" src="../view/assets/img/ideal_white.png" alt="" srcset="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <div id="delgado_wt" style="display:block;margin: 12px">
                                        <span class="text-contextura-label">Delgado</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col text-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="physical-build" id="physical-build1" value="Delgado" value="<?php echo $physical_build = isset($_SESSION['physical_build'][$_SESSION['id']]['physical_build']) ? $_SESSION['physical_build'][$_SESSION['id']]['physical_build'] : ' ' ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="row">
                                <div id="ideal_og" class="col-12" style="display:none;">
                                    <img class="img-contextura" src="../view/assets/img/delgado_orange.png" alt="" srcset="">
                                </div>
                                <div id="ideal_wt" class="col-12" style="display:block;">
                                    <img class="img-contextura" src="../view/assets/img/delgado_white.png" alt="" srcset="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <div id="delgado_wt" style="display:block;margin: 12px">
                                        <span class="text-contextura-label">Ideal</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="physical-build" id="physical-build1" value="Ideal" value="<?php echo $physical_build = isset($_SESSION['physical_build'][$_SESSION['id']]['physical_build']) ? $_SESSION['physical_build'][$_SESSION['id']]['physical_build'] : ' ' ?>">
                                    </div>
                                </div>
                                <div class="col-sm-1"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="row">
                                <div id="peso_wt" class="col-12" style="display:block;">
                                    <img class="img-contextura" src="../view/assets/img/sobrepeso_white.png" alt="" style="cursor:pointer;">
                                </div>
                                <div id="peso_og" class="col-12" style="display:none;">
                                    <img class="img-contextura" src="../view/assets/img/sobrepeso_orange.png" alt="" srcset="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <div id="delgado_wt" style="display:block;margin: 12px">
                                        <span class="text-contextura-label">Sobrepeso</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="physical-build" id="physical-build1" value="Sobrepeso" value="<?php echo $physical_build = isset($_SESSION['physical_build'][$_SESSION['id']]['physical_build']) ? $_SESSION['physical_build'][$_SESSION['id']]['physical_build'] : ' ' ?>">
                                    </div>
                                </div>
                                <div class="col-sm-1"></div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6 cont-button-g">
                            <div class="button-g text-center margin-50 regresar">
                                <a class="btn" href="<?php echo SERVERURL; ?>food-type/"> Atras <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></a>
                            </div>
                            <br>
                        </div>
                        <div class="col-6 cont-button-g">
                            <div class="button-g text-center margin-50">
                                <button class="btn withe-l" type="submit" name="build" value="build">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-2"></div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(".form-check-input").click(function(evento) {

            var valor = $(this).val();

            if (valor == 'Sobrepeso') {

                $("#ideal_wt").css("display", "block");
                $("#ideal_og").css("display", "none");

                $("#delgado_og").css("display", "none");
                $("#delgado_wt").css("display", "block");

                $("#peso_og").css("display", "block");
                $("#peso_wt").css("display", "none");
            } else if (valor == 'Ideal') {

                $("#peso_wt").css("display", "block");
                $("#peso_og").css("display", "none");

                $("#delgado_og").css("display", "none");
                $("#delgado_wt").css("display", "block");

                $("#ideal_og").css("display", "block");
                $("#ideal_wt").css("display", "none");
            } else {

                $("#peso_wt").css("display", "block");
                $("#peso_og").css("display", "none");

                $("#ideal_og").css("display", "none");
                $("#ideal_wt").css("display", "block");

                $("#delgado_og").css("display", "block");
                $("#delgado_wt").css("display", "none");
            }
        });
    });

    window.setTimeout(function() {
        $(".alert-message").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
</script>