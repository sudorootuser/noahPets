<?php

// Conexión a la db y funciones
include "./model/mainModel.php";

$yo = new mainModel();

// Se valida que las sessiones esten iniciadas
include_once './controller/controllerOperaction.php';

$lo_out = new controllerOperation();
// $lo_out->peso

$lo_out->serrar_sesion();

$physical_activity = $_SESSION['physical_activity'][$_SESSION['id']]['physical_activity'];
$physical_build = $_SESSION['physical_build'][$_SESSION['id']]['physical_build'];

// Validación para mostrar la data si ya guardo en sesion
if (isset($_SESSION['snacks'][$_SESSION['id']]['snacks'])) {
    $snacks = $_SESSION['snacks'][$_SESSION['id']]['snacks'];
} else {
    $snacks = 'No aplica';
}

// Condición para procesar la data del formulario
if (isset($_POST['snack'])) {

    $snacks = $yo->limpiar_cadena($_POST['type_snack']);

    $sessionSmg = "";

    if ($snacks == "") {

        $sessionSmg = "Debe selecionar el tipo de consumo del Snack de su mascota!";
    } else {

        $_SESSION['snacks'][$_SESSION['id']] = [
            "snacks" => $snacks,
        ]; ?>

        <script>
            window.location.replace("<?php echo SERVERURL . 'alimentary-intolerance/' ?>");
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
            <form action="" method="post" class="forms-condiction">
                <h2>Definiria el consumo de Snack de <span class="color-test-h2">'<?php echo ucfirst($_SESSION['mi_pet'][$_SESSION['id']]['Name_Pet']); ?>'</span> como</h2>
                <?php
                if (isset($sessionSmg)) {
                    if ($sessionSmg != '') {
                ?>
                        <div class="alert alert-warning alert-dismissible fade show text-center alert-message " role="alert">
                            <?php echo $sessionSmg; ?>
                        </div>
                <?php
                    }
                }
                ?>
                <p class="text-20">Por favor seleccione el consumo de Snacks de su mascota.</p>
                <div class="row">
                    <div class="col">
                        <select class="form-select-condiction" name="type_snack">
                            <option value="">Seleccione...</option>
                            <?php if ($_SESSION['mi_pet'][$_SESSION['id']]['Pet_Type'] != 'Gato') { ?>
                                <!-- Validación para controlar que sea un perro -->
                                <option value="Bastante" <?php echo $snacks == 'Bastante' ? 'selected' : '' ?>>Bastante</option>
                                <?php if (!($physical_build == "Ideal" && $physical_activity == "Poco Activo")) { ?>
                                    <option value="Ocasional" <?php echo $snacks == 'Ocasional' ? 'selected' : '' ?>>Ocasional</option>
                                <?php } ?>
                                <option value="Nunca" <?php echo $snacks == 'Nunca' ? 'selected' : '' ?>>Nunca</option>
                                <?php } else {

                                // Condición para validar que es un gato y el tipo de condicion fisica y condicionar el tipo de snack
                                if ($_SESSION['physical_build'][$_SESSION['id']]['physical_build'] != 'Delgado') { ?>

                                    <option value="Nunca" <?php echo $snacks == 'Nunca' ? 'selected' : '' ?>>Nunca</option>
                                <?php } else { ?>

                                    <option value="Bastante" <?php echo $snacks == 'Bastante' ? 'selected' : '' ?>>Bastante</option>
                                    <?php if (!($physical_build == "Ideal" && $physical_activity == "Poco Activo")) { ?>
                                        <option value="Ocasional" <?php echo $snacks == 'Ocasional' ? 'selected' : '' ?>>Ocasional</option>
                                    <?php } ?>
                                    <option value="Nunca" <?php echo $snacks == 'Nunca' ? 'selected' : '' ?>>Nunca</option>
                            <?php  }
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 cont-button-g">
                        <div class="button-g text-center margin-80 regresar">
                            <?php if ($_SESSION['mi_pet'][$_SESSION['id']]['Pet_Type'] != 'Gato') { ?>
                                <a class="btn" href="<?php echo SERVERURL; ?>physical-activity/"> Atras <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></a>
                            <?php } else { ?>
                                <a class="btn" href="<?php echo SERVERURL; ?>physical-build/"> Atras <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></a>
                            <?php } ?>
                        </div>
                        <br><br>
                    </div>
                    <div class="col-6 cont-button-g">
                        <div class="button-g text-center margin-80">
                            <button class="btn withe-l" type="submit" name="snack" value="snack">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-2"></div>
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