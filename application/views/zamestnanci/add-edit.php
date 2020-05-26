<div class="container " style="background-color:#333333; height: 100vh; overflow: hidden;">
	<div class="inner">
		<div class="edit_add margin-top" style="background-color:white;">
			<form method="post" action="" class="form">

				<div class="input_group">
					<i class="fa fa-user-circle"></i>
					<label for="title">Meno</label>
					<input type="text" class="input_style" name="meno" placeholder="Zadajte meno"
						   value="<?php echo
						   !empty($post['meno']) ? $post['meno'] : ''; ?>">
					<?php echo form_error('meno', '<p class="text-danger">', '</p>'); ?>
				</div>

				<div class="input_group">
					<i class="fa fa-phone"></i>
					<label for="title">Telefón</label>
					<input type="text" class="input_style" name="telefon" placeholder="Zadajte telefón"
						   value="<?php echo
						   !empty($post['telefon']) ? $post['telefon'] : ''; ?>">
					<?php echo form_error('telefon', '<p class="text-danger">', '</p>'); ?>
				</div>

				<div class="input_group">
					<i class="fa fa-map-pin"></i>
					<label for="title">Adresa</label>
					<input type="text" class="input_style" name="adresa" placeholder="Zadajte adresu"
						   value="<?php echo
						   !empty($post['adresa']) ? $post['adresa'] : ''; ?>">
					<?php echo form_error('adresa', '<p class="text-danger">', '</p>'); ?>
				</div>

				<div class="input_group">
					<i class="fa fa-at"></i>
					<label for="title">Email</label>
					<input type="email" class="input_style" name="email" placeholder="Zadajte email"
						   value="<?php echo
						   !empty($post['email']) ? $post['email'] : ''; ?>">
					<?php echo form_error('email', '<p class="text-danger">', '</p>'); ?>
				</div>

				<div class="input_group">
					<i class="fa fa-birthday-cake"></i>
					<label for="title">Dátum narodenia</label>
					<input type="date" class="input_style" name="datum_narodenia" placeholder="Zadajte dátum narodenia"
						   value="<?php echo
						   !empty($post['datum_narodenia']) ? $post['datum_narodenia'] : ''; ?>">
					<?php echo form_error('datum_narodenia', '<p class="text-danger">', '</p>'); ?>
				</div>

				<div class="input_group">
					<i class="fa fa-id-card"></i>
					<label for="title">Rodné číslo</label>
					<input type="number" class="input_style" name="rodne_cislo" placeholder="Zadajte rodné číslo"
						   value="<?php echo
						   !empty($post['rodne_cislo']) ? $post['rodne_cislo'] : ''; ?>">
					<?php echo form_error('rodne_cislo', '<p class="text-danger">', '</p>'); ?>
				</div>

				<div class="input_group">
					<i class="fa fa-calendar"></i>
					<label for="title">Dátum nástupu</label>
					<input type="date" class="input_style" name="datum_nastupu" placeholder="Zadajte dátum nástupu"
						   value="<?php echo
						   !empty($post['datum_nastupu']) ? $post['datum_nastupu'] : ''; ?>">
					<?php echo form_error('datum_nastupu', '<p class="text-danger">', '</p>'); ?>
				</div>
				<input type="submit" name="postSubmit" class="input_style_button" value="Spracuj"/>
			</form>
		</div>
	</div>
</div>


<script>
	$.widget.bridge('uibutton', $.ui.button);
</script>

