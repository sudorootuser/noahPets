<?php
// Conexión a la db y funciones
include "./model/mainModel.php";

$yo = new mainModel();

// Se valida que las sessiones esten iniciadas
include_once './controller/controllerOperaction.php';

$lo_out = new controllerOperation();
$lo_out->serrar_sesion();

// Validación para mostrar la data si ya guardar en sesion
if (!empty($_SESSION['veterinary_qua'][$_SESSION['id']]['veterinary_check'])) {

    $veterinary_check = $_SESSION['veterinary_qua'][$_SESSION['id']]['veterinary_check'];
    $examen_file = $_SESSION['veterinary_qua'][$_SESSION['id']]['newFileName'];
    $extenFile = $_SESSION['veterinary_qua'][$_SESSION['id']]['extenFile'];
} else {

    $veterinary_check = '';
    $extenFile = '';
    $examen_file = '';
}

// Condición para procesar la data del formulario
if (isset($_POST['condiction'])) {

    if (empty($examen_file)) {
        $examen_file = $_FILES['examen_file']['name'];
    }
    if (empty($_POST['check_option'])) {

        $sessionSmg = "Debe seleccionar al menos una condición medica!";
    } elseif ($examen_file == "") {
        $sessionSmg = "El documento es obligatorio!";
    } else {

        $veterinary_check = $yo->limpiar_cadena($_POST['check_option']);

        $fileTmpPath = $_FILES['examen_file']['tmp_name'];
        $filename = $_FILES['examen_file']['name'];
        $fileSize = $_FILES['examen_file']['type'];
        $fileType = $_FILES['examen_file']['size'];
        $fileNameCmps = explode(".", $filename);
        $fileExtension = strtolower(end($fileNameCmps));

        $newFileName = md5(time() . $filename) . '.' . $fileExtension;

        $allowedfileExtensions = array('pdf', 'jpg');

        // echo $extenFile;die;
        if (empty($extenFile)) {

            if (!in_array($fileExtension, $allowedfileExtensions)) {
                $sessionSmg = "La extención del documento (<b>" . $filename . " </b>) no está permitida, (Extenciones permitidas <b>PDF y JPG</b>)";
            } else {
                $file_true = true;
            }
        } else {

            $fileExtension = $extenFile;
            $file_true = true;
        }

        if (!empty($file_true)) {

            $uploadFileDir = './view/assets/documents/';
            $dest_path = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {

                $_SESSION['veterinary_qua'][$_SESSION['id']] = [
                    "veterinary_check" => $veterinary_check,
                    "newFileName" => $newFileName,
                    "extenFile" => $fileExtension
                ];

                // Formulario de Associated-symptoms
                $_SESSION['associated_sympt'][$_SESSION['id']] = [
                    "check_diarrea" => '',
                    "check_vomito" => '',
                    "check_gases" => '',
                    "check_mal_aliento" => '',
                    "check_caida_pelo" => '',
                    "check_picazon" => '',
                    "check_pelo_opaco" => '',
                    "check_convulsiones" => '',
                    "check_dolor_articulas" => '',
                    "check_desanimo" => '',
                    "check_ayuno_prol" => '',
                    "check_otro" => '',
                    "check_textarea" => ''
                ]; ?>

                <script>
                    window.location.replace("<?php echo SERVERURL . 'additional-condition/' ?>");
                </script>
            <?php
            } else {

                $_SESSION['veterinary_qua'][$_SESSION['id']] = [
                    "veterinary_check" => $veterinary_check,
                    "newFileName" => $newFileName,
                    "extenFile" => $fileExtension
                ];

                // Formulario de Associated-symptoms
                $_SESSION['associated_sympt'][$_SESSION['id']] = [
                    "check_diarrea" => '',
                    "check_vomito" => '',
                    "check_gases" => '',
                    "check_mal_aliento" => '',
                    "check_caida_pelo" => '',
                    "check_picazon" => '',
                    "check_pelo_opaco" => '',
                    "check_convulsiones" => '',
                    "check_dolor_articulas" => '',
                    "check_desanimo" => '',
                    "check_ayuno_prol" => '',
                    "check_otro" => '',
                    "check_textarea" => ''
                ]; ?>

                <script>
                    window.location.replace("<?php echo SERVERURL . 'additional-condition/' ?>");
                </script>
<?php
            }
        }
    }
} ?>

