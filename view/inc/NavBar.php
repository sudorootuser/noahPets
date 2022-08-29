<?php $url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light" ondragstart="return false" onselectstart="return false" oncontextmenu="return false">
    <div class="container">
        <img class="navbar-brand nav_img" src="<?php echo SERVERURL ?>view/assets/img/icon_nav.png">
        <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> -->

        <div class="collapse navbar-collapse" id="navbarNavDropdown">

            <ul class="navbar-nav spacin-ul">
                <li class="nav-item spacin-item">
                    <a class="nav-link item-menu active" aria-current="page" href="#">Yo</a>
                </li>
                <li class="nav-item spacin-item">
                    <a class="nav-link item-menu" href="#">Mi Mascota</a>
                </li>
                <li class="nav-item spacin-item">
                    <a class="nav-link item-menu" href="#">Su condición</a>
                </li>
                <li class="nav-item spacin-item">
                    <a class="nav-link item-menu" href="#">Pre-Checkout</a>
                </li>

                <li class="nav-item spacin-item">
                    <a class="nav-link item-menu" href="#">Alimento</a>
                </li>
                <li class="nav-item spacin-item">
                    <a class="nav-link item-menu" href="#">Dieta</a>
                </li>
                <li class="nav-item spacin-item">
                    <a class="nav-link item-menu" href="#">Checkout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>