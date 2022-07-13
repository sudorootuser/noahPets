<?php
include "./model/mainModel.php";

$yo = new mainModel();

if (isset($_POST['condiction'])) {

    // $additional_check = $yo->limpiar_cadena($_POST['additional_check']);

    // $sessionSmg = "";

    // if ($additional_check == "") {

    //     $sessionSmg = "Todos los campos son obligatorios";
    // } else {

        $_SESSION['additional'] = [
            "additional_check" => $additional_check
        ];
        header('Location:' . SERVERURL . 'diet/');
    // }
} ?>
<div class="container-fluid condiction" ondragstart="return false" onselectstart="return false" oncontextmenu="return false">
    <div class="row">
        <div class="col-1"></div>
        <div class="col">
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
                <span>Teniendo en cuenta la información entregada, diseñamos
                    varias opciones perfectas para <?php echo $_SESSION['mi_pet']['Name_Pet']; ?>.
                    <br>Selecciona la que más te guste</span>
                <br>
                <br>
                <div class="row">
                    <div class="col-4">
                        <span>IDEAL</span>
                    </div>
                    <div class="col-4">
                        <span>Alimento</span>
                    </div>
                    <div class="col-4">
                    </div>
                </div>
                <div class="row">
                    <div class="col food-balance">
                        <div class="card" style="width: 18rem;">
                            <img src="<?php echo SERVERURL ?>view/assets/img/Balance_res.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <a style="background-color: #F07639; color: #ffff;" href="#" class="btn">CARNE</a>
                            </div>
                        </div>
                    </div>
                    <div class="col food-balance">
                        <div class="card" style="width: 18rem;">
                            <img src="<?php echo SERVERURL ?>view/assets/img/Balance_pollo.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <a style="background-color: #F07639; color: #ffff;" href="#" class="btn">POLLO</a>
                            </div>
                        </div>
                    </div>
                    <div class="col food-balance">
                        <div class="card" style="width: 18rem;">
                            <img src="<?php echo SERVERURL ?>view/assets/img/Balance_pavo.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <a style="background-color: #F07639; color: #ffff;" href="#" class="btn">PAVO</a>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-4">
                        <span>CUIDADO DIG</span>
                    </div>
                    <div class="col-4">
                        <span>Suplementos</span>
                    </div>
                    <div class="col-4">
                    </div>
                </div>
                <div class="row">
                    <div class="col food-balance">
                        <div class="card" style="width: 18rem;">
                            <img src="<?php echo SERVERURL ?>view/assets/img/Balance_res.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <a style="background-color: #F07639; color: #ffff;" href="#" class="btn">CARNE</a>
                            </div>
                        </div>
                    </div>
                    <div class="col food-balance">
                        <div class="card" style="width: 18rem;">
                            <img src="<?php echo SERVERURL ?>view/assets/img/Balance_pollo.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <a style="background-color: #F07639; color: #ffff;" href="#" class="btn">POLLO</a>
                            </div>
                        </div>
                    </div>
                    <div class="col food-balance">
                        <div class="card" style="width: 18rem;">
                            <img src="<?php echo SERVERURL ?>view/assets/img/Balance_pavo.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <a style="background-color: #F07639; color: #ffff;" href="#" class="btn">PAVO</a>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row ">
                    <div class="col-2"></div>
                    <div class="col cont-button-g">
                        <div class="button-g">
                            <button class="btn btn" type="submit" name="condiction" value="condiction">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
                        </div>
                        <br><br>
                    </div>
                    <div class="col-2">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-1"></div>
    </div>
</div>