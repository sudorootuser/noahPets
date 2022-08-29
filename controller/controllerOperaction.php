<?php

class controllerOperation
{

    // Función para definir el Factor por el tipo de razá y obtener el peso metbolico
    public function pesoMetabolico()
    {
        // Se condiciona los valores del peso dependiendo de la opción en tipo de mascota
        // se declara una constante la cual se usa para sacar el peso metabólico
        $potencia = 0.75; //Se crea una constante de la potencia

        $peso = $_SESSION['wight_peso'][$_SESSION['id']]['wight_peso'];

        $resul_potencia = pow($peso, $potencia);

        $pesoMetabolico = bcdiv($resul_potencia, '1', 2);

        $_SESSION['pesoMetabolico'][$_SESSION['id']] = $pesoMetabolico;
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

            $factor = 130;
        }

        if ($_SESSION['physical_build'][$_SESSION['id']]['physical_build'] == 'Delgado') {

            $delgado = 1.15;

            $contexturaFisica = $factor * $delgado;

            // $rest = round($contexturaFisica);
            $rest = $contexturaFisica;

            controllerOperation::nivelActividad($rest);

            return  $_SESSION['contexturaFisica_otro'][$_SESSION['id']] = $rest;

            exit();
        } elseif ($_SESSION['physical_build'][$_SESSION['id']]['physical_build'] == 'Ideal') {


            $ideal = 1;

            $contexturaFisica = $factor * $ideal;

            // $rest = round($contexturaFisica);
            $rest = $contexturaFisica;

            controllerOperation::nivelActividad($rest);

            return  $_SESSION['contexturaFisica_otro'][$_SESSION['id']] = $rest;

            exit();
        } elseif ($_SESSION['physical_build'][$_SESSION['id']]['physical_build'] == 'Sobrepeso') {

            $sobrepeso = 0.85;

            $contexturaFisica = $factor * $sobrepeso;

            // $rest = round($contexturaFisica);
            $rest = $contexturaFisica;

            controllerOperation::nivelActividad($rest);

            return  $_SESSION['contexturaFisica_otro'][$_SESSION['id']] = $rest;

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

            // $totalActividad = round($nivelSActividad);
            $totalActividad = $nivelSActividad;

            controllerOperation::consumoSnacks($totalActividad);

            return  $_SESSION['nivelActividad_otro'][$_SESSION['id']] = $totalActividad;

            exit();
        } elseif ($_SESSION['physical_activity'][$_SESSION['id']]['physical_activity'] == 'Activa') {


            $pocoActivo = 1;

            $nivelSActividad = $rest * $pocoActivo;

            // $totalActividad = round($nivelSActividad);
            $totalActividad = $nivelSActividad;

            controllerOperation::consumoSnacks($totalActividad);

            return  $_SESSION['nivelActividad_otro'][$_SESSION['id']] = $totalActividad;

            exit();
        } elseif ($_SESSION['physical_activity'][$_SESSION['id']]['physical_activity'] == 'Muy Activa') {


            $muyActivo = 1.0768;

            $nivelSActividad = $rest * $muyActivo;

            // $totalActividad = round($nivelSActividad);
            $totalActividad = $nivelSActividad;

            controllerOperation::consumoSnacks($totalActividad);

            return  $_SESSION['nivelActividad_otro'][$_SESSION['id']] = $totalActividad;

            exit();
        }
    }

    // Funcion para obtener el consumo de snacks
    public function consumoSnacks($nivelSActividad)
    {

        if ($_SESSION['snacks'][$_SESSION['id']]['snacks'] == 'Bastante') {

            $result_snacks = $nivelSActividad * 0.95;

            // $totalSnacks = round($result_snacks);
            $totalSnacks = $result_snacks;

            $requirimiento_energia = $totalSnacks * $_SESSION['pesoMetabolico'][$_SESSION['id']];

            $_SESSION['requirimient_energi'][$_SESSION['id']] = $requirimiento_energia;

            controllerOperation::caloriasDieta();

            return $_SESSION['result_Snack'][$_SESSION['id']] = $totalSnacks;
            exit();
        } else if ($_SESSION['snacks'][$_SESSION['id']]['snacks'] == 'Ocasional') {

            $result_snacks = $nivelSActividad * 0.97;

            // $totalSnacks = round($result_snacks);
            $totalSnacks = $result_snacks;

            $requirimiento_energia = $totalSnacks * $_SESSION['pesoMetabolico'][$_SESSION['id']];

            $_SESSION['requirimient_energi'][$_SESSION['id']] = $requirimiento_energia;
            controllerOperation::caloriasDieta();

            return $_SESSION['result_Snack'][$_SESSION['id']] = $totalSnacks;
            exit();
        }
        if ($_SESSION['snacks'][$_SESSION['id']]['snacks'] == 'Nunca') {

            $result_snacks = $nivelSActividad * 1;

            // $totalSnacks = round($result_snacks);
            $totalSnacks = $result_snacks;

            $requirimiento_energia = $totalSnacks * $_SESSION['pesoMetabolico'][$_SESSION['id']];

            $_SESSION['requirimient_energi'][$_SESSION['id']] = $requirimiento_energia;

            controllerOperation::caloriasDieta();

            return $_SESSION['result_Snack'][$_SESSION['id']] = $totalSnacks;
            exit();
        }
    }

    // Función para obtener las calorias de la dieta
    public function caloriasDieta()
    {
        if ($_SESSION['medical_condition'][$_SESSION['id']]['cond_medica'] == 'Sí') {
            $dieta = $_SESSION['food_check'][$_SESSION['id']]['cuidado_check'];


            if ($dieta == 'BCahorros cuidado digestivo') {
                $Kalorias = 2219;

                $_SESSION['nombreFoodCuidado'] = "Dieta Natural Prescrita - Cachorros Digestiva";
                $_SESSION['consumoDiaPrein'] = round((($_SESSION['requirimient_energi'][$_SESSION['id']] /  $Kalorias) * 1000), 0);
            } else if ($dieta == 'Cuidado Digestivo') {
                $Kalorias = 2482;

                $_SESSION['nombreFoodCuidado'] = "Dieta Natural Prescrita - Cuidado Digestivo";
                $_SESSION['consumoDiaPrein'] = round((($_SESSION['requirimient_energi'][$_SESSION['id']] /  $Kalorias) * 1000), 0);
            } else if ($dieta == 'Alergia sabor carne') {
                $Kalorias = 2470;
                $_SESSION['nombreFoodCuidado'] = "Dieta Natural Prescrita - Alergias";

                $_SESSION['consumoDiaPrein'] = round((($_SESSION['requirimient_energi'][$_SESSION['id']] /  $Kalorias) * 1000), 0);
            } else if ($dieta == 'Cálculos estruvita') {
                $Kalorias = 2540;

                $_SESSION['nombreFoodCuidado'] = "Dieta Natural Prescrita - Estruvita";
                $_SESSION['consumoDiaPrein'] = round((($_SESSION['requirimient_energi'][$_SESSION['id']] /  $Kalorias) * 1000), 0);
            } else if ($dieta == 'Cálculso oxalatos') {
                $Kalorias = 2424;

                $_SESSION['nombreFoodCuidado'] = "Dieta Natural Prescrita - Oxalatos";
                $_SESSION['consumoDiaPrein'] = round((($_SESSION['requirimient_energi'][$_SESSION['id']] /  $Kalorias) * 1000), 0);
            } else if ($dieta == 'Control peso') {
                $Kalorias = 2000;

                $_SESSION['nombreFoodCuidado'] = "Dieta Natural Prescrita - Control de Peso";
                $_SESSION['consumoDiaPrein'] = round((($_SESSION['requirimient_energi'][$_SESSION['id']] /  $Kalorias) * 1000), 0);
            } else if ($dieta == 'Cuidado articular') {
                $Kalorias = 2349;

                $_SESSION['nombreFoodCuidado'] = "DDieta Natural Prescrita - Osteoarticular";
                $_SESSION['consumoDiaPrein'] = round((($_SESSION['requirimient_energi'][$_SESSION['id']] /  $Kalorias) * 1000), 0);
            } else if ($dieta == 'Cuidado cardiaco') {
                $Kalorias = 2618;

                $_SESSION['nombreFoodCuidado'] = "Dieta Natural Prescrita - Cuidado Cardíaco";
                $_SESSION['consumoDiaPrein'] = round((($_SESSION['requirimient_energi'][$_SESSION['id']] /  $Kalorias) * 1000), 0);
            } else if ($dieta == 'Cuidado de la piel') {
                $Kalorias = 2435;

                $_SESSION['nombreFoodCuidado'] = "Dieta Natural Prescrita - Cuidado de Piel";
                $_SESSION['consumoDiaPrein'] = round((($_SESSION['requirimient_energi'][$_SESSION['id']] /  $Kalorias) * 1000), 0);
            } else if ($dieta == 'Cuidado hepática ') {
                $Kalorias = 2421;

                $_SESSION['nombreFoodCuidado'] = "Dieta Natural Prescrita - Cuidado Hepático";
                $_SESSION['consumoDiaPrein'] = round((($_SESSION['requirimient_energi'][$_SESSION['id']] /  $Kalorias) * 1000), 0);
            } else if ($dieta == 'Cuidado hepatica sabor carne') {
                $Kalorias = 2555;

                $_SESSION['nombreFoodCuidado'] = "Dieta Natural Prescrita - Cuidado Hepático Res";
                $_SESSION['consumoDiaPrein'] = round((($_SESSION['requirimient_energi'][$_SESSION['id']] /  $Kalorias) * 1000), 0);
            } else if ($dieta == 'Cuidado renal') {
                $Kalorias = 2565;

                $_SESSION['nombreFoodCuidado'] = "Dieta Natural Prescrita - Cuidado Renal";
                $_SESSION['consumoDiaPrein'] = round((($_SESSION['requirimient_energi'][$_SESSION['id']] /  $Kalorias) * 1000), 0);
            } else if ($dieta == 'Diabetes') {
                $Kalorias = 1780;

                $_SESSION['nombreFoodCuidado'] = "Dieta Natural Prescrita - Diabetes";
                $_SESSION['consumoDiaPrein'] = round((($_SESSION['requirimient_energi'][$_SESSION['id']] /  $Kalorias) * 1000), 0);
            } else if ($dieta == 'Estreñimiento') {
                $Kalorias = 2360;

                $_SESSION['nombreFoodCuidado'] = "Dieta Natural Prescrita - Estreñimiento";
                $_SESSION['consumoDiaPrein'] = round((($_SESSION['requirimient_energi'][$_SESSION['id']] /  $Kalorias) * 1000), 0);
            } else if ($dieta == 'Grain Free') {
                $Kalorias = 1370;

                $_SESSION['nombreFoodCuidado'] = "Dieta Natural Prescrita - Cuidado Hepático Grain Free";
                $_SESSION['consumoDiaPrein'] = round((($_SESSION['requirimient_energi'][$_SESSION['id']] /  $Kalorias) * 1000), 0);
            } else if ($dieta == 'Hemoparásitos') {
                $Kalorias = 2308;

                $_SESSION['nombreFoodCuidado'] = "Dieta Natural Prescrita - Hemoparásitos";
                $_SESSION['consumoDiaPrein'] = round((($_SESSION['requirimient_energi'][$_SESSION['id']] /  $Kalorias) * 1000), 0);
            } else if ($dieta == 'Hipoalergenica cerdo') {
                $Kalorias = 2541;

                $_SESSION['nombreFoodCuidado'] = "Dieta Natural Prescrita - Hipoalergénica";
                $_SESSION['consumoDiaPrein'] = round((($_SESSION['requirimient_energi'][$_SESSION['id']] /  $Kalorias) * 1000), 0);
            } else if ($dieta == 'Oncológico') {
                $Kalorias = 2159;

                $_SESSION['nombreFoodCuidado'] = "Dieta Natural Prescrita - Oncológica";
                $_SESSION['consumoDiaPrein'] = round((($_SESSION['requirimient_energi'][$_SESSION['id']] /  $Kalorias) * 1000), 0);
            } else if ($dieta == 'Pancreatitis') {
                $Kalorias = 2374;

                $_SESSION['nombreFoodCuidado'] = "Dieta Natural Prescrita - Pancreatitis";
                $_SESSION['consumoDiaPrein'] = round((($_SESSION['requirimient_energi'][$_SESSION['id']] /  $Kalorias) * 1000), 0);
            } else if ($dieta == 'Shunt') {
                $Kalorias = 2089;

                $_SESSION['nombreFoodCuidado'] = "Dieta Natural Prescrita - Shunt";
                $_SESSION['consumoDiaPrein'] = round((($_SESSION['requirimient_energi'][$_SESSION['id']] /  $Kalorias) * 1000), 0);
            }

            // Inicio de la dieta
            $dieta = $_SESSION['food_check'][$_SESSION['id']]['ideal_check'];

            if ($dieta == 'BCarne') {
                $Kalorias = 2614;

                $_SESSION['nombreFoodCheck'] = "Dieta Natural Balanceada - Res";
                $_SESSION['consumoDiaDiet'] = round((($_SESSION['requirimient_energi'][$_SESSION['id']] /  $Kalorias) * 1000), 0);
            } else if ($dieta == 'BCarne y leguminosas') {
                $Kalorias = 2140;

                $_SESSION['nombreFoodCheck'] = "Dieta Natural Balanceada Light";
                $_SESSION['consumoDiaDiet'] = round((($_SESSION['requirimient_energi'][$_SESSION['id']] /  $Kalorias) * 1000), 0);
            } else if ($dieta == 'BCerdo') {
                $Kalorias = 2599;

                $_SESSION['nombreFoodCheck'] = "Dieta Natural Balanceada - Cerdo";
                $_SESSION['consumoDiaDiet'] = round((($_SESSION['requirimient_energi'][$_SESSION['id']] /  $Kalorias) * 1000), 0);
            } else if ($dieta == 'BMix') {
                $Kalorias = 2381;

                $_SESSION['nombreFoodCheck'] = "Dieta Natural Balanceada - Res y Pollo";
                $_SESSION['consumoDiaDiet'] = round((($_SESSION['requirimient_energi'][$_SESSION['id']] /  $Kalorias) * 1000), 0);
            } else if ($dieta == 'BPollo') {
                $Kalorias = 2440;

                $_SESSION['nombreFoodCheck'] = "Dieta Natural Balanceada - Pollo";
                $_SESSION['consumoDiaDiet'] = round((($_SESSION['requirimient_energi'][$_SESSION['id']] /  $Kalorias) * 1000), 0);
            } else if ($dieta == 'Senior ') {
                $Kalorias = 2441;
                echo 'asdsadasdas';
                die;
                $_SESSION['nombreFoodCheck'] = "Dieta Natural Balanceada - Senior";
                $_SESSION['consumoDiaDiet'] = round((($_SESSION['requirimient_energi'][$_SESSION['id']] /  $Kalorias) * 1000), 0);
            } else if ($dieta == 'BCahorros') {
                $Kalorias = 2300;

                $_SESSION['nombreFoodCheck'] = "Dieta Natural Balanceada - Cachorros";
                $_SESSION['consumoDiaDiet'] = round((($_SESSION['requirimient_energi'][$_SESSION['id']] /  $Kalorias) * 1000), 0);
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

            if ($dieta == 'BCarne') {
                $Kalorias = 2614;

                $_SESSION['nombreFoodCheck'] = "Dieta Natural Balanceada - Res";
                $consumoDiaDiet = round((($_SESSION['requirimient_energi'][$_SESSION['id']] /  $Kalorias) * 1000), 0);
            } else if ($dieta == 'BCarne y leguminosas') {
                $Kalorias = 2140;

                $_SESSION['nombreFoodCheck'] = "Dieta Natural Balanceada Light";
                $consumoDiaDiet = round((($_SESSION['requirimient_energi'][$_SESSION['id']] /  $Kalorias) * 1000), 0);
            } else if ($dieta == 'BCerdo') {
                $Kalorias = 2599;

                $_SESSION['nombreFoodCheck'] = "Dieta Natural Balanceada - Cerdo";
                $consumoDiaDiet = round((($_SESSION['requirimient_energi'][$_SESSION['id']] /  $Kalorias) * 1000), 0);
            } else if ($dieta == 'BMix') {
                $Kalorias = 2381;

                $_SESSION['nombreFoodCheck'] = "Dieta Natural Balanceada - Res y Pollo";
                $consumoDiaDiet = round((($_SESSION['requirimient_energi'][$_SESSION['id']] /  $Kalorias) * 1000), 0);
            } else if ($dieta == 'BPollo') {
                $Kalorias = 2440;

                $_SESSION['nombreFoodCheck'] = "Dieta Natural Balanceada - Pollo";
                $consumoDiaDiet = round((($_SESSION['requirimient_energi'][$_SESSION['id']] /  $Kalorias) * 1000), 0);
            } else if ($dieta == 'Senior') {
                $Kalorias = 2441;

                $_SESSION['nombreFoodCheck'] = "Dieta Natural Balanceada - Senior";
                $consumoDiaDiet = round((($_SESSION['requirimient_energi'][$_SESSION['id']] /  $Kalorias) * 1000), 0);
            } else if ($dieta == 'BCahorros') {
                $Kalorias = 2300;

                $_SESSION['nombreFoodCheck'] = "Dieta Natural Balanceada - Cachorros";
                $consumoDiaDiet = round((($_SESSION['requirimient_energi'][$_SESSION['id']] /  $Kalorias) * 1000), 0);
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
