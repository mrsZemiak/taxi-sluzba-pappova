<div class="container"  style="background-color:#333333; height: 100vh; overflow: hidden;">
	<div class="inner">
		<div class="edit_add margin-top" style="background-color:white;">
			<form method="post" action="" class="form">

				<div class="input_group">
					<label for="title">Počet miest</label>
					<i class="fa fa-sort-numeric-asc"></i>
					<input type="number" class="input_style" name="pocet_miest" placeholder="Zadajte počet miest"
						   value="<?php echo
						   !empty($post['pocet_miest']) ? $post['pocet_miest'] : ''; ?>">
					<?php echo form_error('pocet_miest', '<p class="text-danger">', '</p>'); ?>
				</div>

				<div class="input_group">
					<label for="title">ECV</label>
					<i class="fa fa-clipboard"></i>
					<input type="text" class="input_style"
						   name="ecv" placeholder="Zadajte ečv" value="<?php echo
					!empty($post['ecv']) ? $post['ecv'] : ''; ?>">
					<?php echo form_error('ecv', '<p class="text-danger">', '</p>'); ?>
				</div>

				<div class="input_group">
					<label for="title">Značka</label>
					<i class="fa fa-car"></i>
					<input type="text" class="input_style"
						   name="znacka" placeholder="Zadajte model auta" value="<?php echo
					!empty($post['znacka']) ? $post['znacka'] : ''; ?>">
					<?php echo form_error('znacka', '<p class="text-danger">', '</p>'); ?>
				</div>

				<input type="submit" name="postSubmit" class="input_style_button" value="Spracuj"/>
			</form>
		</div>
	</div>
</div>


<script>
	$.widget.bridge('uibutton', $.ui.button);
</script>

