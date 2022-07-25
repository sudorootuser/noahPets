<!-- Content -->
<?php
session_unset();
session_destroy();
include_once './view/inc/NavBarInicial.php';
?>
<div class="container-fluid home" ondragstart="return false" onselectstart="return false" oncontextmenu="return false">
    <div class="contentImage">

    </div>	

    <div class="row">
        <h2>Vamos a construir algo maravilloso y único</h2>
        <h5>Tu mascota te agradecerá los 3 minutos <br>
            que mejor habrás inventado para mejorar su calidad de vida
        </h5>
        <div class="col-2"></div>
        <div class="col cont-button-home">
            <div class="button-home">
                <br>
                <a href="<?php echo SERVERURL; ?>Yo/">Empecemos <img class='mi-home-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"> </a>
                <br>
                <br>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
</div>