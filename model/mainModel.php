<?php

if ($peticionAjax) {
    require_once '../config/SERVER.php';
} else {
    require_once './config/SERVER.php';
}

class mainModel
{
    /*--------------- Función conectar DB ----------------------*/

    protected static function conectar()
    {
        $conexion = new PDO(SGBD, USER, PASS);
        $conexion->exec("SET CHARACTER SET utf8");
        return $conexion;
    }
    /*--------------- Función ejecutar consultas simples ---------------------*/
    protected static function ejecutar_cosulta_simple($consulta)
    {
        $sql = self::conectar()->prepare($consulta);
        $sql->execute();

        return $sql;
    }
    /*--------------- Encriptar  && Desencriptar cadenas -----------------*/
    public function encrypt_decrypt($action, $string)
    {

        $output = FALSE;
        $key = hash('sha256', SECRET_IV);
        $iv = substr(hash('sha256', SECRET_IV), 0, 16);

        if ($action == 'encrypt') {
            $output = openssl_encrypt($string, METHOD, $key, 0, $iv);
            $output = base64_encode($output);
        } else if ($action == 'decrypt') {
            $output = openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
        }

        return $output;
    }

    /*----------- Función para generar códigos aleatorios ------------*/

    protected static function generar_codigo_aleatorio($letra, $longitud, $numero)
    {
        for ($i = 1; $i <= $longitud; $i++) {
            $aleatorio = rand(0, 9);
            $letra .= $aleatorio;
        }
        return $letra . "-" . $numero;
    }
    /*------------------ Función limpiar cadenas -------------------*/

    public static function limpiar_cadena($cadena)
    {

        $cadena = trim($cadena);
        $cadena = stripslashes($cadena);
        $cadena = str_replace("<script>", "", $cadena);
        $cadena = str_replace("</script>", "", $cadena);
        $cadena = str_replace("<script src>", "", $cadena);
        $cadena = str_replace("<script type=", "", $cadena);
        $cadena = str_replace("SELECT * FROM", "", $cadena);
        $cadena = str_replace("DELETE INTO", "", $cadena);
        $cadena = str_replace("DROP TABLE", "", $cadena);
        $cadena = str_replace("DROP DATABASE", "", $cadena);
        $cadena = str_replace("TRUNCATE TABLE", "", $cadena);
        $cadena = str_replace("SHOW TABLES", "", $cadena);
        $cadena = str_replace("SHOW DATABASE", "", $cadena);
        $cadena = str_replace("<?php", "", $cadena);
        $cadena = str_replace("?>", "", $cadena);
        $cadena = str_replace("--", "", $cadena);
        $cadena = str_replace(">", "", $cadena);
        $cadena = str_replace("<", "", $cadena);
        $cadena = str_replace("[", "", $cadena);
        $cadena = str_replace("]","",$cadena);
        $cadena = str_replace("^", "", $cadena);
        $cadena = str_replace("==", "", $cadena);
        $cadena = str_replace(";", "", $cadena);
        $cadena = str_replace("::", "", $cadena);
        $cadena = stripslashes($cadena);
        $cadena = trim($cadena);
        return $cadena;
    }

    /*----------- Modelo :: Función verificar datos -----------*/
    protected static function verificar_datos($filtro, $cadena)
    {
        if (preg_match("/^" . $filtro . "$/", $cadena)) {
            return false;
        } else {
            return true;
        }
    }

    /*------------- Funcion verificar fechas -------------*/
    protected static function verificar_fecha($fecha)
    {
        $valores = explode('-', $fecha);
        if (count($valores) == 3 && checkdate($valores[1], $valores[2], $valores[0])) {
            return false;
        } else {
            return true;
        }
    }
}
