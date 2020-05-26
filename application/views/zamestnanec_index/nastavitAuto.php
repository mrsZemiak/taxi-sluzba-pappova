<div class="container" style="background-color:#333333; height: 100vh; overflow: hidden;">
	<div class="inner">
		<div class="edit_add margin-top" style="background-color:white;">
			<h2>Nastavte si auto</h2>
			<form method="post" action="" class="form">

				<div class="input_group">
					<label for="title">Auto</label>
					<select class="input_style" name="auto">
						<?php foreach ($auta as $row){ ?>
						<option value="<?php echo $row->id; ?>"><?php echo $row->znacka." ".$row->ecv; ?></option>
						<?php } ?>
					</select>

				<input type="submit" name="nastavit" class="input_style_button" value="Spracuj"/>
			</form>
		</div>
	</div>
</div>


<script>
	$.widget.bridge('uibutton', $.ui.button);
</script>

