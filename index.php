<?php
// Se incluye las constantes para la conexión
require_once './config/APP.php';

// Se inclutye los controladores de las vistas
require_once './controller/controllerViews.php';

// Se instancia e incluye la clase plantilla
$template = new controllerViews();
$template->get_controller_template();