<?php

class controllerOperation
{

    // Función para definir el Factor por el tipo de razá y obtener el peso metbolico
    public function pesoMetabolico()
    {
        // Se condiciona los valores del peso dependiendo de la opción en tipo de mascota
        // se declara una constante la cual se usa para sacar el peso metabólico

        if ($_SESSION['mi_pet'][$_SESSION['id']]['Pet_Type'] != 'Gato') {

            // condicion para contrtolar si la mascota es un perro
            $potencia = 0.75; //Se crea una constante de la potencia

        } else {
            // condicion para contrtolar si la mascota es un gato

            // condicion para validar que tipo de condición corporal es.
            if ($_SESSION['physical_build'][$_SESSION['id']]['physical_build'] == "Delgado") {

                $potencia = 0.67; //Se crea una constante de la potencia
            } else {

                $potencia = 0.4; //Se crea una constante de la potencia
            }
        }
        $peso = $_SESSION['wight_peso'][$_SESSION['id']]['wight_peso'];

        $resul_potencia = ($peso ** $potencia);

        $pesoMetabolico = $resul_potencia;

        return $_SESSION['pesoMetabolico'][$_SESSION['id']] = $pesoMetabolico;
    }

    // Función para obtener la contextura fisica
    public function contexturFisica()
    {

        // Se condiciona los valores del peso dependiendo de la opción en tipo de mascota
        $raza = $_SESSION['type_raze'][$_SESSION['id']]['type_raze'];

        if ($raza == '2') {

            $factor = 200;
        } else  if ($raza == '7') {

            $factor = 105;
        } else {

            // Condición para validar el factor correspondiente al tipo de mascota, si es gato o perro
            if ($_SESSION['mi_pet'][$_SESSION['id']]['Pet_Type'] == 'Gato') {

                if ($_SESSION['physical_build'][$_SESSION['id']]['physical_build'] == "Delgado") {
                    $factor = 100;
                } else {
                    $factor = 130;
                }
            } else {
                $factor = 130;
            }
        }

        if ($_SESSION['physical_build'][$_SESSION['id']]['physical_build'] == 'Delgado') {

            if ($_SESSION['mi_pet'][$_SESSION['id']]['Pet_Type'] == 'Gato') {

                $contexturaFisica = $factor;
            } else {
                $delgado = 1.15;

                $val = controllerOperation::nivelActividad($factor);

                $contexturaFisica = $val * $delgado;
            }
            controllerOperation::consumoSnacks($contexturaFisica);

            return  $_SESSION['contexturaFisica_otro'][$_SESSION['id']] = $contexturaFisica;

            exit();
        } elseif ($_SESSION['physical_build'][$_SESSION['id']]['physical_build'] == 'Ideal') {

            if ($_SESSION['mi_pet'][$_SESSION['id']]['Pet_Type'] == 'Gato') {

                $contexturaFisica = $factor;
            } else {
                $ideal = 1;

                $val = controllerOperation::nivelActividad($factor);

                $contexturaFisica = $val * $ideal;
            }
            controllerOperation::consumoSnacks($contexturaFisica);

            return  $_SESSION['contexturaFisica_otro'][$_SESSION['id']] = $contexturaFisica;

            exit();
        } elseif ($_SESSION['physical_build'][$_SESSION['id']]['physical_build'] == 'Sobrepeso') {

            if ($_SESSION['mi_pet'][$_SESSION['id']]['Pet_Type'] == 'Gato') {

                $contexturaFisica = $factor;
            } else {

                $sobrepeso = 0.85;

                $val = controllerOperation::nivelActividad($factor);

                $contexturaFisica = $val * $sobrepeso;
            }

            controllerOperation::consumoSnacks($contexturaFisica);

            return  $_SESSION['contexturaFisica_otro'][$_SESSION['id']] = $contexturaFisica;

            exit();
        }
    }

    // Funcion para obtener el nivel de actividad
    public function nivelActividad($rest)
    {
        // Se condiciona los valores del 

        if ($_SESSION['physical_activity'][$_SESSION['id']]['physical_activity'] == 'Poco Activo') {

            $pocoActivo = 0.73;

            $nivelSActividad = $rest * $pocoActivo;

            return  $_SESSION['nivelActividad_otro'][$_SESSION['id']] = $nivelSActividad;

            exit();
        } elseif ($_SESSION['physical_activity'][$_SESSION['id']]['physical_activity'] == 'Activa') {

            $pocoActivo = 1;

            $nivelSActividad = $rest * $pocoActivo;

            return  $_SESSION['nivelActividad_otro'][$_SESSION['id']] = $nivelSActividad;

            exit();
        } elseif ($_SESSION['physical_activity'][$_SESSION['id']]['physical_activity'] == 'Muy Activa') {

            $muyActivo = 1.0768;

            $nivelSActividad = $rest * $muyActivo;

            return  $_SESSION['nivelActividad_otro'][$_SESSION['id']] = $nivelSActividad;

            exit();
        }
    }

