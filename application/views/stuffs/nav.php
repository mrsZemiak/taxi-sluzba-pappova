<?php $link = $_SERVER['PHP_SELF'];
$link_array = explode('/', $link);
$page = end($link_array); ?>
<div class="topnav" id="myTopnav">
	<div class="nav">
		<img src="<?php echo site_url("../images/logo_nav.png"); ?>"/>

		<div class="visible">

			<!---------- POKIAL NIKTO NIE JE PRIHLASENY--------->

			<?php if (!isset($_SESSION["email"])) { ?>
				<a href="<?php echo site_url("Welcome"); ?>" <?php if ($page == "Welcome") echo 'class="active"' ?>>O nás</a>
				<a href="<?php echo site_url("Objednavka/Objednavka"); ?>" <?php if ($page == "Objednavka") echo 'class="active"' ?>>Objednávka</a>
				<a href="<?php echo site_url("Cennik/Cennik"); ?>" <?php if ($page == "Cennik") echo 'class="active"' ?>>Cenník</a>
				<a href="<?php echo site_url("Kontakt/Kontakt"); ?>" <?php if ($page == "Kontakt") echo 'class="active"' ?>>Kontakt</a>
				<a href="<?php echo site_url("Login/Login"); ?>" <?php if ($page == "Login") echo 'class="active"' ?>>Prihlásenie</a>
				<a href="<?php echo site_url("Registracia/Registracia"); ?>" <?php if ($page == "Registracia") echo 'class="active"' ?>>Registrácia</a>
			<?php } ?>

			<!---------- Prihlasenie pre zakaznika--------->

			<?php if (isset($_SESSION['email']) && $_SESSION['role'] == 0) { ?>
				<a href="<?php echo site_url("Welcome"); ?>" <?php if ($page == "Welcome") echo 'class="active"' ?>>O nás</a>
				<a href="<?php echo site_url("Objednavka/Objednavka"); ?>" <?php if ($page == "Objednavka") echo 'class="active"' ?>>Objednávka</a>
				<a href="<?php echo site_url("Cennik/Cennik"); ?>" <?php if ($page == "Cennik") echo 'class="active"' ?>>Cenník</a>
				<a href="<?php echo site_url("Kontakt/Kontakt"); ?>" <?php if ($page == "Kontakt") echo 'class="active"' ?>>Kontakt</a>
				<a><?php echo $_SESSION['email']; ?> </a>
				<a href="<?php echo site_url("Login/Login/odhlasenie"); ?>">Odhlásenie sa</a>
			<?php } ?>

			<!---------- Zamestnanec prihlasenie--------->

			<?php if (isset($_SESSION['email']) && $_SESSION['role'] == 1) { ?>
				<a href="<?php echo site_url("Zamestnanci_index/Objednavky"); ?>" <?php if ($page == "Objednavky") echo 'class="active"' ?>>Objednávky</a>
				<a href="<?php echo site_url("Zamestnanci_index/Jazdy"); ?>" <?php if ($page == "Jazdy") echo 'class="active"' ?>>Jazdy</a>
				<a><?php echo $_SESSION['email']; ?> </a>
				<a href="<?php echo site_url("Login/Login/odhlasenie"); ?>">Odhlásenie sa</a>
			<?php } ?>

			<!---------- Admin prihlasenie--------->

			<?php if (isset($_SESSION['email']) && $_SESSION['role'] == 2) { ?>
				<a href="<?php echo site_url("Admin_index/Admin_index"); ?>" <?php if ($page == "Admin_index") echo 'class="active"' ?>>Dashboard</a>
				<a href="<?php echo site_url("Admin_index/Objednavky"); ?>" <?php if ($page == "Objednavky") echo 'class="active"' ?>>Objednávky</a>
				<a href="<?php echo site_url("Admin_index/Jazdy"); ?>" <?php if ($page == "Jazdy") echo 'class="active"' ?>>Jazdy</a>
				<a href="<?php echo site_url("Admin_index/Zamestnanci"); ?>" <?php if ($page == "Zamestnanci") echo 'class="active"' ?>>Zamestnanci</a>
				<a href="<?php echo site_url("Admin_index/Auta"); ?>" <?php if ($page == "Auta") echo 'class="active"' ?>>Autá</a>
				<a><?php echo $_SESSION['email']; ?> </a>
				<a href="<?php echo site_url("Login/Login/odhlasenie"); ?>">Odhlásenie sa</a>
			<?php } ?>


			<a href="javascript:void(0);" class="icon" onclick="myFunction()">
				<i class="fa fa-bars"></i>
			</a>
		</div>
	</div>
</div>
