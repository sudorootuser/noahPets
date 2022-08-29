<?php
// Conexión a la db y funciones
include "./model/mainModel.php";

$yo = new mainModel();

// Condicionador para agegar una nueva mascota al array
if (empty($_SESSION['id'])) {

    $_SESSION['id'] = 1;
} else {
    $_SESSION['id'];
}

// Condición para procesar la data del formulario
if (isset($_POST['yo'])) {

    $sessionSmg = "";

    $nombre = $yo->limpiar_cadena($_POST['nombre']);
    $ciudad = $yo->limpiar_cadena($_POST['ciudad']);
    $email = $yo->limpiar_cadena($_POST['email']);
    $celular = $yo->limpiar_cadena($_POST['celular']);

    $conteo_phone = strlen($celular);

    if ($nombre == "" || $ciudad == "" || $email == "" || $celular == "") {

        $sessionSmg = "<b>Todos los campos son obligatorios</b>";
    } elseif (!isset($_POST['check'])) {

        $sessionSmg = "<b>Los terminos y condiciones son obligatorios</b>";
    } else if ($conteo_phone < 10) {
        $sessionSmg = "<b>El teléfono ingresado no es valido, la longitud admitida es 10 digitos</b>";
    } else {

        $_SESSION['yo'][$_SESSION['id']] = [
            "NombreYo" => $nombre,
            "CiudadYo" => $ciudad,
            "EmailYo" => $email,
            "CelularYo" => $celular
        ]; ?>
        <script>
            window.location.replace("<?php echo SERVERURL . 'My-Pet/' ?>");
        </script>
    <?php
    }
}

// Condicionador para eliminar una mascota del id
if (isset($_POST['cancel'])) {

    if ($_SESSION['id'] != 1) {
        $_SESSION['id'] -= 1;

        unset($_SESSION['data_pet'][$_SESSION['id']]);
    } ?>
    <script>
        window.location.replace("<?php echo SERVERURL . 'another-pet/' ?>");
    </script>

<?php
} ?>

<div class="container yo " ondragstart="return false" onselectstart="return false" oncontextmenu="return false">

    <div class="row">
        <div class="col-3 yo-img">
            <img src="<?php echo SERVERURL; ?>view/assets/img/Yo-dog.png" alt="">
        </div>
        <div class="col-9">
            <div class="container">
                <h2 class="order-title">Siempre es bueno conocer propietarios amorosos y responsables</h2>
                <?php
                if (isset($_SESSION['data_pet'])) {
                    if (count($_SESSION['data_pet']) >= 1) { ?>
                        <button type="button" class="btn btn btn-mip" id="liveToastBtn">Ver mis mascotas</button>
                <?php }
                } ?>
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
                            <span style="text-align: left;">Mi nombe es
                                <input type="text" class="form-text" name="nombre" value=" <?php echo $nombre = isset($_SESSION['yo'][$_SESSION['id']]['NombreYo']) ? $_SESSION['yo'][$_SESSION['id']]['NombreYo'] : ' ' ?>" required>
                                ,vivo en la ciudad de
                                <input type="text" class="form-text" name="ciudad" value="<?php echo $ciudad = isset($_SESSION['yo'][$_SESSION['id']]['CiudadYo']) ? $_SESSION['yo'][$_SESSION['id']]['CiudadYo'] : ' ' ?>" required></span>

                            <span style="margin-top: 35px;">
                                Pueden contactarme para ampliar la información de mi mascota,
                            </span>

                            <span>
                                al correo eletrónico <input type="email" class="form-text" name="email" value=" <?php echo $email = isset($_SESSION['yo'][$_SESSION['id']]['EmailYo']) ? $_SESSION['yo'][$_SESSION['id']]['EmailYo'] : ' ' ?>" required> o también al teléfono <input type="number" maxlength="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-text" name="celular" value="<?php echo $celular = isset($_SESSION['yo'][$_SESSION['id']]['CelularYo']) ? $_SESSION['yo'][$_SESSION['id']]['CelularYo'] : ' ' ?>" required>
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
                        </div>
                        <div class="row">
                            <div class="col-6 cont-button-g">

                            </div>
                            <div class="col-6 cont-button-g">
                                <div class="button-g text-center">
                                    <button class="btn withe-y" type="submit" name="yo" value="yo">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-6 cont-button-g">
                    <div class="button-g text-center margin-top-50 regresar">
                        <?php
                        if (isset($_SESSION['data_pet'])) { ?>
                            <form action="#" method="POST">
                                <div class="button-g text-center">
                                    <button class="btn withe-l" type="submit" name="cancel" value="cancel">Cancelar <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
                                </div>
                            </form>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-6 cont-button-g">
                </div>
            </div>
        </div>
    </div>

    <!-- Vista del toast -->
    <div class="toast-container position-fixed bottom-0 start-0">
        <div id="liveToast" class="toast" role="alert" data-autohide="false" aria-live="assertive" aria-atomic="true">
            <div class="toast-header img-toast">
                <img src="<?php echo SERVERURL; ?>view/assets/img/icon_nav.png" class="rounded me-2">
                <strong class="me-auto">Mis mascotas</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <?php
                foreach ($_SESSION['data_pet'] as $row) { ?>
                    Nombre: <span style="color:#F07639  ;"><?php echo $row['Nombre_Pet']; ?></span>
                    &nbsp;
                    Tipo: <span style="color:#F07639  ;"><?php echo $row['Pet_Tipe']; ?></span>
                    </br>
                <?php  }
                ?>
            </div>
        </div>
    </div>
</div>

<!-- Inicio del escript -->
<script>
    // Función pra mostrar el modal o toast de las mascotas registradas
    const toastTrigger = document.getElementById('liveToastBtn')
    const toastLiveExample = document.getElementById('liveToast')
    if (toastTrigger) {
        toastTrigger.addEventListener('click', () => {
            const toast = new bootstrap.Toast(toastLiveExample)

            toast.show()
        })
    }

    // Función para cerrar la ventana de alerta
    window.setTimeout(function() {
        $(".alert-message").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
</script>