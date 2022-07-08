<?php
session_start(['name' => 'SPM']);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo COMPANY; ?></title>

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

    <!-- Link de Estilos -->
    <?php include './view/inc/Link.php'; ?>
</head>

<body>
    <?php

    $peticionAjax = false;

    require_once "./controller/controllerViews.php";
    $IV = new controllerViews();

    $views = $IV->get_controller_views();

    if ($views == "home" || $views == "404") {
        require_once "./view/content/" . $views . "-view.php";
    } else { ?>
        <!-- Main Container -->

        <?php include './view/inc/NavBar.php'; ?>

        <!-- Content All pages -->
        <?php
        include "./view/inc/Script.php";
    
        include $views;
    } ?>
    <!--=============================================
	=            Include JavaScript files           =
	==============================================-->


</body>

</html>