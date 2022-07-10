<?php
include "./model/mainModel.php";

$yo = new mainModel();

if (isset($_POST['type'])) {

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
<div class="container-fluid condiction">
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
                <span>La contextura física de <?php echo $_SESSION['mi_pet']['Name_Pet']; ?> es</span>
                <br><br><br>
                <div class="row text-center">
                    <div class="col">
                        <div class="row">
                            <div class="col-12" style="display:show;" id="delgado_white">
                                <img style="width: 100%;" src="../view/assets/img/delgado_white.png" alt="" srcset="">
                            </div>
                            <div class="col-12" style="display:none;">
                                <img style="width: 100%;" src="../view/assets/img/delgado_orange.png" alt="" srcset="">
                            </div>
                        </div>
                        <span>Delgado</span>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="physical-build" id="delgado_bt" value="Delgado">
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col-12" style="display:none;">
                                <img style="width: 100%;" src="../view/assets/img/ideal_white.png" alt="" srcset="">
                            </div>
                            <div class="col-12" style="display:show;">
                                <img style="width: 100%;" src="../view/assets/img/ideal_orange.png" alt="" srcset="">
                            </div>
                        </div>
                        <span>Ideal</span>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="physical-build" id="physical-build1" value="Ideal" checked>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col-12" style="display:show;">
                                <img style="width: 100%;" src="../view/assets/img/sobrepeso_white.png" alt="" srcset="">
                            </div>
                            <div class="col-12" style="display:none;">
                                <img style="width: 100%;" src="../view/assets/img/sobrepeso_orange.png" alt="" srcset="">
                            </div>
                        </div>
                        <span>Sobrepeso</span>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="physical-build" id="physical-build1" value="Sobrepeso">
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col cont-button-g">
                        <div class="button-g">
                            <button class="btn btn" type="submit" name="type" value="type">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
                        </div>
                    </div>
                    <div class="col-2"></div>
                </div>
                </span>
            </form>
        </div>
        <div class="col-2"></div>
    </div>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <p class="auto-style3"><input name="pago1" class="pago" type="radio" style="width: 70px; height: 70px" value="Ventanilla" />&nbsp;<span class="auto-style4"> Recoger en Ventanilla</span></p>
    <p>&nbsp;</p>
    <p class="auto-style3"><input checked="checked" class="pago" name="pago1" type="radio" style="width: 70px; height: 70px" value="Deposito" /><span class="auto-style4"> Deposito Bancario</span></p>
    <p>&nbsp;</p>

    <div id="div1" style="display:none;">
        <p class="auto-style3"><span class="auto-style4">CLABE Bancaria:</span></p>
        <p class="auto-style1"><input type="number" name="RECEIVER_BANK_ACCOUNT_NUMBER" id="RECEIVER_BANK_ACCOUNT_NUMBER" size="23" style="font-family: Arial; font-size: 50pt; height: 75px; width: 845px;" required class="auto-style5" /></p>
        <p class="auto-style3"><span class="auto-style4">Confirma CLABE Bancaria:</span></p>
        <p class="auto-style1"><input type="number" name="RECEIVER_ACCOUNT_NUMBER_CONFIRMATION" id="RECEIVER_ACCOUNT_NUMBER_CONFIRMATION" size="23" style="font-family: Arial; font-size: 50pt; height: 75px; width: 845px;" required class="auto-style5" /></p>
    </div>

    <div id="div2" style="display:none;">
        <center>
            <span>Has seleccionado ventanilla</span>
        </center>
    </div> -->
</div>
<!-- <script>
    $(document).ready(function() {
        $(".pago").click(function(evento) {

            var valor = $(this).val();

            if (valor == 'Deposito') {
                $("#div1").css("display", "block");
                $("#div2").css("display", "none");
            } else {
                $("#div1").css("display", "none");
                $("#div2").css("display", "block");
            }
        });
    }); -->
</script>