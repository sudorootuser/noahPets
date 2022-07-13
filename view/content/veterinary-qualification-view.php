<?php
include "./model/mainModel.php";

$yo = new mainModel();

if (isset($_POST['condiction'])) {

    $veterinary_check = $yo->limpiar_cadena($_POST['check_option']);

    $examen_file = $_FILES['examen_file']['name'];

    if ($veterinary_check == "" || !isset($examen_file) || $examen_file == "") {

        $sessionSmg = "Todos los campos son obligatorios / El documento es obligatorio";
    } else {

        $fileTmpPath = $_FILES['examen_file']['tmp_name'];
        $filename = $_FILES['examen_file']['name'];
        $fileSize = $_FILES['examen_file']['type'];
        $fileType = $_FILES['examen_file']['size'];
        $fileNameCmps = explode(".", $filename);
        $fileExtension = strtolower(end($fileNameCmps));

        $newFileName = md5(time() . $filename) . '.' . $fileExtension;

        $allowedfileExtensions = array('doc', 'zip', 'rar', 'xls', 'png', 'jpg', 'jpng', 'xlsx');

        if (in_array($fileExtension, $allowedfileExtensions)) {

            $uploadFileDir = './view/assets/documents/';
            $dest_path = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {

                $_SESSION['veterinary_qua'] = [
                    "veterinary_check" => $veterinary_check,
                    "newFileName" => $newFileName
                ];

                header('Location:' . SERVERURL . 'additional-condition/');
            } else {
                $sessionSmg = "Error!, el carge del documento no fue exitoso";
            }
        } else {
            $sessionSmg = "La extención del documento no está permitida";
        }
    }
} ?>
<div class="container-fluid condiction" ondragstart="return false" onselectstart="return false" oncontextmenu="return false">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
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
            <form action="#" method="POST" class="forms-condiction" enctype="multipart/form-data">
                <span>¿Cómo califica la condición médica de <?php echo ucfirst($_SESSION['mi_pet']['Name_Pet']); ?> su veterinario?</span>
                <br>
                <br>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="Leve" id="type_food" name="check_option">
                            <label class="form-check-label" for="type_food">
                                Estado Leve
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="Moderada" id="type_food" name="check_option">
                            <label class="form-check-label" for="type_food">
                                Moderada
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="Aguda/Crónica" id="type_food" name="check_option">
                            <label class="form-check-label" for="type_food">
                                Aguda/Crónica
                            </label>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="Perrito Felíz" id="type_food" name="check_option" checked>
                            <label class="form-check-label" for="type_food">
                                Perrito Felíz
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="Perrito Sentado" id="type_food" name="check_option">
                            <label class="form-check-label" for="type_food">
                                Perrito Sentado
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="Perrito Triste" id="type_food" name="check_option">
                            <label class="form-check-label" for="type_food">
                                Perrito Triste
                            </label>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <span>Por favor adjunta los exámenes médicos más recientes de <?php echo ucfirst($_SESSION['mi_pet']['Name_Pet']); ?></span>
                <br>
                <br>
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm">
                        <input class="form-control form-select-vet" type="file" name="examen_file" id="">
                    </div>
                    <div class="col-sm-2"></div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col cont-button-g">
                        <div class="button-g">
                            <button class="btn btn" type="submit" name="condiction" value="condiction">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
                            <br>
                            <br>
                        </div>
                    </div>
                    <div class="col-1"></div>
                </div>
            </form>
        </div>
        <div class="col-2"></div>
    </div>
</div>