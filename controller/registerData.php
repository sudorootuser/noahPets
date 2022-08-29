<?php
// Se ibncluye la conexión a la db y las funciones
include_once './model/mainData.php';


// Clase para ejecutar funciones 
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

        return $const->fetchAll();
    }

    public function consulta()
    {

        $conn = mainModel::conectar();

        return $conn;
    }
}
