<?php
// require './mainModel.php';
require_once 'mainModel.php';

class addModelData extends mainModel
{
    /*---------------- Modelo agregar Data --------------------*/
    protected static function addData($dataUser)
    {
        $db = mainModel::conectar();

        $sql = $db->prepare("INSERT INTO cliente(cliente_nombre,cliente_apellido,cliente_password,cliente_passwd2,cliente_direccion,cliente_apart_casa,cliente_apartamentro,cliente_ciudad) VALUES (:Name,:LastNm,:Pass,:Pass2,:Adress,:ApartHome,:Apart,:City)");

        $sql->bindParam(":Name", $dataUser['nombre']);
        $sql->bindParam(":LastNm", $dataUser['apellido']);
        $sql->bindParam(":Pass", $dataUser['password']);
        $sql->bindParam(":Pass2", $dataUser['passwd2']);
        $sql->bindParam(":Adress", $dataUser['direccion']);
        $sql->bindParam(":ApartHome", $dataUser['apartCasa']);
        $sql->bindParam(":Apart", $dataUser['apartamento']);
        $sql->bindParam(":City", $dataUser['ciudad']);

        $sql->execute();

        $lastId = $db->lastInsertId();

        return $lastId;
    }
    /*---------------- Modelo agregar Data --------------------*/
    protected static function addDataPet($dataPet, $idClient)
    {
        foreach ($dataPet as $key => $pet) {

            $sql = mainModel::conectar()->prepare("INSERT INTO mipet(mipet_nombreUs,mipet_ciudadUs,mipet_phoneUs,mipet_emailUs,mipet_celularUs,mipet_nombre,mipet_tipe,mipet_cond,mipet_esteril,mipet_raze,mipet_nacio,mipet_peso,mipet_pesoOp,mipet_style,mipet_concentrado,mipet_marca,mipet_pbBuild,mipet_pbActivity,mipet_tiPollo,mipet_tiRes,mipet_tiPes,mipet_tiPavo,mipet_tiZanahoria,mipet_tiRemolacha,mipet_tiEspinaca,mipet_tiZuquini,mipet_tiOtro,mipet_tiText,mipet_mcMedica,mipet_mcDigest,mipet_mcRenal,mipet_mcCancer,mipet_mcProCard,mipet_mcObesidad,mipet_mcProHepat,mipet_mcArticula,mipet_mcProblePiel,mipet_mcEstruv,mipet_mcAlergAliment,mipet_McEstreni,mipet_mcChunt,mipet_mcPancreatis,mipet_mcProArti,mipet_mcOto,mipet_mcText,mipet_asDiarrea,mipet_asVomito,mipet_asGases,mipet_asMalAliento,mipet_asCaidaPelo,mipet_asPicazon,mipet_asPeloOpa,mipet_asConvuls,mipet_asArticu,mipet_asDesanimo,mipet_asAyuno,mipet_asOtro,mipet_asTextArea,mipet_vqCheck,mipet_vqNaeFile,mipet_adCheck,mipet_idCliente)
            VALUES
            (:nombreUs,:ciudadUs,:phoneUs,:emailUs,:celularUs,:nombre,:tipe,:cond,:esteril,:raze,:nacio,:peso,:pesoOp,:style,:concentrado,:marca,:pbBuild,:pbActivity,:tiPollo,:tiRes,:tiPes,:tiPavo,:tiZanahoria,:tiRemolacha,:tiEspinaca,:tiZuquini,:tiOtro,:tiText,:mcMedica,:mcDigest,:mcRenal,:mcCancer,:mcProCard,:mcObesidad,:mcProHepat,:mcArticula,:mcProblePiel,:mcEstruv,:mcAlergAliment,:McEstreni,:mcChunt,:mcPancreatis,:mcProArti,:mcOto,:mcText,:asDiarrea,:asVomito,:asGases,:asMalAliento,:asCaidaPelo,:asPicazon,:asPeloOpa,:asConvuls,:asArticu,:asDesanimo,:asAyuno,:asOtro,:asTextArea,:vqCheck,:vqNaeFile,:adCheck,:idCliente)");

            $sql->bindParam(":nombreUs", $pet['Nombre']);
            $sql->bindParam(":ciudadUs", $pet['Ciudad']);
            $sql->bindParam(":phoneUs", $pet['Phone']);
            $sql->bindParam(":emailUs", $pet['Email']);
            $sql->bindParam(":celularUs", $pet['Celular']);
            $sql->bindParam(":nombre", $pet['Nombre_Pet']);
            $sql->bindParam(":tipe", $pet['Pet_Tipe']);
            $sql->bindParam(":cond", $pet['TyCOnd']);
            $sql->bindParam(":esteril", $pet['TrEsteri']);
            $sql->bindParam(":raze", $pet['TrRaze']);
            $sql->bindParam(":nacio", $pet['DnNacio']);
            $sql->bindParam(":peso", $pet['WpPeso']);
            $sql->bindParam(":pesoOp", $pet['WpPesoOp']);
            $sql->bindParam(":style", $pet['FsStyle']);
            $sql->bindParam(":concentrado", $pet['FtConcentra']);
            $sql->bindParam(":marca", $pet['FtMarca']);
            $sql->bindParam(":pbBuild", $pet['PbBuild']);
            $sql->bindParam(":pbActivity", $pet['PaActivity']);
            $sql->bindParam(":tiPollo", $pet['TiPollo']);
            $sql->bindParam(":tiRes", $pet['TiRes']);
            $sql->bindParam(":tiPes", $pet['TiPes']);
            $sql->bindParam(":tiPavo", $pet['TiPava']);
            $sql->bindParam(":tiZanahoria", $pet['TiZanaho']);
            $sql->bindParam(":tiRemolacha", $pet['TiRemola']);
            $sql->bindParam(":tiEspinaca", $pet['TiEspinaca']);
            $sql->bindParam(":tiZuquini", $pet['TiZuquini']);
            $sql->bindParam(":tiOtro", $pet['TiOtro']);
            $sql->bindParam(":tiText", $pet['TiText']);
            $sql->bindParam(":mcMedica", $pet['McMedica']);
            $sql->bindParam(":mcDigest", $pet['McDigest']);
            $sql->bindParam(":mcRenal", $pet['McRenal']);
            $sql->bindParam(":mcCancer", $pet['McCancer']);
            $sql->bindParam(":mcProCard", $pet['McProCard']);
            $sql->bindParam(":mcObesidad", $pet['McObesidad']);
            $sql->bindParam(":mcProHepat", $pet['McProHepat']);
            $sql->bindParam(":mcArticula", $pet['McArticu']);
            $sql->bindParam(":mcProblePiel", $pet['McProblePiel']);
            $sql->bindParam(":mcEstruv", $pet['McEstruv']);
            $sql->bindParam(":mcAlergAliment", $pet['McAlergAliment']);
            $sql->bindParam(":McEstreni", $pet['McEstreni']);
            $sql->bindParam(":mcChunt", $pet['McChunt']);
            $sql->bindParam(":mcPancreatis", $pet['McPancreatis']);
            $sql->bindParam(":mcProArti", $pet['McProArti']);
            $sql->bindParam(":mcOto", $pet['McOtro']);
            $sql->bindParam(":mcText", $pet['McText']);
            $sql->bindParam(":asDiarrea", $pet['AsDiarrea']);
            $sql->bindParam(":asVomito", $pet['AsVomito']);
            $sql->bindParam(":asGases", $pet['AsGases']);
            $sql->bindParam(":asMalAliento", $pet['AsMalAliento']);
            $sql->bindParam(":asCaidaPelo", $pet['AsCaidaPelo']);
            $sql->bindParam(":asPicazon", $pet['AsPicazon']);
            $sql->bindParam(":asPeloOpa", $pet['AsPeloOpa']);
            $sql->bindParam(":asConvuls", $pet['AsConvuls']);
            $sql->bindParam(":asArticu", $pet['AsArticul']);
            $sql->bindParam(":asDesanimo", $pet['AsDesanimo']);
            $sql->bindParam(":asAyuno", $pet['AsAyuno']);
            $sql->bindParam(":asOtro", $pet['AsOtro']);
            $sql->bindParam(":asTextArea", $pet['AsTextArea']);
            $sql->bindParam(":vqCheck", $pet['VqCheck']);
            $sql->bindParam(":vqNaeFile", $pet['VqNaeFile']);
            $sql->bindParam(":adCheck", $pet['AdCheck']);
            $sql->bindParam(":idCliente", $idClient);


            $sql->execute();
        }
        return $sql;
        // }
    }
}