    // Funcion para obtener el consumo de snacks
    public function consumoSnacks($nivelSActividad)
    {
        controllerOperation::pesoMetabolico();

        if ($_SESSION['snacks'][$_SESSION['id']]['snacks'] == 'Bastante') {

            $result_snacks = $nivelSActividad * 0.95;

            $requirimiento_energia = $result_snacks * $_SESSION['pesoMetabolico'][$_SESSION['id']];

            $_SESSION['requirimient_energi'][$_SESSION['id']] = ($requirimiento_energia);

            controllerOperation::caloriasDieta();

            return $_SESSION['result_Snack'][$_SESSION['id']] = $result_snacks;
            exit();
        } else if ($_SESSION['snacks'][$_SESSION['id']]['snacks'] == 'Ocasional') {

            $result_snacks = $nivelSActividad * 0.97;

            $requirimiento_energia = ($result_snacks * $_SESSION['pesoMetabolico'][$_SESSION['id']]);

            $_SESSION['requirimient_energi'][$_SESSION['id']] = $requirimiento_energia;

            controllerOperation::caloriasDieta();

            return $_SESSION['result_Snack'][$_SESSION['id']] = $result_snacks;
            exit();
        }
        if ($_SESSION['snacks'][$_SESSION['id']]['snacks'] == 'Nunca') {

            $result_snacks = $nivelSActividad * 1;

            $requirimiento_energia = ($result_snacks * $_SESSION['pesoMetabolico'][$_SESSION['id']]);

            $_SESSION['requirimient_energi'][$_SESSION['id']] = $requirimiento_energia;

            controllerOperation::caloriasDieta();

            return $_SESSION['result_Snack'][$_SESSION['id']] = $result_snacks;
            exit();
        }
    }

