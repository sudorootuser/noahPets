<?php
include "./model/mainModel.php";

$yo = new mainModel();

if (isset($_POST['condiction'])) {

    $veterinary_check = $yo->limpiar_cadena($_POST['check_option']);
    $examen_file = $_FILES['examen_file']['name'];

    $sessionSmg = "";

    if ($veterinary_check == "" || $examen_file == "") {

        $sessionSmg = "Todos los campos son obligatorios / El documento es obligatorio";
    } else {

        $_SESSION['veterinary'] = [
            "veterinary_check" => $veterinary_check,
            "examen_file" => $examen_file
        ];
        header('Location:' . SERVERURL . 'additional-condition/');
    }
} ?>
<div class="container-fluid condiction">
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
            <form action="" method="post" class="forms-condiction" enctype="multipart/form-data">
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
                            <input class="form-check-input" type="radio" value="Perrito Feliz" id="type_food" name="check_option" checked>
                            <label class="form-check-label" for="type_food" >
                                Perrito Feliz
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