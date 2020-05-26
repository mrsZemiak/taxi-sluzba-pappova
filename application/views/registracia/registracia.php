<div class="container" style="background-color:#333333; height: 100vh; overflow: hidden;">
	<div class="inner">
		<div class="edit_add margin-top" style="background-color:white;">
			<?php echo validation_errors()."<br>"; echo $error;?>
			<form class="form" method="post" method="post" action="<?php echo site_url("Registracia/Registracia/validation")?>">

				<div class="input_group">
					<label for="title">Vaše meno:</label>
					<input type="text" name="meno" class="input_style" placeholder="Zadajte meno"/>
				</div>
				<div class="input_group">
					<label for="title">Vaše tel. číslo:</label>
					<input type="text" name="telefon" class="input_style" placeholder="Zadajte číslo"/>
				</div>
				<div class="input_group">
					<label for="title">Vaša adresa:</label>
					<input type="text" name="adresa" class="input_style" placeholder="Zadajte adresu"/>
				</div>

				<div class="input_group">
					<label for="title">Váš email:</label>
					<input type="email" name="email" class="input_style" placeholder="Zadajte email"/>
				</div>
				<div class="input_group">
					<label for="title">Heslo:</label>
					<input type="password" name="heslo"  class="input_style"/>

				</div>

				<input type="submit" name="register" class="input_style_button" value="Register Me"/>

			</form>
		</div>
	</div>

</div>
</div>


