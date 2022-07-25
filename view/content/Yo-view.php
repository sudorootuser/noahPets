<?php
include "./model/mainModel.php";

$yo = new mainModel();

if (empty($_SESSION['id'])) {

    $_SESSION['id'] = 1;
}

if (isset($_POST['yo'])) {

    $sessionSmg = "";

    $nombre = $yo->limpiar_cadena($_POST['nombre']);
    $ciudad = $yo->limpiar_cadena($_POST['ciudad']);
    $phone = $yo->limpiar_cadena($_POST['phone']);
    $email = $yo->limpiar_cadena($_POST['email']);
    $celular = $yo->limpiar_cadena($_POST['celular']);

    if ($nombre == "" || $ciudad == "" || $email == "" || $celular == "" || $phone == "") {

        $sessionSmg = "<b>Todos los campos son obligatorios</b>";
    } elseif (!isset($_POST['check'])) {

        $sessionSmg = "<b>Los terminos y condiciones son obligatorios</b>";
    } else {

        $_SESSION['yo'] = [
            "NombreYo" => $nombre,
            "CiudadYo" => $ciudad,
            "phone" => $phone,
            "EmailYo" => $email,
            "CelularYo" => $celular
        ];

        header('Location:' . SERVERURL . 'My-Pet/');
    }
}
?>

<div class="container yo" ondragstart="return false" onselectstart="return false" oncontextmenu="return false">
    <div class="row">
        <div class="col-3 yo-img">
            <img src="<?php echo SERVERURL; ?>view/assets/img/Yo-dog.png" alt="">
        </div>
        <div class="col-9">
            <div class="container">
                <h2 class="order-title">Siempre es bueno conocer propietarios amorosos y responsables</h2>
            </div>
            <form action="" method="post" class="forms-yo">
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
                <div style="padding: 0% 10% 0px 15%;">
                    <div class="row">
                        <div class="col form-yo">
                            <span style="text-align: left;">Mi nombe es <input type="text" class="form-text" name="nombre" value=" <?php echo $nombre = isset($nombre) ? $nombre : ' ' ?>" required> ,vivo en la ciudad de <input type="text" class="form-text" name="ciudad" value="<?php echo $ciudad = isset($ciudad) ? $ciudad : ' ' ?>" required></span>

                            <span style="margin-top: 35px;">
                                Pueden contactarme para ampliar la información de mi mascota, <input type="number" class="form-text" name="phone" value="<?php echo $phone = isset($phone) ? $phone : ' ' ?>">
                            </span>

                            <span>
                                al correo eletrónico <input type="email" class="form-text" name="email" value=" <?php echo $email = isset($email) ? $email : ' ' ?>" required> o también al teléfono <input type="number" class="form-text" name="celular" value="<?php echo $celular = isset($celular) ? $celular : ' ' ?>" required>
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-check-yo">
                                <input type="checkbox" class="form-check-input aceptTerms" id="aceptTerms" value="true" name="check">
                                Acepta los terminos y condiciones
                                <span class="check"></span>
                            </div>
                            <div class="row">
                                <div class="col cont-button-g cont-button-g-Left">
                                    <div class="button-g">
                                        <button class="btn btn" type="submit" name="yo" value="yo">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    window.setTimeout(function() {
        $(".alert-message").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
</script>