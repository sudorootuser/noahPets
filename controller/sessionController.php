<?php
if ($peticionAjax) {
    require_once "../model/mainModel.php";
} else {
    require_once "./model/mainModel.php";
}

class sessionController extends mainModel
{
    public function session_yo()
    {
        $sessionMsg = '';

        /*------------- Get controller Session ----------------*/
        $nombre = mainModel::limpiar_cadena($_POST['nombre']);
        $ciudad = mainModel::limpiar_cadena($_POST['ciudad']);
        $email = mainModel::limpiar_cadena($_POST['email']);
        $celular = mainModel::limpiar_cadena($_POST['celular']);

        /*==  Comprobar campos vacios ==*/
        if ($nombre == "" || $ciudad == "" || $email == "" || $celular == "") {
            return $sessionMsg = "Todos los campos son obligatorios";
            exit();
        }
    }
}
