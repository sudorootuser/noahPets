<?php
include "./model/mainModel.php";

$yo = new mainModel();

if (isset($_POST['checkout'])) {

    $nombres = $yo->limpiar_cadena($_POST['nombres']);
    $apellidos = $yo->limpiar_cadena($_POST['apellidos']);
    $password = $yo->limpiar_cadena($_POST['password']);
    $passwd_2 = $yo->limpiar_cadena($_POST['passwd_2']);
    $direccion = $yo->limpiar_cadena($_POST['direccion']);
    $apart_casa = $yo->limpiar_cadena($_POST['apart/casa']);
    $apartamentro = $yo->limpiar_cadena($_POST['apartamentro']);
    $ciudad = $yo->limpiar_cadena($_POST['ciudad']);

    $sessionSmg = "";

    if ($nombres == "" || $apellidos == "" || $password == "" || $passwd_2 == "" || $direccion == "" || $apart_casa == "" || $ciudad == "" || $apartamentro == "") {

        $sessionSmg = "Todos los campos son obligatorios";
    } elseif ($password != $passwd_2) {
        $sessionSmg = "La contraseña no coincide";
    } else {

        $_SESSION['userData'] = [
            "nombres" => $nombres,
            "apellidos" => $apellidos,
            "password" => $password,
            "passwd_2" => $passwd_2,
            "direccion" => $direccion,
            "apart_casa" => $apart_casa,
            "apartamentro" => $apartamentro,
            "ciudad" => $ciudad
        ];
        header('Location:' . SERVERURL . 'to-pay/');
    }
} ?>
<div class="container-fluid condiction" ondragstart="return false" onselectstart="return false" oncontextmenu="return false">
    <div class="row">
        <div class="col-1"></div>
        <div class="col">
            <form action="" method="post" class="forms-checkout">
                <div class="row">
                    <?php
                    if (isset($sessionSmg)) {
                        if ($sessionSmg != '') {
                    ?>
                            <div class="alert alert-warning alert-dismissible fade show text-center alert-message mt-3" role="alert">
                                <?php echo $sessionSmg; ?>
                            </div>
                    <?php }
                    } ?>
                    <span>Cuenta de usuario</span>
                    <div class="col-6">
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombres" name="nombres" value="<?php echo $data = isset($nombres) ? $nombres : '' ?>">
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Apellidos" name="apellidos" value="<?php echo $data = isset($apellidos) ? $apellidos : '' ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Contraseña" name="password" value="<?php echo $data = isset($password) ? $password : '' ?>">
                    </div>
                    <div class="col-6">
                        <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Confirmación contraseña" name="passwd_2" value="<?php echo $data = isset($passwd_2) ? $passwd_2 : '' ?>">
                    </div>
                </div>
                <div class="row">
                    <span>Dirección</span>
                    <div class="col-6">
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Dirección" name="direccion" name="passwd_2" value="<?php echo $data = isset($direccion) ? $direccion : '' ?>">
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Apartamento / Casa" name="apart/casa" value="<?php echo $data = isset($apart_casa) ? $apart_casa : '' ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Departamento" placeholder="apartamentro " name="apartamentro" value="<?php echo $data = isset($apartamentro) ? $apartamentro : '' ?>">
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ciudad" name="ciudad" value="<?php echo $data = isset($ciudad) ? $ciudad : '' ?>">
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col cont-button-g">
                        <div class="button-g">
                            <button class="btn btn" type="submit" name="checkout" value="checkout">Pagar <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
                            <br>
                            <br>
                        </div>
                    </div>
                    <div class="col-2"></div>
                </div>
            </form>
        </div>
        <div class="col-1"></div>
    </div>
</div>
<script>
    window.setTimeout(function() {
        $(".alert-message").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
</script>