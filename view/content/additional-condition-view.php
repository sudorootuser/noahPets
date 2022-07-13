<?php
include "./model/mainModel.php";

$yo = new mainModel();

if (isset($_POST['condiction'])) {

    $additional_check = $yo->limpiar_cadena($_POST['additional_check']);

    $sessionSmg = "";

    if ($additional_check == "") {

        $sessionSmg = "Todos los campos son obligatorios";
    } else {

        $_SESSION['additional'] = [
            "additional_check" => $additional_check
        ];
        header('Location:' . SERVERURL . 'loading/');
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
                        <strong>Error! </strong><?php echo $sessionSmg; ?><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
            <?php
                }
            }
            ?>
            <form action="" method="post" class="forms-condiction">
                <span>¿<?php echo ucfirst($_SESSION['mi_pet']['Name_Pet']); ?> tiene una condición médica adicional?</span>
                <div class="row">
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="Sí" id="additional_check" name="additional_check">
                            <label class="form-check-label" for="additional_check" style="font-size:28px;">
                                SÍ
                            </label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="No" id="additional_check" name="additional_check">
                            <label class="form-check-label" for="additional_check" style="font-size:28px;">
                                NO
                            </label>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-12">
                        <textarea style="border: 2px solid #F07639; width: 100%; font-size: 25px; font-weight: 600; color: #7a7a7a; border-radius: 20px; display: none;" class="form-text" name="check_textarea" id="text_area" rows="7" placeholder="Describe la condición adicional de tu mascota!"></textarea>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col cont-button-g">
                        <div class="button-g">
                            <button class="btn btn" type="submit" name="condiction" value="condiction">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
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
<script type="text/javascript">
    $(document).ready(function() {
        $(".form-check-input").click(function(evento) {

            var valor = $(this).val();

            if (valor == 'Sí') {
                $("#text_area").css("display", "block");
            } else {

                $("#text_area").css("display", "none");
            }
        });
    });
</script>