    // Función para obtener las calorias de la dieta
    public function caloriasDieta()
    {
        if ($_SESSION['medical_condition'][$_SESSION['id']]['cond_medica'] == 'Sí') {
            $dieta = $_SESSION['food_check'][$_SESSION['id']]['cuidado_check'];

            if ($_SESSION['mi_pet'][$_SESSION['id']]['Pet_Type'] != 'Gato') {

                if ($dieta == 'BCahorros cuidado digestivo') {
                    $Kalorias = 2200;

                    $_SESSION['nombreFoodCuidado'] = "Dieta Natural Prescrita - Cachorros Digestiva";

                    $energi = $_SESSION['requirimient_energi'][$_SESSION['id']];
                    $var = $energi;

                    $_SESSION['consumoDiaPrein'] = round((($var /  $Kalorias) * 1.1) * 1000);
                } else if ($dieta == 'Cuidado Digestivo') {
                    // Corrección de nombre a Senior
                    $Kalorias = 2073;

                    $_SESSION['nombreFoodCuidado'] = "Dieta Natural Prescrita - Cuidado Digestivo";

                    $energi = ($_SESSION['requirimient_energi'][$_SESSION['id']]);
                    $var = ($energi);

                    $_SESSION['consumoDiaPrein'] = round((($var /  $Kalorias) * 1.1) * 1000);
                } else if ($dieta == 'Alergia sabor carne') {
                    $Kalorias = 2500;
                    $_SESSION['nombreFoodCuidado'] = "Dieta Natural Prescrita - Alergias";

                    $energi = ($_SESSION['requirimient_energi'][$_SESSION['id']]);
                    $var = ($energi);

                    $_SESSION['consumoDiaPrein'] = round((($var /  $Kalorias) * 1.1) * 1000);
                } else if ($dieta == 'Cálculos estruvita') {
                    $Kalorias = 2510;

                    $_SESSION['nombreFoodCuidado'] = "Dieta Natural Prescrita - Estruvita";

                    $energi = ($_SESSION['requirimient_energi'][$_SESSION['id']]);
                    $var = ($energi);

                    $_SESSION['consumoDiaPrein'] = round((($var /  $Kalorias) * 1.1) * 1000);
                } else if ($dieta == 'Cálculso oxalatos') {
                    $Kalorias = 3200;

                    $_SESSION['nombreFoodCuidado'] = "Dieta Natural Prescrita - Oxalatos";

                    $energi = ($_SESSION['requirimient_energi'][$_SESSION['id']]);
                    $var = ($energi);

                    $_SESSION['consumoDiaPrein'] = round((($var /  $Kalorias) * 1.1) * 1000);
                } else if ($dieta == 'Control peso') {
                    $Kalorias = 1900;

                    $_SESSION['nombreFoodCuidado'] = "Dieta Natural Prescrita - Control de Peso";

                    $energi = ($_SESSION['requirimient_energi'][$_SESSION['id']]);
                    $var = ($energi);

                    $_SESSION['consumoDiaPrein'] = round((($var /  $Kalorias) * 1.1) * 1000);
                } else if ($dieta == 'Cuidado articular') {
                    $Kalorias = 2240;

                    $_SESSION['nombreFoodCuidado'] = "DDieta Natural Prescrita - Osteoarticular";

                    $energi = ($_SESSION['requirimient_energi'][$_SESSION['id']]);
                    $var = ($energi);

                    $_SESSION['consumoDiaPrein'] = round((($var /  $Kalorias) * 1.1) * 1000);
                } else if ($dieta == 'Cuidado cardiaco') {
                    $Kalorias = 2600;

                    $_SESSION['nombreFoodCuidado'] = "Dieta Natural Prescrita - Cuidado Cardíaco";

                    $energi = ($_SESSION['requirimient_energi'][$_SESSION['id']]);
                    $var = ($energi);

                    $_SESSION['consumoDiaPrein'] = round((($var /  $Kalorias) * 1.1) * 1000);
                } else if ($dieta == 'Cuidado de la piel') {
                    $Kalorias = 2240;

                    $_SESSION['nombreFoodCuidado'] = "Dieta Natural Prescrita - Cuidado de Piel";

                    $energi = ($_SESSION['requirimient_energi'][$_SESSION['id']]);
                    $var = ($energi);

                    $_SESSION['consumoDiaPrein'] = round((($var /  $Kalorias) * 1.1) * 1000);
                } else if ($dieta == 'Cuidado hepática ') {
                    $Kalorias = 2183;

                    $_SESSION['nombreFoodCuidado'] = "Dieta Natural Prescrita - Cuidado Hepático";

                    $energi = ($_SESSION['requirimient_energi'][$_SESSION['id']]);
                    $var = ($energi);

                    $_SESSION['consumoDiaPrein'] = round((($var /  $Kalorias) * 1.1) * 1000);
                } else if ($dieta == 'Cuidado hepatica sabor carne') {
                    $Kalorias = 2500;

                    $_SESSION['nombreFoodCuidado'] = "Dieta Natural Prescrita - Cuidado Hepático Res";

                    $energi = ($_SESSION['requirimient_energi'][$_SESSION['id']]);
                    $var = ($energi);

                    $_SESSION['consumoDiaPrein'] = round((($var /  $Kalorias) * 1.1) * 1000);
                } else if ($dieta == 'Cuidado renal') {
                    $Kalorias = 2300;

                    $_SESSION['nombreFoodCuidado'] = "Dieta Natural Prescrita - Cuidado Renal";

                    $energi = ($_SESSION['requirimient_energi'][$_SESSION['id']]);
                    $var = ($energi);

                    $_SESSION['consumoDiaPrein'] = round((($var /  $Kalorias) * 1.1) * 1000);
                } else if ($dieta == 'Diabetes') {
                    $Kalorias = 1820;

                    $_SESSION['nombreFoodCuidado'] = "Dieta Natural Prescrita - Diabetes";

                    $energi = ($_SESSION['requirimient_energi'][$_SESSION['id']]);
                    $var = ($energi);

                    $_SESSION['consumoDiaPrein'] = round((($var /  $Kalorias) * 1.1) * 1000);
                } else if ($dieta == 'Estreñimiento') {
                    $Kalorias = 1974;

                    $_SESSION['nombreFoodCuidado'] = "Dieta Natural Prescrita - Estreñimiento";

                    $energi = ($_SESSION['requirimient_energi'][$_SESSION['id']]);
                    $var = ($energi);

                    $_SESSION['consumoDiaPrein'] = round((($var /  $Kalorias) * 1.1) * 1000);
                } else if ($dieta == 'Grain Free') {
                    $Kalorias = 1110;

                    $_SESSION['nombreFoodCuidado'] = "Dieta Natural Prescrita - Cuidado Hepático Grain Free";

                    $energi = ($_SESSION['requirimient_energi'][$_SESSION['id']]);
                    $var = ($energi);

                    $_SESSION['consumoDiaPrein'] = round((($var /  $Kalorias) * 1.1) * 1000);
                } else if ($dieta == 'Hemoparásitos') {
                    $Kalorias = 2120;

                    $_SESSION['nombreFoodCuidado'] = "Dieta Natural Prescrita - Hemoparásitos";

                    $energi = ($_SESSION['requirimient_energi'][$_SESSION['id']]);
                    $var = ($energi);

                    $_SESSION['consumoDiaPrein'] = round((($var /  $Kalorias) * 1.1) * 1000);
                } else if ($dieta == 'Hipoalergenica cerdo') {
                    $Kalorias = 2500;

                    $_SESSION['nombreFoodCuidado'] = "Dieta Natural Prescrita - Hipoalergénica";

                    $energi = ($_SESSION['requirimient_energi'][$_SESSION['id']]);
                    $var = ($energi);

                    $_SESSION['consumoDiaPrein'] = round((($var /  $Kalorias) * 1.1) * 1000);
                } else if ($dieta == 'Oncológico') {
                    $Kalorias = 1940;

                    $_SESSION['nombreFoodCuidado'] = "Dieta Natural Prescrita - Oncológica";

                    $energi = ($_SESSION['requirimient_energi'][$_SESSION['id']]);
                    $var = ($energi);

                    $_SESSION['consumoDiaPrein'] = round((($var /  $Kalorias) * 1.1) * 1000);
                } else if ($dieta == 'Pancreatitis') {
                    $Kalorias = 2133;

                    $_SESSION['nombreFoodCuidado'] = "Dieta Natural Prescrita - Pancreatitis";

                    $energi = ($_SESSION['requirimient_energi'][$_SESSION['id']]);
                    $var = ($energi);

                    $_SESSION['consumoDiaPrein'] = round((($var /  $Kalorias) * 1.1) * 1000);
                } else if ($dieta == 'Shunt') {
                    $Kalorias = 2090;

                    $_SESSION['nombreFoodCuidado'] = "Dieta Natural Prescrita - Shunt";

                    $energi = ($_SESSION['requirimient_energi'][$_SESSION['id']]);
                    $var = ($energi);

                    $_SESSION['consumoDiaPrein'] = round((($var /  $Kalorias) * 1.1) * 1000);
                }

                // Inicio de la dieta
                $dieta = $_SESSION['food_check'][$_SESSION['id']]['ideal_check'];

                if ($dieta == 'BCarne') {
                    $Kalorias = 2500;

                    $_SESSION['nombreFoodCheck'] = "Dieta Natural Balanceada - Res";
                    // $_SESSION['consumoDiaDiet'] = ((($_SESSION['requirimient_energi'][$_SESSION['id']] /  $Kalorias) * 1000), 0);

                    $energi = ($_SESSION['requirimient_energi'][$_SESSION['id']]);
                    $var = ($energi);

                    $_SESSION['consumoDiaPrein'] = round((($var /  $Kalorias) * 1.1) * 1000);
                } else if ($dieta == 'BCarne y leguminosas') {
                    $Kalorias = 2063;

                    $_SESSION['nombreFoodCheck'] = "Dieta Natural Balanceada Light";
                    $energi = ($_SESSION['requirimient_energi'][$_SESSION['id']]);
                    $var = ($energi);

                    $_SESSION['consumoDiaPrein'] = round((($var /  $Kalorias) * 1.1) * 1000);
                } else if ($dieta == 'BCerdo') {
                    $Kalorias = 2500;

                    $_SESSION['nombreFoodCheck'] = "Dieta Natural Balanceada - Cerdo";

                    $energi = ($_SESSION['requirimient_energi'][$_SESSION['id']]);
                    $var = ($energi);

                    $_SESSION['consumoDiaPrein'] = round((($var /  $Kalorias) * 1.1) * 1000);
                } else if ($dieta == 'BMix') {
                    $Kalorias = 2262;

                    $_SESSION['nombreFoodCheck'] = "Dieta Natural Balanceada - Res y Pollo";

                    $energi = ($_SESSION['requirimient_energi'][$_SESSION['id']]);
                    $var = ($energi);

                    $_SESSION['consumoDiaPrein'] = round((($var /  $Kalorias) * 1.1) * 1000);
                } else if ($dieta == 'BPollo') {
                    $Kalorias = 2221;

                    $_SESSION['nombreFoodCheck'] = "Dieta Natural Balanceada - Pollo";

                    $energi = ($_SESSION['requirimient_energi'][$_SESSION['id']]);
                    $var = ($energi);

                    $_SESSION['consumoDiaPrein'] = round((($var /  $Kalorias) * 1.1) * 1000);
                } else if ($dieta == 'Senior ') {
                    $Kalorias = 2154;

                    $_SESSION['nombreFoodCheck'] = "Dieta Natural Balanceada - Senior";

                    $energi = ($_SESSION['requirimient_energi'][$_SESSION['id']]);
                    $var = ($energi);

                    $_SESSION['consumoDiaPrein'] = round((($var /  $Kalorias) * 1.1) * 1000);
                } else if ($dieta == 'BCahorros') {
                    $Kalorias = 2300;

                    $_SESSION['nombreFoodCheck'] = "Dieta Natural Balanceada - Cachorros";

                    $energi = ($_SESSION['requirimient_energi'][$_SESSION['id']]);
                    $var = ($energi);

                    $_SESSION['consumoDiaPrein'] = round((($var /  $Kalorias) * 1.1) * 1000);
                }
            } else {
                if ($dieta == 'Pollo_Res') {
                    $Kalorias = 1472;

                    $_SESSION['nombreFoodCuidado'] = "Dieta Natural Balanceada Gatos - Pollo y Res";

                    $energi = $_SESSION['requirimient_energi'][$_SESSION['id']];
                    $var = $energi;

                    $_SESSION['consumoDiaPrein'] = round((($var /  $Kalorias) * 1.1) * 1000);
                } else if ($dieta == 'Pescado') {
                    // Corrección de nombre a Senior
                    $Kalorias = 1343;

                    $_SESSION['nombreFoodCuidado'] = "Dieta Natural Balanceada Gatos - Pescado";

                    $energi = ($_SESSION['requirimient_energi'][$_SESSION['id']]);
                    $var = ($energi);

                    $_SESSION['consumoDiaPrein'] = round((($var /  $Kalorias) * 1.1) * 1000);
                } else if ($dieta == 'Cuidado Digestivo') {
                    $Kalorias = 1406;
                    $_SESSION['nombreFoodCuidado'] = "Dieta Natural Prescrita Gatos - Cuidado Digestivo";

                    $energi = ($_SESSION['requirimient_energi'][$_SESSION['id']]);
                    $var = ($energi);

                    $_SESSION['consumoDiaPrein'] = round((($var /  $Kalorias) * 1.1) * 1000);
                } else if ($dieta == 'Peso-Diabetes') {
                    $Kalorias = 1486;

                    $_SESSION['nombreFoodCuidado'] = " Dieta Natural Prescrita Gatos - Control de Peso-Diabetes";

                    $energi = ($_SESSION['requirimient_energi'][$_SESSION['id']]);
                    $var = ($energi);

                    $_SESSION['consumoDiaPrein'] = round((($var /  $Kalorias) * 1.1) * 1000);
                } else if ($dieta == 'Renal Pollo') {
                    $Kalorias = 1214;

                    $_SESSION['nombreFoodCuidado'] = "Dieta Natural Prescrita Gatos - Cuidado Renal Pollo";

                    $energi = ($_SESSION['requirimient_energi'][$_SESSION['id']]);
                    $var = ($energi);

                    $_SESSION['consumoDiaPrein'] = round((($var /  $Kalorias) * 1.1) * 1000);
                }
            }

            if (empty($_SESSION['consumoDiaPrein'])) {

                $_SESSION['consumoDiaPrein'] = 0;
            } else if (empty($_SESSION['consumoDiaDiet'])) {

                $_SESSION['consumoDiaDiet'] = 0;
            }

            return  $_SESSION['consumoDía'] = $_SESSION['consumoDiaDiet'] + $_SESSION['consumoDiaPrein'];
            exit();
        } else {

            $dieta = $_SESSION['food_check'][$_SESSION['id']]['ideal_check'];

            if ($_SESSION['mi_pet'][$_SESSION['id']]['Pet_Type'] != 'Gato') {

                if ($dieta == 'BCarne') {
                    $Kalorias = 2500;

                    $_SESSION['nombreFoodCheck'] = "Dieta Natural Balanceada - Res";

                    $energi = ($_SESSION['requirimient_energi'][$_SESSION['id']]);
                    $var = ($energi);
                    $consumoDiaDiet = round((($var /  $Kalorias) * 1.1) * 1000);
                } else if ($dieta == 'BCarne y leguminosas') {
                    $Kalorias = 2063;

                    $energi = ($_SESSION['requirimient_energi'][$_SESSION['id']]);
                    $var = ($energi);
                    $consumoDiaDiet = round((($var /  $Kalorias) * 1.1) * 1000);
                } else if ($dieta == 'BCerdo') {
                    $Kalorias = 2500;
                    
                    $energi = ($_SESSION['requirimient_energi'][$_SESSION['id']]);
                    $var = ($energi);
                    $consumoDiaDiet = round((($var /  $Kalorias) * 1.1) * 1000);
                } else if ($dieta == 'BMix') {
                    $Kalorias = 2262;

                    $energi = ($_SESSION['requirimient_energi'][$_SESSION['id']]);
                    $var = ($energi);
                    $consumoDiaDiet = round((($var /  $Kalorias) * 1.1) * 1000);
                } else if ($dieta == 'BPollo') {
                    $Kalorias = 2221;

                    $energi = ($_SESSION['requirimient_energi'][$_SESSION['id']]);
                    $var = ($energi);
                    $consumoDiaDiet = round((($var /  $Kalorias) * 1.1) * 1000);
                } else if ($dieta == 'Senior') {
                    $Kalorias = 2154;

                    $energi = ($_SESSION['requirimient_energi'][$_SESSION['id']]);
                    $var = ($energi);
                    $consumoDiaDiet = round((($var /  $Kalorias) * 1.1) * 1000);
                } else if ($dieta == 'BCahorros') {
                    $Kalorias = 2300;

                    $energi = ($_SESSION['requirimient_energi'][$_SESSION['id']]);
                    $var = ($energi);
                    $consumoDiaDiet = round((($var /  $Kalorias) * 1.1) * 1000);
                }
            } else {

                if ($dieta == 'Pollo_Res') {
                    $Kalorias = 1472;

                    $_SESSION['nombreFoodCheck'] = "Dieta Natural Balanceada Gatos - Pollo y Res";

                    $energi = ($_SESSION['requirimient_energi'][$_SESSION['id']]);
                    $var = ($energi);
                    $consumoDiaDiet = round((($var /  $Kalorias) * 1.1) * 1000);
                } else if ($dieta == 'Pescado') {
                    $Kalorias = 1343;

                    $_SESSION['nombreFoodCheck'] = "Dieta Natural Balanceada Gatos - Pescado";

                    $energi = ($_SESSION['requirimient_energi'][$_SESSION['id']]);
                    $var = ($energi);
                    $consumoDiaDiet = round((($var /  $Kalorias) * 1.1) * 1000);
                } else if ($dieta == 'Cuidado Digestivo') {
                    $Kalorias = 1406;

                    $_SESSION['nombreFoodCheck'] = "Dieta Natural Prescrita Gatos - Cuidado Digestivo";

                    $energi = ($_SESSION['requirimient_energi'][$_SESSION['id']]);
                    $var = ($energi);
                    $consumoDiaDiet = round((($var /  $Kalorias) * 1.1) * 1000);
                } else if ($dieta == 'Peso-Diabetes') {
                    $Kalorias = 1486;

                    $_SESSION['nombreFoodCheck'] = "Dieta Natural Prescrita Gatos - Control de Peso-Diabetes";

                    $energi = ($_SESSION['requirimient_energi'][$_SESSION['id']]);
                    $var = ($energi);
                    $consumoDiaDiet = round((($var /  $Kalorias) * 1.1) * 1000);
                } else if ($dieta == 'Renal Pollo') {
                    $Kalorias = 1214;

                    $_SESSION['nombreFoodCheck'] = "Dieta Natural Prescrita Gatos - Cuidado Renal Pollo";

                    $energi = ($_SESSION['requirimient_energi'][$_SESSION['id']]);
                    $var = ($energi);
                    $consumoDiaDiet = round((($var /  $Kalorias) * 1.1) * 1000);
                }
            }

            return $_SESSION['consumoDía'] =  $consumoDiaDiet;
            exit();
        }
    }

    // Función para cerrar sesión
    public function serrar_sesion()
    {
        if (!isset($_SESSION['yo'])) {
            session_unset();
            session_destroy(); ?>
            <script>
                window.location.replace("<?php echo SERVERURL . 'home/' ?>");
            </script>
<?php exit();
        }
    }
}
