<?php
// Conexión a la db y funciones
include "./model/mainModel.php";

$yo = new mainModel();

// Se valida que las sessiones esten iniciadas
include_once './controller/controllerOperaction.php';

$lo_out = new controllerOperation();
$lo_out->serrar_sesion();

// Condición para procesar la data del formulario
if (isset($_POST['checkout'])) {
    $sessionSmg = "";

    $nombres = $yo->limpiar_cadena($_POST['nombres']);
    $apellidos = $yo->limpiar_cadena($_POST['apellidos']);
    $password = $yo->limpiar_cadena($_POST['password']);
    $passwd_2 = $yo->limpiar_cadena($_POST['passwd_2']);
    $direccion = $yo->limpiar_cadena($_POST['direccion']);
    $apart_casa = $yo->limpiar_cadena($_POST['apart/casa']);
    $apartamentro = $yo->limpiar_cadena($_POST['apartamentro']);
    $ciudad = $yo->limpiar_cadena($_POST['ciudad']);

    if ($nombres == "" || $apellidos == "" || $password == "" || $passwd_2 == "" || $direccion == "" || $apart_casa == "" || $ciudad == "" || $apartamentro == "") {

        $sessionSmg = "Todos los campos son obligatorios";
    } elseif ($password != $passwd_2) {
        $sessionSmg = "La contraseña no coincide";
    } else {

        $userData = [
            'nombre' => $nombres,
            'apellido' => $apellidos,
            'password' => $password,
            'passwd2' => $passwd_2,
            'direccion' => $direccion,
            'apartCasa' => $apart_casa,
            'apartamento' => $apartamentro,
            'ciudad' => $ciudad
        ];
        $_SESSION['userData'] = $userData; ?>
        <script>
            window.location.replace("<?php echo SERVERURL . 'to-pay/' ?>");
        </script>
<?php
    }
} ?>

<div class="container condiction" ondragstart="return false" onselectstart="return false" oncontextmenu="return false">
    <div class="row">
        <div class="col-3">
            <div class="fondo-image-div margin-50">

            </div>
        </div>
        <div class="col-9">
            <form action="" method="post" class="forms-checkout" autocomplete="off">
                <?php
                if (isset($sessionSmg)) {
                    if ($sessionSmg != '') { ?>
                        <div class="alert alert-warning alert-dismissible fade show text-center alert-message mt-3" role="alert">
                            <?php echo $sessionSmg; ?>
                        </div>
                <?php }
                } ?>
                <div class="row">
                    <p class="text-20">Cuenta de usuario</p>
                    <hr>
                    <div class="col-6">
                        <input type="text" class="form-text-checkout" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombres" name="nombres" value="<?php echo $data = isset($nombres) ? $nombres : '' ?>">
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-text-checkout" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Apellidos" name="apellidos" value="<?php echo $data = isset($apellidos) ? $apellidos : '' ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="input-group">
                            <input type="password" class="form-text-checkout-pass" id="password" aria-describedby="emailHelp" placeholder="Contraseña" name="password" value="<?php echo $data = isset($password) ? $password : '' ?>">
                            <button id="show_password" class="btn btn-dark ver_password" type="button" onclick="mostrarPassword()"> <i class="bi bi-eye-fill"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group">
                            <input type="password" class="form-text-checkout-pass" id="password1" aria-describedby="emailHelp" placeholder="Confirmación contraseña" name="passwd_2" value="<?php echo $data = isset($passwd_2) ? $passwd_2 : '' ?>">
                            <button id="show_password" class="btn btn-dark ver_password" type="button" onclick="mostrarPassword1()"> <i class="bi bi-eye-fill"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <p class="text-20">Dirección</p>
                    <hr>
                    <div class="col-6">
                        <input type="text" class="form-text-checkout" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Dirección" name="direccion" name="passwd_2" value="<?php echo $data = isset($direccion) ? $direccion : '' ?>">
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-text-checkout" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Apartamento / Casa" name="apart/casa" value="<?php echo $data = isset($apart_casa) ? $apart_casa : '' ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <input type="text" class="form-text-checkout" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ciudad" name="ciudad" value="<?php echo $data = isset($ciudad) ? $ciudad : '' ?>">
                    </div>
                    <div class="col-6">
                        <?php include_once './controller/registerData.php';
                        $dataPet = new registerData();
                        $data = $dataPet->consultaSimple("SELECT * FROM departamento");
                        ?>
                        <select class="form-text-checkout-dp" name="apartamentro">
                            <option value="" selected>Seleccione el departamento...</option>
                            <?php foreach ($data as $key => $row) { ?>
                                <option value="<?php echo $row['idDepartamento'] ?>"><?php echo $row['departamento_nombre'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-6 cont-button-g">
                        <div class="button-g text-center margin-50 regresar">
                            <a class="btn" href="<?php echo SERVERURL; ?>veterinary-qualification/"> Atras <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></a>
                        </div>
                        <br>
                    </div>
                    <div class="col-6 cont-button-g">
                        <div class="button-g text-center margin-50">
                            <button class="btn withe-l" type="submit" name="checkout" value="checkout">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-1"></div>
    </div>
</div>

<!-- Inicio del escript -->
<script type="text/javascript">
    function mostrarPassword() {
        var cambio = document.getElementById("password");
        if (cambio.type == "password") {
            cambio.type = "text";
            $('.bi').removeClass('bi bi-eye-slash-fill').addClass('bi bi-eye-fill');
        } else {
            cambio.type = "password";
            $('.bi').removeClass('bi bi-eye-fill').addClass('bi bi-eye-slash-fill');
        }
    }

    function mostrarPassword1() {
        var cambio = document.getElementById("password1");
        if (cambio.type == "password") {
            cambio.type = "text";
            $('.bi').removeClass('bi bi-eye-slash-fill').addClass('bi bi-eye-fill');
        } else {
            cambio.type = "password";
            $('.bi').removeClass('bi bi-eye-fill').addClass('bi bi-eye-slash-fill');
        }
    }

    // Función para cerrar la ventana de alerta
    window.setTimeout(function() {
        $(".alert-message").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
</script>