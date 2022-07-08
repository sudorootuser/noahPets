<?php
include "./model/mainModel.php";

$yo = new mainModel();

if (isset($_POST['condiction'])) {

    $veterinary_check = $yo->limpiar_cadena($_POST['veterinary_check']);
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
                <span>¿Cómo califica la condición médica de <?php echo $_SESSION['mi_pet']['Name_Pet']; ?> su veterinario??</span>
                <div class="row">
                    <div class="row">
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="LEVE" id="veterinary_check" name="veterinary_check">
                                <label class="form-check-label" for="veterinary_check" checked>
                                    LEVE
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="MODERADA" id="veterinary_check" name="veterinary_check">
                                <label class="form-check-label" for="veterinary_check">
                                    MODERADA
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="AGUDA/CRÓNICA" id="veterinary_check" name="veterinary_check">
                                <label class="form-check-label" for="veterinary_check">
                                    AGUDA/CRÓNICA
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="PERRITO FELIZ" id="veterinary_check" name="veterinary_check">
                                <label class="form-check-label" for="veterinary_check">
                                    PERRITO FELIZ
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="PERRITO SENTADO" id="veterinary_check" name="veterinary_check">
                                <label class="form-check-label" for="veterinary_check">
                                    PERRITO SENTADO
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="PERRITO TRISTE" id="veterinary_check" name="veterinary_check">
                                <label class="form-check-label" for="veterinary_check">
                                    PERRITO TRISTE
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <span>Por favor adjunta los exámenes médicos más recientes de <?php echo $_SESSION['mi_pet']['Name_Pet']; ?></span>
                <br>
                <br>
                <input class="form-select-date" type="file" name="examen_file" id="">
                <br>
                <br>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col cont-button-g">
                        <div class="button-g">
                            <button class="btn btn" type="submit" name="condiction" value="condiction">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
                            <br>
                            <br>
                        </div>
                    </div>
                    <div class="col-2"></div>
                </div>
                </span>
            </form>
        </div>
        <div class="col-2"></div>
    </div>
</div>