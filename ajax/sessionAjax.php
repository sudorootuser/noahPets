<?php
require_once "../config/APP.php";
$peticionAjax = true;
/*-------------- Instanciar al controlador ---------------- */
require_once "../controller/sessionController.php";
$ins_session = new sessionController();

if (isset($_POST['yo'])) {
    echo $ins_session->session_yo();
}
