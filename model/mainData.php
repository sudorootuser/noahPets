<?php
// require './mainModel.php';
require_once 'mainModel.php';

class addModelData extends mainModel
{

    /*---------------- Modelo agregar Data --------------------*/
    protected static function addData()
    {
        // var_dump($_SESSION['data_pet']);
        // die;
        $_SESSION['data_pet'];
        $dataUser = $_SESSION['userData'];

        foreach ($_SESSION['data_pet'] as $key => $value) {
            var_dump($value[]);
        }
        die;
        $sql = mainModel::conectar()->prepare("INSERT INTO cliente(cliente_nombre,cliente_apellido,cliente_password,cliente_passwd_2,cliente_direccion,cliente_apart_casa,cliente_apartamentro,cliente_ciudad) VALUES (:nombre,:apellido,:password,:passwd_2,:direccion,:apart_casa,:apartamentro,:ciudad)");

        $sql->bindParam(":nombre", $dataUser['nombre']);
        $sql->bindParam(":apellido", $dataUser['apellido']);
        $sql->bindParam(":password", $dataUser['password']);
        $sql->bindParam(":passwd_2", $dataUser['passwd2']);
        $sql->bindParam(":direccion", $dataUser['direccion']);
        $sql->bindParam(":apart_casa", $dataUser['apartCasa']);
        $sql->bindParam(":apartamentro", $dataUser['apartamento']);
        $sql->bindParam(":ciudad", $dataUser['ciudad']);

        $sql->execute();

        $lastId = $sql->MainModel::conectar()->lastInsertId();

        $count = $sql->rowCount();

        if ($count >= 1) {

            $sql = mainModel::conectar()->prepare("INSERT INTO mipet(mipet_nombreUs,mipet_ciudadUs,mipet_phoneUs,mipet_emailUs,mipet_celularUs,mipet_nombre,mipet_tipe,mipet_cond,mipet_esteril,mipet_raze,mipet_nacio,mipet_peso,mipet_pesoOp,mipet_style,mipet_concentrado,mipet_marca,mipet_pbBuild,mipet_pbActivity,mipet_tiPollo,mipet_tiRes,mipet_tiPes,mipet_tiPavo,mipet_tiZanahoria,mipet_tiRemolacha,mipet_tiEspinaca,mipet_tiZuquini,mipet_tiOtro,mipet_tiText,mipet_mcMedica,mipet_mcDigest,mipet_mcRenal,mipet_mcCancer,mipet_mcProCard,mipet_mcObesidad,mipet_mcProHepat,mipet_mcArticula,mipet_mcProblePiel,mipet_mcEstruv,mipet_mcAlergAliment,mipet_McEstreni,mipet_mcChunt,mipet_mcPancreatis,mipet_mcProArti,mipet_mcOto,mipet_mcText,mipet_asDiarrea,mipet_asVomito,mipet_asGases,mipet_asMalAliento,mipet_asCaidaPelo,mipet_asPicazon,mipet_asPeloOpa,mipet_asConvuls,mipet_asArticu,mipet_asDesanimo,mipet_asAyuno,mipet_asOtro,mipet_asTextArea,mipet_vqCheck,mipet_vqNaeFile,mipet_adCheck)
            VALUES
            (:nombreUs,:ciudadUs,:phoneUs,:emailUs,:celularUs,:nombre,:tipe,:cond,:esteril,:raze,:nacio,:peso,:pesoOp,:style,:concentrado,:marca,:pbBuild,:pbActivity,:tiPollo,:tiRes,:tiPes,:tiPavo,:tiZanahoria,:tiRemolacha,:tiEspinaca,:tiZuquini,:tiOtro,:tiText,:mcMedica,:mcDigest,:mcRenal,:mcCancer,:mcProCard,:mcObesidad,:mcProHepat,:mcArticula,:mcProblePiel,:mcEstruv,:mcAlergAliment,:McEstreni,:mcChunt,:mcPancreatis,:mcProArti,:mcOto,:mcText,:asDiarrea,:asVomito,:asGases,:asMalAliento,:asCaidaPelo,:asPicazon,:asPeloOpa,:asConvuls,:asArticu,:asDesanimo,:asAyuno,:asOtro,:asTextArea,:vqCheck,:vqNaeFile,:adCheck)");

            $sql->bindParam(":nombreUs", $dataUser['nombre']);
            $sql->bindParam(":ciudadUs", $dataUser['apellido']);
            $sql->bindParam(":phoneUs", $dataUser['password']);
            $sql->bindParam(":emailUs", $dataUser['passwd2']);
            $sql->bindParam(":celularUs", $dataUser['passwd2']);
            $sql->bindParam(":nombre", $dataUser['passwd2']);
            $sql->bindParam(":tipe", $dataUser['passwd2']);
            $sql->bindParam(":cond", $dataUser['passwd2']);
            $sql->bindParam(":esteril", $dataUser['passwd2']);
            $sql->bindParam(":raze", $dataUser['passwd2']);
            $sql->bindParam(":nacio", $dataUser['passwd2']);
            $sql->bindParam(":peso", $dataUser['passwd2']);
            $sql->bindParam(":pesoOp", $dataUser['passwd2']);
            $sql->bindParam(":style", $dataUser['passwd2']);
            $sql->bindParam(":concentrado", $dataUser['passwd2']);
            $sql->bindParam(":marca", $dataUser['passwd2']);
            $sql->bindParam(":pbBuild", $dataUser['direccion']);
            $sql->bindParam(":pbActivity", $dataUser['apartCasa']);
            $sql->bindParam(":tiPollo", $dataUser['apartCasa']);
            $sql->bindParam(":tiRes", $dataUser['apartCasa']);
            $sql->bindParam(":tiPes", $dataUser['apartCasa']);
            $sql->bindParam(":tiPavo", $dataUser['apartCasa']);
            $sql->bindParam(":tiZanahoria", $dataUser['apartCasa']);
            $sql->bindParam(":tiRemolacha", $dataUser['apartCasa']);
            $sql->bindParam(":tiEspinaca", $dataUser['apartCasa']);
            $sql->bindParam(":tiZuquini", $dataUser['apartCasa']);
            $sql->bindParam(":tiOtro", $dataUser['apartCasa']);
            $sql->bindParam(":tiText", $dataUser['apartCasa']);
            $sql->bindParam(":mcMedica", $dataUser['apartCasa']);
            $sql->bindParam(":mcDigest", $dataUser['apartCasa']);
            $sql->bindParam(":mcRenal", $dataUser['apartCasa']);
            $sql->bindParam(":mcCancer", $dataUser['apartamento']);
            $sql->bindParam(":mcProCard", $dataUser['apartamento']);
            $sql->bindParam(":mcObesidad", $dataUser['apartamento']);
            $sql->bindParam(":mcProHepat", $dataUser['apartamento']);
            $sql->bindParam(":mcChunt", $dataUser['apartamento']);
            $sql->bindParam(":mcProArti", $dataUser['apartamento']);
            $sql->bindParam(":mcOto", $dataUser['apartamento']);
            $sql->bindParam(":mcText", $dataUser['apartamento']);
            $sql->bindParam(":asDiarrea", $dataUser['apartamento']);
            $sql->bindParam(":asVomito", $dataUser['apartamento']);
            $sql->bindParam(":asGases", $dataUser['apartamento']);
            $sql->bindParam(":asMalAliento", $dataUser['apartamento']);
            $sql->bindParam(":asCaidaPelo", $dataUser['apartamento']);
            $sql->bindParam(":asPicazon", $dataUser['apartamento']);
            $sql->bindParam(":asPeloOpa", $dataUser['apartamento']);
            $sql->bindParam(":asConvuls", $dataUser['ciudad']);
            $sql->bindParam(":asArticu", $dataUser['ciudad']);
            $sql->bindParam(":asDesanimo", $dataUser['ciudad']);
            $sql->bindParam(":asAyuno", $dataUser['ciudad']);
            $sql->bindParam(":asOtro", $dataUser['ciudad']);
            $sql->bindParam(":asTextArea", $dataUser['ciudad']);
            $sql->bindParam(":vqCheck", $dataUser['ciudad']);
            $sql->bindParam(":vqNaeFile", $dataUser['ciudad']);
            $sql->bindParam(":adCheck", $dataUser['ciudad']);

            $sql->execute();
        }
        return $sql;
    }
}
