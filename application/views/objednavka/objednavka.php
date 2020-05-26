<div class="container" style="background-color:#333333; height: 100vh; overflow: hidden;">


		<div class="inner">
			<div class="edit_add margin-top" style="background-color:white;">
				<div>
					<?php if($oznamenie==true){ ?> <div class="oznamenie">
						<p>
							Vaša objednávka bola odoslaná!
						</p>
					</div>
					<?php } ?>
					<form  class="form" method="post" action="<?php echo site_url("Objednavka/Objednavka/objednavka")?>">

					<div class="input_group">
						<label for="title">Cesta odkiaľ:</label>
						<input type="text" name="odkial" class="input_style" placeholder="Zadajte odkiaľ"/>
					</div>

					<div class="input_group">
						<label for="title">Cesta kam:</label>
						<input type="text" name="kam"  class="input_style" placeholder="Zadajte kam" />

					</div>
						<div class="input_group">
							<label for="title">Kam</label>
						<select name="oblast" class="input_style">
							<?php
							foreach ($cennik as $item) {

								?>	<option value="<?php echo $item->id; ?>">
									<?php echo $item->oblast." ".$item->cena."€"; ?>
								</option> <?php } ?>
						</select>
						</div>
						<input type="submit" name="register" class="input_style_button" value="Objednaj"/>

				</form>
			</div>
		</div>

	</div>
</div>
