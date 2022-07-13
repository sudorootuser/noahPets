<?php
include "./model/mainModel.php";

$yo = new mainModel();

if (isset($_POST['yo'])) {

    $sessionSmg = "";

    $nombre = $yo->limpiar_cadena($_POST['nombre']);
    $ciudad = $yo->limpiar_cadena($_POST['ciudad']);
    $email = $yo->limpiar_cadena($_POST['email']);
    $celular = $yo->limpiar_cadena($_POST['celular']);


    if ($nombre == "" || $ciudad == "" || $email == "" || $celular == "") {

        $sessionSmg = "<b>Todos los campos son obligatorios</b>";
    } elseif (!isset($_POST['check'])) {

        $sessionSmg = "<b>Los terminos y condiciones son obligatorios</b>";
    } else {

        $_SESSION['yo'] = [
            "NombreYo" => $nombre,
            "CiudadYo" => $ciudad,
            "EmailYo" => $email,
            "CelularYo" => $celular
        ];

        header('Location:' . SERVERURL . 'My-Pet/');
    }
} ?>

<div class="container-fluid yo" ondragstart="return false" onselectstart="return false" oncontextmenu="return false">
    <div class="row">
        <div class="col-3 yo-img">
            <img src="<?php echo SERVERURL; ?>view/assets/img/Yo-dog.png" alt="">
        </div>
        <div class="col-9">
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
            <form action="#" method="post" class="forms-yo">
                <span class="text-yo">Siempre es bueno conocer propietarios amorosos y responsables</span>
                <br>
                <br>
                <span>Mi nombe es <input type="text" class="form-text" name="nombre" value=" <?php echo  $nombre = isset($nombre) ? $nombre : ' ' ?>" required>, vivo en la ciudad de <input type="text" class="form-text" name="ciudad" value="<?php echo  $nombre = isset($ciudad) ? $ciudad : ' ' ?>" required></span>
                <br>
                <br>
                <span>Pueden contactarme para ampliar la información de mi mascota, </span>
                <br>
                <br>
                <span>al correo eletrónico <input type="text" class="form-text" name="email" value=" <?php echo  $nombre = isset($email) ? $email : ' ' ?>" required> o también al teléfono <input type="text" class="form-text" name="celular" value="<?php echo  $celular = isset($celular) ? $celular : ' ' ?>" required></span>

                <div class="row">
                    <div class="col">
                        <div class="form-check-yo">
                            <input type="checkbox" class="form-check-input aceptTerms" id="aceptTerms" value="true" name="check">
                            Acepta los terminos y condiciones
                            <span class="check"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col cont-button-g">
                        <div class="button-g">
                            <button class="btn btn" type="submit" name="yo" value="yo">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
                        </div>
                    </div>
                    <div class="col-2"></div>
                </div>
                </span>
            </form>
        </div>
    </div>
</div>