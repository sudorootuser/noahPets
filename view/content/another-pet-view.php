<?php
include "./model/mainModel.php";

$yo = new mainModel();

if (isset($_POST['condiction'])) {

    $additional_check = $yo->limpiar_cadena($_POST['additional_check']);

    $sessionSmg = "";

    if ($additional_check == "") {

        $sessionSmg = "Todos los campos son obligatorios";
    } else {

        $_SESSION['additional'] = [
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
            header('Location:' . SERVERURL . 'food/');
        }
    }
} ?>
<div class="container-fluid condiction" ondragstart="return false" onselectstart="return false" oncontextmenu="return false">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <?php
            if (isset($sessionSmg)) {
                if ($sessionSmg != '') {
            ?>
                    <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                        <strong>Error! </strong><?php echo $sessionSmg; ?><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
            <?php
                }
            }
            ?>
            <div style="padding: 3% 15% 0px 15%;">

                <form action="" method="post" class="forms-condiction">
                    <span>Perfecto, hemos terminado de recoger la información de <?php echo $_SESSION['mi_pet']['Name_Pet']; ?>
                        <br> ¿Tienes otra mascota a la que quieras consentir con un producto especificamente para ella?</span>
                    <div class="row">
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="Sí" id="additional_check" name="additional_check">
                                <label class="form-check-label" for="additional_check" style="font-size:28px;">
                                    SÍ
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="No" id="additional_check" name="additional_check">
                                <label class="form-check-label" for="additional_check" style="font-size:28px;">
                                    NO
                                </label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row another-pet-div">
                        <div class="col-1"></div>
                        <div class="col cont-button-p">
                            <div class="button-p">
                                <button class="btn btn" type="submit" name="condiction" value="condiction">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
                            </div>
                        </div>
                        <div class="col-4 another-pet">
                            <img class="another-pet-img" src="<?php echo SERVERURL; ?>view/assets/img/pet-another.png" alt="" srcset="">
                        </div>
                    </div>
                    </span>
                </form>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
</div>