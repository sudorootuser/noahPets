<?php
// require_once "./config/APP.php";

include_once './model/mainData.php';

class registerData extends addModelData
{
    public function addControllerData()
    {

        $addData = registerData::addData($_SESSION['userData']);

        if ($addData >= 1) {

            registerData::addDataPet($_SESSION['data_pet'], $addData);
        }
    }

    public function consultaSimple($consulta)
    {

        $const = mainModel::ejecutar_cosulta_simple($consulta);

        return $datos = $const->fetchAll();
    }
}
