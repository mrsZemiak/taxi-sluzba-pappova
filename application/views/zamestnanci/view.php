<div class="container " style="background-color:#333333; height: 100vh; overflow: hidden;">
	<div class="inner">


		<!-- Main content -->
<div class="margin-top">
		<table id="example" class="display" style="width:100%">
			<thead>
			<tr>
				<th width="25%">Dátum narodenia</th>
				<th width="25%">Rodné číslo</th>
				<th width="25%">Dátum nástupu</th>
				<th width="25%">Ukončenie služby</th>
			</tr>
			</thead>
			<tbody id="userData">
			<?php if (!empty($zamestnanec)){ ?>
				<tr>
					<td><?php echo $zamestnanec['datum_narodenia']; ?></td>
					<td><?php echo $zamestnanec['rodne_cislo']; ?></td>
					<td><?php echo $zamestnanec['datum_nastupu']; ?></td>
					<td><?php if($zamestnanec['ukoncenie_sluzby']==null){
						echo "Stále pracuje";
						}else{ echo "Skončený pomer"; } ?></td>

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


