<?php
include "./model/mainModel.php";

$yo = new mainModel();

if (isset($_POST['condiction'])) {


    $examen_file = $_FILES['examen_file']['name'];

    if (empty($_POST['check_option'])) {

        $sessionSmg = "Todos los campos son obligatorios ";
    } elseif ($examen_file == "") {
        $sessionSmg = "El documento es obligatorio";
    } else {

        $veterinary_check = $yo->limpiar_cadena($_POST['check_option']);

        $fileTmpPath = $_FILES['examen_file']['tmp_name'];
        $filename = $_FILES['examen_file']['name'];
        $fileSize = $_FILES['examen_file']['type'];
        $fileType = $_FILES['examen_file']['size'];
        $fileNameCmps = explode(".", $filename);
        $fileExtension = strtolower(end($fileNameCmps));

        $newFileName = md5(time() . $filename) . '.' . $fileExtension;

        $allowedfileExtensions = array('jpg', 'png', 'tiff', 'jpeg', 'pdf');

        if (in_array($fileExtension, $allowedfileExtensions)) {

            $uploadFileDir = './view/assets/documents/';
            $dest_path = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {

                $_SESSION['veterinary_qua'][$_SESSION['id']] = [
                    "veterinary_check" => $veterinary_check,
                    "newFileName" => $newFileName
                ];

                header('Location:' . SERVERURL . 'additional-condition/');
            } else {
                $sessionSmg = "Error!, el carge del documento no fue exitoso";
            }
        } else {
            $sessionSmg = "La extención del documento (<b>" . $filename . " <b>) no está permitida";
        }
    }
}
?>
<div class="container condiction" ondragstart="return false" onselectstart="return false" oncontextmenu="return false">
    <div class="row">
        <div class="col-3">
            <div class="fondo-image-div margin-50">

            </div>
        </div>
        <div class="col-9">
            <div>
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
                    <div class="row">
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="Leve" id="Leve" name="check_option"><br>
                                <label class="form-check-label" for="Leve">
                                    Estado Leve
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="Moderada" id="Moderada" name="check_option"><br>
                                <label class="form-check-label" for="Moderada">
                                    Moderada
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="Aguda/Crónica" id="Crónica" name="check_option"><br>
                                <label class="form-check-label" for="Crónica">
                                    Aguda/Crónica
                                </label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="Perrito Felíz" id="Perrito" name="check_option"><br>
                                <label class="form-check-label" for="Perrito">
                                    Perrito Felíz
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="Perrito Sentado" id="PerritoSentado" name="check_option"><br>
                                <label class="form-check-label" for="PerritoSentado">
                                    Perrito Sentado
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="Perrito Triste" id="Triste" name="check_option"><br>
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
                            <input class="form-control form-select-vet" type="file" name="examen_file" id="">
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-6 cont-button-g">
                            <div class="button-g text-center margin-50 regresar">
                                <a class="btn" href="<?php echo SERVERURL; ?>medical-condition/"> Atras <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></a>
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