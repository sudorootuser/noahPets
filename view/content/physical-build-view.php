<?php
include "./model/mainModel.php";

$yo = new mainModel();

if (isset($_POST['build'])) {

    $physical_build = $yo->limpiar_cadena($_POST['physical-build']);

    $sessionSmg = "";

    if ($physical_build == "") {

        $sessionSmg = "Todos los campos son obligatorios";
    } else {

        $_SESSION['physical_build'] = [
            "physical_build" => $physical_build
        ];
        header('Location:' . SERVERURL . 'physical-activity/');
    }
} ?>
<div class="container-fluid condiction" ondragstart="return false" onselectstart="return false" oncontextmenu="return false">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-8">
            <div style="padding: 0px 15% 0px 15%;">
                <form action="" method="post" class="forms-condiction">
                    <?php
                    if (isset($sessionSmg)) {
                        if ($sessionSmg != '') {
                    ?>
                            <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                                <?php echo $sessionSmg; ?><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                    <?php
                        }
                    }
                    ?>
                    <span>La contextura física de <?php echo $_SESSION['mi_pet']['Name_Pet']; ?> es</span>
                    <br><br>
                    <div class="row text-center" style="align-items: center; align-content: center; text-align: center;">
                        <div class="col-sm-4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div id="delgado_og" class="col-12" style="display:none;">
                                        <img style="width: 100%;" src="../view/assets/img/ideal_orange.png" alt="" srcset="">
                                    </div>
                                    <div id="delgado_wt" class="col-12" style="display:block;">
                                        <img style="width: 100%;" src="../view/assets/img/ideal_white.png" alt="" srcset="">
                                    </div>
                                </div>
                            </div>
                            <span>Delgado</span>
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="physical-build" id="physical-build1" value="Delgado" checked value="<?php echo $physical_build = isset($physical_build) ? $physical_build : ' ' ?>">
                                    </div>
                                </div>
                                <div class="col-sm-1"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="row">
                                <div id="ideal_og" class="col-12" style="display:block;">
                                    <img style="width: 100%;" src="../view/assets/img/delgado_orange.png" alt="" srcset="">
                                </div>
                                <div id="ideal_wt" class="col-12" style="display:none;">
                                    <img style="width: 100%;" src="../view/assets/img/delgado_white.png" alt="" srcset="">
                                </div>
                            </div>
                            <span>Ideal</span>
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="physical-build" id="physical-build1" value="Ideal" checked value="<?php echo $physical_build = isset($physical_build) ? $physical_build : ' ' ?>">
                                    </div>
                                </div>
                                <div class="col-sm-1"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="row">
                                <div id="peso_wt" class="col-12" style="display:block;">
                                    <img style="width: 100%;" src="../view/assets/img/sobrepeso_white.png" alt="" style="cursor:pointer;">
                                </div>
                                <div id="peso_og" class="col-12" style="display:none;">
                                    <img style="width: 100%;" src="../view/assets/img/sobrepeso_orange.png" alt="" srcset="">
                                </div>
                            </div>
                            <span>Sobrepeso</span>
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="physical-build" id="physical-build1" value="Sobrepeso" value="<?php echo $physical_build = isset($physical_build) ? $physical_build : ' ' ?>">
                                    </div>
                                </div>
                                <div class="col-sm-1"></div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col cont-button-g">
                            <div class="button-g">
                                <button class="btn btn" type="submit" name="build" value="build">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
                                <br>
                                <br>
                            </div>
                        </div>
                        <div class="col-2"></div>
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
</script>