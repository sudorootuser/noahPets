<?php
if (isset($_POST['mi-pet'])) {

    $nombre = $yo->limpiar_cadena($_POST['nombre']);
    $ciudad = $yo->limpiar_cadena($_POST['ciudad']);
    $email = $yo->limpiar_cadena($_POST['email']);
    $celular = $yo->limpiar_cadena($_POST['celular']);
    $celular = $yo->limpiar_cadena($_POST['celular']);
    $sessionSmg = "";

    if ($nombre == "" || $ciudad == "" || $email == "" || $celular == "") {

        $sessionSmg = "Todos los campos son obligatorios";
    } elseif (!isset($_POST['check'])) {
        $sessionSmg = "Los terminos y condiciones son obligatorios";
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

<div class="container-fluid My-Pet">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <form action="" method="post" class="forms-my-pet">
                <span>Hola <input type="text" class="form-text" value="<?php echo $_SESSION['yo']['NombreYo'];?>">. Ahora cuéntanos de tu mascota.</span>
                <br>
                <br>
                <span>Mi masota se llama <input type="text" class="form-text"> y es un </span>
                <select class="form-select-my-pet">
                    <option selected>...</option>
                    <option value="gato">gato</option>
                    <option value="perro">perro</option>
                </select>
                <br>
                <br>
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col cont-button-mi-pet">
                        <div class="button-my-pet">
                            <a href="<?php echo SERVERURL; ?>condiction/">Siguiente <img class='mi-pet-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"> </a>
                        </div>
                    </div>
                    <div class="col-4"></div>
                </div>
                </span>
            </form>
        </div>
        <div class="col-2"></div>
    </div>
</div>