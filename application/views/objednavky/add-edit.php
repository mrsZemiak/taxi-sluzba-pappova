<div class="container" style="background-color:#333333; height: 100vh; overflow: hidden;">
	<div class="inner">
		<div class="edit_add  margin-top" style="background-color:white;">
			<form method="post" action="" class="form">

				<div class="input_group">
					<label for="title">Zákazník</label>
					<i class="fa fa-sort-numeric-asc"></i>
					<input type="text" class="input_style" name="meno" disabled placeholder="Zadajte počet miest"
						   value="<?php echo
						   !empty($post['meno']) ? $post['meno'] : ''; ?>">
					<?php echo form_error('meno', '<p class="text-danger">', '</p>'); ?>
				</div>

				<div class="input_group">
					<label for="title">Odkiaľ</label>
					<i class="fa fa-sort-numeric-asc"></i>
					<input type="text" class="input_style" name="odkial" placeholder="Zadajte adresu odkiaľ"
						   value="<?php echo
						   !empty($post['odkial']) ? $post['odkial'] : ''; ?>">
					<?php echo form_error('odkial', '<p class="text-danger">', '</p>'); ?>
				</div>

				<div class="input_group">
					<label for="title">Kam</label>
					<i class="fa fa-sort-numeric-asc"></i>
					<input type="text" class="input_style" name="kam" placeholder="Zadajte adresu kam"
						   value="<?php echo
						   !empty($post['kam']) ? $post['kam'] : ''; ?>">
					<?php echo form_error('kam', '<p class="text-danger">', '</p>'); ?>
				</div>

				<div class="input_group">
					<label for="title">Dátum</label>
					<i class="fa fa-sort-numeric-asc"></i>
					<input type="date" class="input_style" name="datum" placeholder="Zadajte dátum"
						   value="<?php echo
						   !empty($post['datum']) ? $post['datum'] : ''; ?>">
					<?php echo form_error('datum', '<p class="text-danger">', '</p>'); ?>
				</div>

				<div class="input_group">
					<label for="title">Čas</label>
					<i class="fa fa-sort-numeric-asc"></i>
					<input type="time" class="input_style" name="cas" placeholder="Zadajte čas"
						   value="<?php echo
						   !empty($post['cas']) ? $post['cas'] : ''; ?>">
					<?php echo form_error('cas', '<p class="text-danger">', '</p>'); ?>
				</div>

				<div class="input_group">
					<label for="title">Cenník</label>
					<i class="fa fa-clipboard"></i>
					<select name="cennik" class="input_style">
						<option value = "<?php echo $post['id_cennik']; ?>"><?php echo $post['oblast']; ?></option>
						<?php
						foreach ($getCennik as $row){ ?>
							<option value="<?php echo $row->id; ?>"><?php echo $row->oblast; ?></option>
						<?php }	?>
					</select>
				</div>

				<div class="input_group">
					<label for="title">Stav</label>
					<i class="fa fa-clipboard"></i>
					<select name="stav" class="input_style">
						<?php if($post['stav']==0){ ?>
						<option value="0">Aktívna</option>
							<option value="1">Prevzatá</option>
						<?php }else{ ?>
							<option value="1">Prevzatá</option>
							<option value="0">Aktívna</option>
						<?php } ?>
					</select>
				</div>
				<input type="submit" name="postSubmit" class="input_style_button" value="Spracuj"/>
			</form>
		</div>
	</div>
</div>


<script>
	$.widget.bridge('uibutton', $.ui.button);
</script>

