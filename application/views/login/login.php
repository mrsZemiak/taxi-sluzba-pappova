
<div class="container" style="background-color:#333333; height: 100vh; overflow: hidden;">


	<div class="inner">
		<div class="edit_add margin-top" style="background-color:white;">
			<?php echo validation_errors()."<br>"; echo $error;?>
				<form class="form" method="post" action="<?php echo site_url("Login/Login/validation")?>">

					<div class="input_group">
						<label for="title">Váš email:</label>
						<input type="text" name="email" class="input_style" placeholder="Zadajte email"/>
					</div>

					<div class="input_group">
						<label for="title">Heslo:</label>
						<input type="password" name="heslo"  class="input_style"/>

					</div>

					<input type="submit" name="register" class="input_style_button" value="Login Me"/>

				</form>
			</div>
		</div>

	</div>
</div>
