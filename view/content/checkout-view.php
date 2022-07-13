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
            <form action="" method="post" class="forms-checkout">
                <div class="row">
                    <span>Cuenta de usuario</span>
                    <div class="col-6">
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombres">
                    </div>
                    <div class="col-6">
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Apellidos">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Contraseña">
                    </div>
                    <div class="col-6">
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Confirmación contraseña">
                    </div>
                </div>
                <div class="row">
                    <span>Dirección</span>
                    <div class="col-6">
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Dirección">
                    </div>
                    <div class="col-6">
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Apartamento / Casa">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Departamento">
                    </div>
                    <div class="col-6">
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ciudad">
                    </div>
                </div>
                <div class="row">
                    <span>Pago</span>
                    <div class="col-12">
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombre tarjeta de crédito">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Fecha Exp">
                    </div>
                    <div class="col-3">
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Número en la tarjeta">
                    </div>
                    <div class="col-3">
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col cont-button-g">
                        <div class="button-g">
                            <button class="btn btn" type="submit" name="yo" value="yo">Pagar <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
                            <br>
                            <br>
                        </div>
                    </div>
                    <div class="col-2"></div>
                </div>
            </form>
        </div>
        <div class="col-1"></div>
    </div>
</div>