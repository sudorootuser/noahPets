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
<div class="container date" ondragstart="return false" onselectstart="return false" oncontextmenu="return false">
    <div class="row">
        <div class="col-3">
            <div class="fondo-image-div margin-50">

            </div>
        </div>
        <div class="col-9">
            <div>
                <form action="" method="post" class="forms-date">

                    <h2><span class="color-test-h2">'<?php echo ucfirst($_SESSION['mi_pet']['Name_Pet']); ?>'</span> nació el</h2>
                    <p class="text-20">Por favor seleccione la fecha de nacimiento de su mascota.</p>
                    <?php
                    if (isset($sessionSmg)) {
                        if ($sessionSmg != '') {
                    ?>
                            <div class="alert alert-warning alert-dismissible fade show text-center alert-message " role="alert">
                                <?php echo $sessionSmg; ?>
                            </div>
                    <?php }
                    }
                    ?>
                    <div class="row">

                        <div class="col">
                            <input class="form-select-date" type="date" name="date_nacio" id="" value="<?php echo $date_nacio = isset($date_nacio) ? $date_nacio : ' ' ?>" max="<?php echo $hoy; ?>">
                            <br>
                            <label for="formFile" class="form-label">¿No estás seguro? Escribe un aproximado</label>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-6 cont-button-g">
                            <div class="button-g text-center margin-50 regresar">
                                <a class="btn" href="<?php echo SERVERURL; ?>raze/"> Atras <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></a>
                            </div>
                            <br><br>
                        </div>
                        <div class="col-6 cont-button-g">
                            <div class="button-g text-center margin-50">
                                <button class="btn withe-l" type="submit" name="date" value="date">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
                            </div>
                        </div>
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