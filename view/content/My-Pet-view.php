<?php
// Conexión a la db y funciones
include "./model/mainModel.php";

$yo = new mainModel();

// Se valida que las sessiones esten iniciadas
include_once './controller/controllerOperaction.php';

$lo_out = new controllerOperation();
$lo_out->serrar_sesion();

// Validación para mostrar la data si ya guardo en sesion
if (isset($_SESSION['mi_pet'][$_SESSION['id']]['Name_Pet'])) {
    $name_pet = $_SESSION['mi_pet'][$_SESSION['id']]['Name_Pet'];
}

if (isset($_SESSION['mi_pet'][$_SESSION['id']]['Name_Pet'])) {
    $pet_type = $_SESSION['mi_pet'][$_SESSION['id']]['Pet_Type'];
} else {
    $pet_type = 'No aplica';
}

// Condición para procesar la data del formulario
if (isset($_POST['mi-pet'])) {

    $sessionSmg = "";

    $name_pet = $yo->limpiar_cadena($_POST['name_pet']);
    $pet_type = $yo->limpiar_cadena($_POST['pet_type']);

    // Se valida que los campos no esten vacios
    if ($name_pet == ''  || $pet_type == '') {

        $sessionSmg = "Debe escribir el nombre y seleccionar el tipo de mascota";
    } else {

        $_SESSION['mi_pet'][$_SESSION['id']] = [
            "Name_Pet" => $name_pet,
            "Pet_Type" => $pet_type
        ]; ?>

        <script>
            window.location.replace("<?php echo SERVERURL . 'condiction/' ?>");
        </script>
<?php
    }
}
?>
<div class="container My-Pet" ondragstart="return false" onselectstart="return false" oncontextmenu="return false">
    <div class="row">
        <div class="col-3">
            <div class="fondo-image-div">

            </div>
        </div>
        <div class="col-9">
            <div>
                <form action="" method="post" class="forms-my-pet">

                    <p class="form-yo font-size-26">Hola <span class="nombre-User">'<?php echo $_SESSION['yo'][$_SESSION['id']]['NombreYo']; ?>'</span> . Ahora cuéntanos de tu mascota.</p>
                    <?php
                    if (isset($sessionSmg)) {
                        if ($sessionSmg != '') {
                    ?>
                            <div class="alert alert-warning alert-dismissible fade show text-center alert-message " role="alert">
                                <?php echo $sessionSmg; ?>
                            </div>
                    <?php
                        }
                    } ?>

                    <p class="text-my-pet margin-80">Mi masota se llama

                        <input type="text" class="form-text" name="name_pet" value="<?php echo $name_pet =  !empty($name_pet) ? $name_pet : '' ?>" required> y es un

                        <select class="form-select-my-pet" name="pet_type" required>
                            <option value="">Seleccione...</option>
                            <option value="Gato" <?php echo $Gato =  $pet_type == 'Gato' ? 'selected' : '' ?>>Gato</option>
                            <option value="Perro" <?php echo $Perro =  $pet_type == 'Perro' ? 'selected' : '' ?>>Perro</option>
                        </select>
                    </p>

                    <div class="row">
                        <div class="col-6 cont-button-g">
                            <div class="button-g text-center margin-80 regresar">
                                <a class="btn" href="<?php echo SERVERURL; ?>Yo/"> Atras <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></a>
                            </div>
                            <br><br>
                        </div>
                        <div class="col-6 cont-button-g">
                            <div class="button-g text-center margin-80">
                                <button class="btn withe-l" type="submit" name="mi-pet" value="mi-pet">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
                            </div>
                        </div>
                    </div>
                    </span>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Inicio del escript -->
<script>
    // Función para cerrar la ventana de alerta
    window.setTimeout(function() {
        $(".alert-message").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
</script>