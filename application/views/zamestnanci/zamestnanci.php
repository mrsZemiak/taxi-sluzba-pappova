<div class="container " style="background-color:#333333; height: 100vh; overflow: hidden;">
	<div class="inner">
		<div class="margin-top">
		<a href="<?php echo
		site_url('Admin_index/Zamestnanci/add/'); ?>" class="fa fa-user-plus" style="color: white; font-size:25px; text-decoration: none;"> Pridať</a>
		<!-- /.box-header -->

		<table id="example"  class="display" style="width:100%">
			<thead>
			<tr>
				<th width="5%">ID</th>
				<th width="10%">Meno Zamestnanca</th>
				<th width="15%">Telefón</th>
				<th width="15%">Adresa</th>
				<th width="10%">E-mail</th>
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
		order: [[ 0, "desc" ]],
		ajax : {
			url:"<?php echo site_url().'/Admin_index/Zamestnanci/getData'; ?>",
			method:"POST",
			_fnAjaxDataSrc:""
		},
		columnDefs : [{
			target :[5],
			orderable : false
		}],
		"bLengthChange": false
	});

	setInterval( function () {

		table.ajax.reload();
	}, 1000 );
</script>
