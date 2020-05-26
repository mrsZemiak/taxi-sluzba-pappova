<div class="container " style="background-color:#333333; height: 100vh; overflow: hidden;">
	<div class="inner">
		<div class="margin-top">
		<table id="example" class="display" style="width:100%">
			<thead>
			<tr>
				<th width="10%">ID</th>
				<th width="25%">Počet miest</th>
				<th width="25%">EČV</th>
				<th width="25%">Značka</th>
			</tr>
			</thead>
			<tbody id="userData">
			<?php if (!empty($auto)){ ?>
				<tr>
					<td><?php echo '#' . $auto['id']; ?></td>
					<td><?php echo $auto['pocet_miest']; ?></td>
					<td><?php echo $auto['ecv']; ?></td>
					<td><?php echo $auto['znacka']; ?></td>

				</tr>
			<?php }else{ ?>
				<tr>
					<td colspan="4">Žiadny záznam
					</td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
		</div>
	</div>
</div>
<script>
	$(document).ready( function () {
		$('#example').DataTable({
			"dom": "<'right' f>tirp",
			scrollX: false,
			"bLengthChange": false
		});
	});
</script>


