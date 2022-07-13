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
    header('Location:' . SERVERURL . 'checkout/');
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

                <div class="row">
                    <div class="col">
                        <span>IDEAL</span>
                    </div>
                </div>
                <br>
                <br>
                <div class="row food-diet">
                    <div class="col-6">
                        <div class="card">
                            <div class="row">
                                <div class="col-6">
                                    <div class="card-body">
                                        <h1 class="card-title"><b>Pull Plan</b></h1>
                                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi corrupti quas illum inventore, placeat ipsum!</p>
                                        <h1 class="card-title"><b>$220.000</b></h1>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <img src="<?php echo SERVERURL ?>view/assets/img/Full_plan.png" class="card-img-top" alt="...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card" style="background-color: white;">
                            <div class="row">
                                <div class="col-6">
                                    <div class="card-body">
                                        <h1 class="card-title"><b>Topper Plan</b></h1>
                                        <p class="card-text" style="color:#000000 ;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi corrupti quas illum inventore, placeat ipsum!</p>
                                        <h1 class="card-title"><b>$220.000</b></h1>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <img src="<?php echo SERVERURL ?>view/assets/img/Full_plan.png" class="card-img-top" alt="...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <span><?php echo $_SESSION['mi_pet']['Name_Pet']; ?> necesita consumir <span>De la marca</span>
                            <select class="form-select-raze" name="marca">
                                <option value="Monello" selected>150 Gramos</option>
                                <option value="Chunky">130 Gramos</option>
                            </select>
                            diariamente de su dieta 100% natural
                            Escoge la opción 100% natural para una dieta totalmente saludable y
                            balanceada. Escoge la opción Mix si deseas mezclarla con su dieta actual</span>
                    </div>
                </div>
                <br>
                <div class="row food-diet">
                    <div class="col-6">
                        <div class="card">
                            <div class="row">
                                <div class="col-6">
                                    <div class="card-body">
                                        <h1 class="card-title"><b>Full Plan</b></h1>
                                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi corrupti quas illum inventore, placeat ipsum!</p>
                                        <h1 class="card-title"><b>$220.000</b></h1>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <img src="<?php echo SERVERURL ?>view/assets/img/Full_plan.png" class="card-img-top" alt="...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card" style="background-color: white;">
                            <div class="row">
                                <div class="col-6">
                                    <div class="card-body">
                                        <h1 class="card-title"><b>Topper Plan</b></h1>
                                        <p class="card-text" style="color:#000000 ;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi corrupti quas illum inventore, placeat ipsum!</p>
                                        <h1 class="card-title"><b>$220.000</b></h1>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <img src="<?php echo SERVERURL ?>view/assets/img/Full_plan.png" class="card-img-top" alt="...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-6 cont-button-g">
                        <div class="button-g">
                            <button class="btn btn" type="submit" name="condiction" value="condiction"><img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"> Atras</button>
                        </div>
                        <br><br>
                    </div>
                    <div class="col-6 cont-button-g">
                        <div class="button-g">
                            <button class="btn btn" type="submit" name="condiction" value="condiction">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
                        </div>
                        <br><br>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-1"></div>
    </div>
</div>