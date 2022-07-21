<?php
include "./model/mainModel.php";

$yo = new mainModel();

if (isset($_POST['mi-pet'])) {

    $name_pet = $yo->limpiar_cadena($_POST['name_pet']);
    $pet_type = $yo->limpiar_cadena($_POST['pet_type']);

    $sessionSmg = "";

    if ($name_pet == "" || $pet_type == "") {

        $sessionSmg = "Todos los campos son obligatorios";
    } else {

        $_SESSION['mi_pet'] = [
            "Name_Pet" => $name_pet,
            "Pet_Type" => $pet_type
        ];
        header('Location:' . SERVERURL . 'condiction/');
    }
} ?>

<div class="container-fluid My-Pet" ondragstart="return false" onselectstart="return false" oncontextmenu="return false">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">

            <div style="padding: 3% 15% 0px 15%;">
                <form action="" method="post" class="forms-my-pet">
                    <?php
                    if (isset($sessionSmg)) {
                        if ($sessionSmg != '') {
                    ?>
                            <div class="alert alert-warning alert-dismissible fade show text-center alert-message " role="alert">
                                <?php echo $sessionSmg; ?>
                            </div>
                    <?php }
                    } ?>
                    <span>Hola <input type="text" class="form-text" value="<?php echo $_SESSION['yo']['NombreYo']; ?>">. Ahora cuéntanos de tu mascota.</span>
                    <br>
                    <br>
                    <span>Mi masota se llama
                        <input type="text" class="form-text" name="name_pet" value="<?php echo  $name_pet = isset($ciudad) ? $name_pet : ' ' ?>"> y es un
                    </span>

                    <select class="form-select-my-pet" name="pet_type" value="<?php echo  $name_pet = isset($ciudad) ? $name_pet : ' ' ?>">
                        <option selected>...</option>
                        <option value="Gato">Gato</option>
                        <option value="Perro">Perro</option>
                    </select>

                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-sm-8 cont-button-g" style="margin-top:80px;">
                            <div class="button-g">
                                <button class="btn btn" type="submit" name="mi-pet" value="mi-pet">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    </span>
                </form>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
</div>
<script>
    window.setTimeout(function() {
        $(".alert-message").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
</script>