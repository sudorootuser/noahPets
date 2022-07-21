<?php
include "./model/mainModel.php";

$yo = new mainModel();

if (isset($_POST['activity'])) {

    $physical_activity = $yo->limpiar_cadena($_POST['physical-activity']);

    $sessionSmg = "";

    if ($physical_activity == "") {

        $sessionSmg = "Todos los campos son obligatorios";
    } else {

        $_SESSION['physical_activity'] = [
            "physical_activity" => $physical_activity
        ];
        header('Location:' . SERVERURL . 'alimentary-intolerance/');
    }
} ?>
<div class="container-fluid condiction" ondragstart="return false" onselectstart="return false" oncontextmenu="return false">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div style="padding: 0px 15% 0px 15%;">
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
                    <span>El nivel de actividad física de <?php echo $_SESSION['mi_pet']['Name_Pet']; ?> es</span>
                    <div class="row text-center">
                        <div class="col">
                            <div class="row">
                                <div id="poc_At_og" class="col-12" style="display:none;">
                                    <img style="width: 100%;" src="../view/assets/img/poco_activo_og.png" alt="" srcset="">
                                </div>
                                <div id="poc_At_wt" class="col-12" style="display:block;">
                                    <img style="width: 100%;" src="../view/assets/img/poco_activo_wt.png" alt="" srcset="">
                                </div>
                            </div>
                            <span>Poco Activo</span>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="physical-activity" id="physical-activity1" value="Poco Activo" checked>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div id="activa_og" class="col-12" style="display:block;">
                                    <img style="width: 100%;" src="../view/assets/img/activa_og.png" alt="" srcset="">
                                </div>
                                <div id="activa_wt" class="col-12" style="display:none;">
                                    <img style="width: 100%;" src="../view/assets/img/activa_wt.png" alt="" srcset="">
                                </div>
                            </div>
                            <span>Activa</span>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="physical-activity" id="physical-activity1" value="Activa" checked>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div id="m_activa_wt" class="col-12" style="display:block;">
                                    <img style="width: 100%;" src="../view/assets/img/muy_activa_wt.png" alt="" srcset="">
                                </div>
                                <div id="m_activa_og" class="col-12" style="display:none;">
                                    <img style="width: 100%;" src="../view/assets/img/muy_activa_og.png" alt="" srcset="">
                                </div>
                            </div>
                            <span>Muy activa</span>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="physical-activity" id="physical-activity1" value="Muy Activa">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col cont-button-g">
                            <div class="button-g">
                                <button class="btn btn" type="submit" name="activity" value="activity">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
                                <br><br>
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
    $(document).ready(function() {
        $(".form-check-input").click(function(evento) {

            var valor = $(this).val();

            if (valor == 'Poco Activo') {

                $("#poc_At_og").css("display", "block");
                $("#poc_At_wt").css("display", "none");

                $("#activa_og").css("display", "none");
                $("#activa_wt").css("display", "block");

                $("#m_activa_og").css("display", "none");
                $("#m_activa_wt").css("display", "block");

            } else if (valor == 'Activa') {

                $("#activa_og").css("display", "block");
                $("#activa_wt").css("display", "none");

                $("#poc_At_og").css("display", "none");
                $("#poc_At_wt").css("display", "block");

                $("#m_activa_og").css("display", "none");
                $("#m_activa_wt").css("display", "block");

            } else {

                $("#m_activa_og").css("display", "block");
                $("#m_activa_wt").css("display", "none");

                $("#poc_At_og").css("display", "none");
                $("#poc_At_wt").css("display", "block");

                $("#activa_og").css("display", "none");
                $("#activa_wt").css("display", "block");

            }
        });
    });
    window.setTimeout(function() {
        $(".alert-message").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
</script>