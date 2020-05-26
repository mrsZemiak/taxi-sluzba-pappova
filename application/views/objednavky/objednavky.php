<div class="container " style="background-color:#333333; height: 100vh; overflow: hidden;">
	<div class="inner">




<!-- /.box-header -->
<div class="margin-top">
	<table id="example"  class="display" style="width:100%">
		<thead>
		<tr>
			<th width="5%">ID</th>
			<th width="10%">Meno Klienta</th>
			<th width="15%">Odkiaľ</th>
			<th width="10%">Kam</th>
			<th width="10%">Oblasť</th>
			<th width="15%">Cena</th>
			<th width="5%">Dátum</th>
			<th width="5%">Stav</th>
			<th width="10%">Funkcie</th>
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
		order: [[ 6, "desc" ]],
		ajax : {
			url:"<?php echo site_url().'/Admin_index/Objednavky/getData'; ?>",
			method:"POST",
			_fnAjaxDataSrc:""
		},
		columnDefs : [{
			target :[8],
			orderable : false
		}],
		"bLengthChange": false
	});

	setInterval( function () {

		table.ajax.reload();
	}, 1000 );
</script>
