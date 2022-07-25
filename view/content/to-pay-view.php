<?php
/*-------------- Instanciar al controlador ---------------- */

include_once './controller/registerData.php';

$ins_data = new registerData();

/*-------------- Add Data ---------------- */
echo $ins_data->addControllerData();
?>

<body onload="redireccionar()">
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
                <form action="" method="post" class="forms-condiction-load">
                    <h2>Estamos procesando su pago, en unos momentos serás redireccionado al botón de pago</h2>
                    <br>
                    <p class="text-20">por favor espera...</p>

                    <div class="row">
                        <div class="col-4">
                            <img style="width: 100%;" src="../view/assets/img/load-1.png" alt="" srcset="">
                        </div>
                        <div class="col-4">
                            <img style="width: 100%;" src="../view/assets/img/load-2.png" alt="" srcset="">
                        </div>
                        <div class="col-4">
                            <img style="width: 100%;" src="../view/assets/img/load-3.png" alt="" srcset="">
                        </div>
                    </div>
                    <br><br>
                    <div class="spinner-grow" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    </span>
                </form>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</body>