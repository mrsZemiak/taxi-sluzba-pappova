<div class="container" style="background-color:#333333; height: 100vh; overflow: hidden;">
	<div class="inner">

		<p class="margin-top" style="color: white">Dnes ste zarobili: <span style="font-size: 20px; color:#c92aff;"><?php echo $suma['suma'];?> €</span></p>

		<table id="example"  class="display" style="width:100%">
			<thead>
			<tr>
				<th width="5%">Odkiaľ</th>
				<th width="10%">Kam</th>
				<th width="15%">Cena</th>
				<th width="10%">Dátum</th>
			</tr>
			</thead>
		</table>


	</div>
</div>


<script>
	var table = $('#example').DataTable({
		"dom": "b<'right' f>tirp",
		scrollX: false,
		order: [],
		ajax : {
			url:"<?php echo site_url().'/Zamestnanci_index/Jazdy/getData'; ?>",
			method:"POST",
			_fnAjaxDataSrc:""
		},
		"bLengthChange": false,
		buttons: [
			'copy',
			'excel',
			'pdf'
		]
	});


	setInterval( function () {

		table.ajax.reload();
	}, 1000 );
</script>
