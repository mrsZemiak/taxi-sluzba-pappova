<div class="container " style="background-color:#333333; height: 100vh; overflow: hidden;">
<div class="inner">


		<!-- Main content -->
<div class="margin-top">
	<a href="<?php echo
	site_url('Admin_index/Auta/add/'); ?>" class="fa fa-plus-circle" style="color: white; font-size:25px; text-decoration: none;"> Pridať</a>
	<table id="example" class="display" style="width:100%">

								<thead>

								<tr>
									<th width="10%">ID</th>
									<th width="25%">Značka</th>
									<th width="20%">Operácie</th>
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
			order :[],
			ajax : {
			url:"<?php echo site_url().'/Admin_index/Auta/getData'; ?>",
				method:"POST",
				_fnAjaxDataSrc:""
			},
			columnDefs : [{
				target :[2],
				orderable : false
			}],
			"bLengthChange": false
		});

	/*setInterval( function () {

		//table.ajax.reload();
	}, 1000 );*/

</script>

