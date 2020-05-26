<div class="container" style="background-color:#333333; height: 100vh; overflow: hidden;">

	<div style="margin-top: 200px;">
			<table class="cennik" align="center" border="1" cellspacing="5" cellpadding="5">

				 <tr>
						<th>Oblasť</th><th>Cena</th></tr>
						<?php
							foreach ($cennik as $item) {?>
								<tr> <td>
										<?php echo $item->oblast; ?>
									</td>
									<td>
										<?php echo $item->cena."€"; ?>
									</td></tr>

								 <?php } ?>
			</table>


	</div>
