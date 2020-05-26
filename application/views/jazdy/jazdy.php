<div class="container " style="background-color:#333333; height: 100vh; overflow: hidden;">
	<div class="inner">
		<div class="margin-top">

		<table id="example"  class="display" style="width:100%">
			<thead>
			<tr>
				<th>Číslo objednávky</th>
				<th>Meno taxikára</th>
				<th>Meno zákazníka</th>
				<th>Auto</th>
				<th>Odkiaľ</th>
				<th>Kam</th>
				<th>Dátum jazdy</th>
				<th>Oblasť</th>
				<th>Cena</th>


			</tr>
			</thead>
		</table>

		</div>
	</div>
</div>


<script>
	var table = $('#example').DataTable({
		"dom": "<'right' f>tirp",
		scrollX: false,
		order: [],
		ajax : {
			url:"<?php echo site_url().'/Admin_index/Jazdy/getData'; ?>",
			method:"POST",
			_fnAjaxDataSrc:""
		},

		"bLengthChange": false
	});

	setInterval( function () {

		table.ajax.reload();
	}, 1000 );
</script>
