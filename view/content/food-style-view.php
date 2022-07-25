<?php
include "./model/mainModel.php";

$yo = new mainModel();

if (isset($_POST['food'])) {

    $food_style = $yo->limpiar_cadena($_POST['food-style']);

    $sessionSmg = "";

    if ($food_style == "") {

        $sessionSmg = "Todos los campos son obligatorios";
    } else {

        $_SESSION['food_style'][$_SESSION['id']] = [
            "food_style" => $food_style,
        ];
        header('Location:' . SERVERURL . 'food-type/');
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
                <form action="" method="post" class="forms-condiction">
                    <h2>Definiria el estilo de comer de <span class="color-test-h2">'<?php echo ucfirst($_SESSION['mi_pet'][$_SESSION['id']]['Name_Pet']); ?>'</span> como</h2>
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
                    <p class="text-20">Por favor seleccione la forma de comer de su mascota.</p>
                    <div class="row">
                        <div class="col">

                            <?php include_once './controller/registerData.php';
                            $dataPet = new registerData();
                            $data = $dataPet->consultaSimple("SELECT * FROM estilocomida");
                            ?>
                            <select class="form-select-condiction" name="food-style" value="<?php echo  $food_style = isset($_SESSION['food_style'][$_SESSION['id']]['food_style']) ? $_SESSION['food_style'][$_SESSION['id']]['food_style'] : ' ' ?>">
                                <?php foreach ($data as $key => $row) { ?>
                                    <option value="<?php echo $row['idEstilo'] ?>" selected><?php echo $row['estilo_nombre'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 cont-button-g">
                            <div class="button-g text-center margin-80 regresar">
                                <a class="btn" href="<?php echo SERVERURL; ?>weight/"> Atras <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></a>
                            </div>
                            <br><br>
                        </div>
                        <div class="col-6 cont-button-g">
                            <div class="button-g text-center margin-80">
                                <button class="btn withe-l" type="submit" name="food" value="food">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
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