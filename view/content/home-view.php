<!-- Content -->
<?php
echo session_unset();
echo session_destroy();
?>
<div class="container-fluid home" ondragstart="return false" onselectstart="return false" oncontextmenu="return false">
	<img src="./view/assets/img/NoahPets.png" alt="">
	<div class="row">
		<span><b>VAMOS A CONSTRUIR ALGO MARAVILLOSO Y ÚNICO</b></span>
		<p>Tu mascota te agradecerá los 3 minutos <br>
			que mejor habrás inventado para mejorar su calidad de vida
		</p>
		<div class="col-2"></div>
		<div class="col cont-button-home">
			<div class="button-home">
				<br>
				<a href="<?php echo SERVERURL; ?>Yo/">Empecemos <img class='mi-home-img' ; src="<?php echo SERVERURL; ?>view/assets/img/icons-pets.png"> </a>
				<br>
				<br>
			</div>
		</div>
		<div class="col-2"></div>
	</div>
</div>