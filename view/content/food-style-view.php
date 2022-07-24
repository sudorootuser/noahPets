<?php
include "./model/mainModel.php";

$yo = new mainModel();

if (isset($_POST['food'])) {

    $food_style = $yo->limpiar_cadena($_POST['food-style']);


    $sessionSmg = "";

    if ($food_style == "") {

        $sessionSmg = "Todos los campos son obligatorios";
    } else {

        $_SESSION['food_style'] = [
            "food_style" => $food_style,
        ];
        header('Location:' . SERVERURL . 'food-type/');
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
            <div style="padding: 3% 15% 0px 15%;">

                <form action="" method="post" class="forms-condiction">
                    <span>Definiria el estilo de comer de <?php echo ucfirst($_SESSION['mi_pet']['Name_Pet']); ?> como</span>
                    <br>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col">

                            <?php include_once './controller/registerData.php';
                            $dataPet = new registerData();
                            $data = $dataPet->consultaSimple("SELECT * FROM estilocomida");
                            ?>
                            <select class="form-select-condiction" name="food-style" value="<?php echo  $food_style = isset($food_style) ? $food_style : ' ' ?>">
                                <?php foreach ($data as $key => $row) { ?>
                                    <option value="<?php echo $row['idEstilo'] ?>" selected><?php echo $row['estilo_nombre'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col cont-button-g">
                            <div class="button-g">
                                <button class="btn btn" type="submit" name="food" value="food">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    </span>
                </form>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
</div>