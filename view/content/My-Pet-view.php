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

<div class="container-fluid My-Pet">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
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
            <form action="" method="post" class="forms-my-pet">
                <span>Hola <input type="text" class="form-text" value="<?php echo $_SESSION['yo']['NombreYo']; ?>">. Ahora cuéntanos de tu mascota.</span>
                <br>
                <br>
                <span>Mi masota se llama <input type="text" class="form-text" name="name_pet"> y es un </span>
                <select class="form-select-my-pet" name="pet_type">
                    <option selected>...</option>
                    <option value="gato">gato</option>
                    <option value="perro">perro</option>
                </select>
                <br>
                <br>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col cont-button-g" style="margin-top:150px;">
                        <div class="button-g">
                            <button class="btn btn" type="submit" name="mi-pet" value="mi-pet">Siguiente <img class='mi-yo-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"></button>
                        </div>
                    </div>
                    <div class="col-2"></div>
                </div>
                </span>
            </form>
        </div>
        <div class="col-2"></div>
    </div>
</div>