<div class="container condiction" ondragstart="return false" onselectstart="return false" oncontextmenu="return false">
    <div class="row">
        <div class="col-3">
            <div class="fondo-image-div margin-50">

            </div>
        </div>
        <div class="col-9">
            <form action="#" method="POST" class="forms-condiction" enctype="multipart/form-data">

                <h2>Cómo califica la condición médica de <span class="color-test-h2">'<?php echo ucfirst($_SESSION['mi_pet'][$_SESSION['id']]['Name_Pet']); ?>'</span> segun su veterinario?</h2>
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
                <p class="text-20">Por favor seleccione una condición medica para su mascota.</span></p>
                <br>
                <br>
                <!-- Primera session -->
                <div class="row">
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="Leve" id="Leve" name="check_option" <?php echo $veterinary_check == 'Leve' ? 'checked' : '' ?>><br>
                            <label class="form-check-label" for="Leve">
                                Estado Leve
                            </label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="Moderada" id="Moderada" name="check_option" <?php echo $var = $veterinary_check == 'Moderada' ? 'checked' : '' ?>><br>
                            <label class="form-check-label" for="Moderada">
                                Moderada
                            </label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="Aguda/Crónica" id="Crónica" name="check_option" <?php echo $veterinary_check == 'Aguda/Crónica' ? 'checked' : '' ?>><br>
                            <label class="form-check-label" for="Crónica">
                                Aguda/Crónica
                            </label>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <!-- Segunda session -->
                <div class="row">
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="Perrito Felíz" id="Perrito" name="check_option" <?php echo $veterinary_check == 'Perrito Felíz' ? 'checked' : '' ?>><br>
                            <label class="form-check-label" for="Perrito">
                                Perrito Felíz
                            </label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="Perrito Sentado" id="PerritoSentado" name="check_option" <?php echo $veterinary_check == 'Perrito Sentado' ? 'checked' : '' ?>><br>
                            <label class="form-check-label" for="PerritoSentado">
                                Perrito Sentado
                            </label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="Perrito Triste" id="Triste" name="check_option" <?php echo $veterinary_check == 'Perrito Triste' ? 'checked' : '' ?>><br>
                            <label class="form-check-label" for="Triste">
                                Perrito Triste
                            </label>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <p>Por favor adjunta los exámenes médicos más recientes de <span class="color-test-h5">'<?php echo ucfirst($_SESSION['mi_pet'][$_SESSION['id']]['Name_Pet']); ?>'</span></p>
                <br>
                <br>
                <div class="row">
                    <div class="col">
                        <input class="form-control form-select-vet" type="file" name="examen_file">
                        <span style="margin-left: -20%;">Nombre del documento: <b style="color: #F07639;"> <?php echo $examen_file ?></b></span>
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-6 cont-button-g">
                        <!-- <div class="button-g text-center margin-50 regresar">
                                <a class="btn" href="<?php echo SERVERURL; ?>medical-condition/"> Atras <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></a>
                            </div> -->
                        <div class="button-g text-center margin-50 regresar">
                            <!-- <a class="btn" href="<?php echo SERVERURL; ?>associated-symptoms"> Atras <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></a> -->
                            <a class="btn" href="<?php echo SERVERURL; ?>medical-condition"> Atras <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></a>
                        </div>
                        <br>
                    </div>
                    <div class="col-6 cont-button-g">
                        <div class="button-g text-center margin-50">
                            <button class="btn withe-l" type="submit" name="condiction" value="condiction">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
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
        $(".alert-message").fadeTo(600, 0).slideUp(600, function() {
            $(this).remove();
        });
    }, 3000);
</script>