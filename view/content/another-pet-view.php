<?php
include "./model/mainModel.php";

$yo = new mainModel();

if (isset($_POST['condiction'])) {


    $sessionSmg = "";

    if (!isset($_POST['additional_check'])) {

        $sessionSmg = "Todos los campos son obligatorios";
    } else {

        $additional_check = $yo->limpiar_cadena($_POST['additional_check']);

        $_SESSION['additional'][$_SESSION['id']] = [
            "additional_check" => $additional_check
        ];

        if ($additional_check == "Sí") {

            $_SESSION['data_pet'][$_SESSION['id']] = [
                'Nombre' => $_SESSION['yo']['NombreYo'],
                'Ciudad' => $_SESSION['yo']['CiudadYo'],
                'Phone' => $_SESSION['yo']['phone'],
                'Email' => $_SESSION['yo']['EmailYo'],
                'Celular' => $_SESSION['yo']['CelularYo'],
                // Finaliza el 1 Modulo
                'Nombre_Pet' => $_SESSION['mi_pet']['Name_Pet'],
                'Pet_Tipe' => $_SESSION['mi_pet']['Pet_Type'],
                // Finaliza el 2 Modulo
                'TyCOnd' => $_SESSION['condiction']['Type_Cond'],
                // Finaliza el 3 Modulo
                'TrEsteri' => $_SESSION['esterilizad']['esterilizad'],
                // Finaliza el 4 Modulo
                'TrRaze' => $_SESSION['type_raze']['type_raze'],
                // Finaliza el 5 Modulo
                'DnNacio' => $_SESSION['date_nacio']['date_nacio'],
                // Finaliza el 6 Modulo
                'WpPeso' => $_SESSION['wight_peso']['wight_peso'],
                'WpPesoOp' => $_SESSION['wight_peso']['wight_peso_op'],
                // Finaliza el 7 Modulo
                'FsStyle' => $_SESSION['food_style']['food_style'],
                // Finaliza el 8 Modulo
                'FtConcentra' => $_SESSION['food_type']['concentrado'],
                'FtMarca' => $_SESSION['food_type']['marca'],
                // Finaliza el 9 Modulo
                'PbBuild' => $_SESSION['physical_build']['physical_build'],
                // Finaliza el 10 Modulo
                'PaActivity' => $_SESSION['physical_activity']['physical_activity'],
                // Finaliza el 11 Modulo
                'TiPollo' => $_SESSION['type_intolerance']['type_intolerance'],
                'TiPollo' => $_SESSION['type_intolerance']['check_pollo'],
                'TiRes' => $_SESSION['type_intolerance']['check_res'],
                'TiPes' => $_SESSION['type_intolerance']['check_pescado'],
                'TiPava' => $_SESSION['type_intolerance']['check_pavo'],
                'TiZanaho' => $_SESSION['type_intolerance']['check_zanahoria'],
                'TiRemola' => $_SESSION['type_intolerance']['check_remolacha'],
                'TiEspinaca' => $_SESSION['type_intolerance']['check_espinaca'],
                'TiZuquini' => $_SESSION['type_intolerance']['check_zuquini'],
                'TiOtro' => $_SESSION['type_intolerance']['check_otro'],
                'TiText' => $_SESSION['type_intolerance']['name_text'],
                // Finaliza el 12 Modulo

                'McMedica' => $_SESSION['medical_condition']['cond_medica'],
                'McDigest' => $_SESSION['medical_condition']['check_problem_digest'],
                'McRenal' => $_SESSION['medical_condition']['check_problem_renales'],
                'McCancer' => $_SESSION['medical_condition']['check_cancer'],
                'McProCard' => $_SESSION['medical_condition']['check_problem_card'],
                'McObesidad' => $_SESSION['medical_condition']['check_obsesidad'],
                'McProHepat' => $_SESSION['medical_condition']['check_problem_hepat'],
                'McArticu' => $_SESSION['medical_condition']['check_problem_articu'],
                'McProblePiel' => $_SESSION['medical_condition']['check_problem_piel'],
                'McEstruv' => $_SESSION['medical_condition']['check_calc_estruv'],
                'McAlergAliment' => $_SESSION['medical_condition']['check_alerg_aliment'],
                'McEstreni' => $_SESSION['medical_condition']['check_estren'],
                'McChunt' => $_SESSION['medical_condition']['check_chunt'],
                'McPancreatis' => $_SESSION['medical_condition']['check_pancreatitis'],
                'McProArti' => $_SESSION['medical_condition']['check_problem_articul'],
                'McOtro' => $_SESSION['medical_condition']['check_otro'],
                'McText' => $_SESSION['medical_condition']['check_textarea'],
                // Finaliza el 13 Modulo
                'AsDiarrea' => $_SESSION['associated_sympt']['check_diarrea'],
                'AsVomito' => $_SESSION['associated_sympt']['check_vomito'],
                'AsGases' => $_SESSION['associated_sympt']['check_gases'],
                'AsMalAliento' => $_SESSION['associated_sympt']['check_mal_aliento'],
                'AsCaidaPelo' => $_SESSION['associated_sympt']['check_caida_pelo'],
                'AsPicazon' => $_SESSION['associated_sympt']['check_picazon'],
                'AsPeloOpa' => $_SESSION['associated_sympt']['check_pelo_opaco'],
                'AsConvuls' => $_SESSION['associated_sympt']['check_convulsiones'],
                'AsArticul' => $_SESSION['associated_sympt']['check_dolor_articulas'],
                'AsDesanimo' => $_SESSION['associated_sympt']['check_desanimo'],
                'AsAyuno' => $_SESSION['associated_sympt']['check_ayuno_prol'],
                'AsOtro' => $_SESSION['associated_sympt']['check_otro'],
                'AsTextArea' => $_SESSION['associated_sympt']['check_textarea'],
                // Finaliza el 14 Modulo
                'VqCheck' => $_SESSION['veterinary_qua']['veterinary_check'],
                'VqNaeFile' => $_SESSION['veterinary_qua']['newFileName'],
                // Finaliza el 15 Modulo
                'AdCheck' => $_SESSION['additional_con']['additional_check']
                // Finaliza el 16 Modulo
            ];

            $_SESSION['id'] += 1;

            header('Location:' . SERVERURL . 'Yo/');
        } else {

            $_SESSION['data_pet'][$_SESSION['id']] = [
                'Nombre' => $_SESSION['yo'][$_SESSION['id']]['NombreYo'],
                'Ciudad' => $_SESSION['yo'][$_SESSION['id']]['CiudadYo'],
                'Phone' => $_SESSION['yo'][$_SESSION['id']]['phone'],
                'Email' => $_SESSION['yo'][$_SESSION['id']]['EmailYo'],
                'Celular' => $_SESSION['yo'][$_SESSION['id']]['CelularYo'],
                // Finaliza el 1 Modulo
                'Nombre_Pet' => $_SESSION['mi_pet'][$_SESSION['id']]['Name_Pet'],
                'Pet_Tipe' => $_SESSION['mi_pet'][$_SESSION['id']]['Pet_Type'],
                // Finaliza el 2 Modulo
                'TyCOnd' => $_SESSION['condiction'][$_SESSION['id']]['Type_Cond'],
                // Finaliza el 3 Modulo
                'TrEsteri' => $_SESSION['esterilizad'][$_SESSION['id']]['esterilizad'],
                // Finaliza el 4 Modulo
                'TrRaze' => $_SESSION['type_raze'][$_SESSION['id']]['type_raze'],
                // Finaliza el 5 Modulo
                'DnNacio' => $_SESSION['date_nacio'][$_SESSION['id']]['date_nacio'],
                // Finaliza el 6 Modulo
                'WpPeso' => $_SESSION['wight_peso'][$_SESSION['id']]['wight_peso'],
                'WpPesoOp' => $_SESSION['wight_peso'][$_SESSION['id']]['wight_peso_op'],
                // Finaliza el 7 Modulo
                'FsStyle' => $_SESSION['food_style'][$_SESSION['id']]['food_style'],
                // Finaliza el 8 Modulo
                'FtConcentra' => $_SESSION['food_type'][$_SESSION['id']]['concentrado'],
                'FtMarca' => $_SESSION['food_type'][$_SESSION['id']]['marca'],
                // Finaliza el 9 Modulo
                'PbBuild' => $_SESSION['physical_build'][$_SESSION['id']]['physical_build'],
                // Finaliza el 10 Modulo
                'PaActivity' => $_SESSION['physical_activity'][$_SESSION['id']]['physical_activity'],
                // Finaliza el 11 Modulo
                'TiPollo' => $_SESSION['type_intolerance'][$_SESSION['id']]['check_pollo'],
                'TiRes' => $_SESSION['type_intolerance'][$_SESSION['id']]['check_res'],
                'TiPes' => $_SESSION['type_intolerance'][$_SESSION['id']]['check_pescado'],
                'TiPava' => $_SESSION['type_intolerance'][$_SESSION['id']]['check_pavo'],
                'TiZanaho' => $_SESSION['type_intolerance'][$_SESSION['id']]['check_zanahoria'],
                'TiRemola' => $_SESSION['type_intolerance'][$_SESSION['id']]['check_remolacha'],
                'TiEspinaca' => $_SESSION['type_intolerance'][$_SESSION['id']]['check_espinaca'],
                'TiZuquini' => $_SESSION['type_intolerance'][$_SESSION['id']]['check_zuquini'],
                'TiOtro' => $_SESSION['type_intolerance'][$_SESSION['id']]['check_otro'],
                'TiText' => $_SESSION['type_intolerance'][$_SESSION['id']]['name_text'],
                // Finaliza el 12 Modulo
                'McMedica' => $_SESSION['medical_condition'][$_SESSION['id']]['cond_medica'],
                'McDigest' => $_SESSION['medical_condition'][$_SESSION['id']]['check_problem_digest'],
                'McRenal' => $_SESSION['medical_condition'][$_SESSION['id']]['check_problem_renales'],
                'McCancer' => $_SESSION['medical_condition'][$_SESSION['id']]['check_cancer'],
                'McProCard' => $_SESSION['medical_condition'][$_SESSION['id']]['check_problem_card'],
                'McObesidad' => $_SESSION['medical_condition'][$_SESSION['id']]['check_obsesidad'],
                'McProHepat' => $_SESSION['medical_condition'][$_SESSION['id']]['check_problem_hepat'],
                'McArticu' => $_SESSION['medical_condition'][$_SESSION['id']]['check_problem_articu'],
                'McProblePiel' => $_SESSION['medical_condition'][$_SESSION['id']]['check_problem_piel'],
                'McEstruv' => $_SESSION['medical_condition'][$_SESSION['id']]['check_calc_estruv'],
                'McAlergAliment' => $_SESSION['medical_condition'][$_SESSION['id']]['check_alerg_aliment'],
                'McEstreni' => $_SESSION['medical_condition'][$_SESSION['id']]['check_estren'],
                'McChunt' => $_SESSION['medical_condition'][$_SESSION['id']]['check_chunt'],
                'McPancreatis' => $_SESSION['medical_condition'][$_SESSION['id']]['check_pancreatitis'],
                'McProArti' => $_SESSION['medical_condition'][$_SESSION['id']]['check_problem_articul'],
                'McOtro' => $_SESSION['medical_condition'][$_SESSION['id']]['check_otro'],
                'McText' => $_SESSION['medical_condition'][$_SESSION['id']]['check_textarea'],
                // Finaliza el 13 Modulo
                'AsDiarrea' => $_SESSION['associated_sympt'][$_SESSION['id']]['check_diarrea'],
                'AsVomito' => $_SESSION['associated_sympt'][$_SESSION['id']]['check_vomito'],
                'AsGases' => $_SESSION['associated_sympt'][$_SESSION['id']]['check_gases'],
                'AsMalAliento' => $_SESSION['associated_sympt'][$_SESSION['id']]['check_mal_aliento'],
                'AsCaidaPelo' => $_SESSION['associated_sympt'][$_SESSION['id']]['check_caida_pelo'],
                'AsPicazon' => $_SESSION['associated_sympt'][$_SESSION['id']]['check_picazon'],
                'AsPeloOpa' => $_SESSION['associated_sympt'][$_SESSION['id']]['check_pelo_opaco'],
                'AsConvuls' => $_SESSION['associated_sympt'][$_SESSION['id']]['check_convulsiones'],
                'AsArticul' => $_SESSION['associated_sympt'][$_SESSION['id']]['check_dolor_articulas'],
                'AsDesanimo' => $_SESSION['associated_sympt'][$_SESSION['id']]['check_desanimo'],
                'AsAyuno' => $_SESSION['associated_sympt'][$_SESSION['id']]['check_ayuno_prol'],
                'AsOtro' => $_SESSION['associated_sympt'][$_SESSION['id']]['check_otro'],
                'AsTextArea' => $_SESSION['associated_sympt'][$_SESSION['id']]['check_textarea'],
                // Finaliza el 14 Modulo
                'VqCheck' => $_SESSION['veterinary_qua'][$_SESSION['id']]['veterinary_check'],
                'VqNaeFile' => $_SESSION['veterinary_qua'][$_SESSION['id']]['newFileName'],
                // Finaliza el 15 Modulo
                'AdCheck' => $_SESSION['additional_con'][$_SESSION['id']]['additional_check']
                // Finaliza el 16 Modulo
            ];
            header('Location:' . SERVERURL . 'food/');
        }
    }
}
?>
<div class="container condiction" ondragstart="return false" onselectstart="return false" oncontextmenu="return false">
    <div class="row">
        <div class="col-3">
            <div class="fondo-image-div margin-50">

            </div>
        </div>
        <div class="col-9">
            <?php
            if (isset($sessionSmg)) {
                if ($sessionSmg != '') {
            ?>
                    <div class="alert alert-warning alert-dismissible fade show text-center alert-message " role="alert">
                        <?php echo $sessionSmg; ?>
                    </div>
            <?php
                }
            }
            ?>
            <div>

                <form action="" method="post" class="forms-condiction">
                    <h2>Perfecto, hemos terminado de recoger la información de <span class="color-test-h2">'<?php echo $_SESSION['mi_pet'][$_SESSION['id']]['Name_Pet']; ?>'</span></h2>
                    <p class="text-20">Tienes otra mascota a la que quieras consentir con un producto especificamente para ella?</p>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="Sí" id="additional_check" name="additional_check"><br>
                                <label class="form-check-label" for="additional_check" style="font-size:28px;">
                                    SÍ
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="No" id="additional_check" name="additional_check"><br>
                                <label class="form-check-label" for="additional_check" style="font-size:28px;">
                                    NO
                                </label>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-6 cont-button-g">
                            <div class="button-g text-center margin-50 regresar">
                                <a class="btn" href="<?php echo SERVERURL; ?>veterinary-qualification/"> Atras <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></a>
                            </div>
                            <br>
                        </div>
                        <div class="col-6 cont-button-g">
                            <div class="button-g text-center margin-50">
                                <button class="btn withe-l" type="submit" name="condiction" value="condiction">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
</div>
<script>
    window.setTimeout(function() {
        $(".alert-message").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
</script>