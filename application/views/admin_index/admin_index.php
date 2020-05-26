<div class="container " style="background-color:#ADA996; height: 100vh; overflow: hidden;">
	<div class="inner">
<div class="margin-top">
		<div class="dashboard_stats">
			<h3 style="text-align: center; color: white;">Najfrekventovanejší taxikári </h3>
			<div id="tax"  style="color: white;" class="dashboard_graph"></div>
		</div>

		<div class="dashboard_stats">
			<h3 style="text-align: center; color: white;">Najpoužívanejšie autá </h3>
			<div id="auto" class="dashboard_graph"></div>
		</div>

		<div class="dashboard_stats">
			<h3 style="text-align: center; color: white;">Najrušnejšia ulica</h3>
			<div id="ulica" class="dashboard_graph"></div>
		</div>
</div>
	</div>
</div>
<!-- ./wrapper -->
<!-- Morris.js -->


<script>
	Morris.Donut({
		element: 'tax',
		data: <?php echo $taxikar; ?>,
		colors: ['#8d5790', '#904189', '#901280']
	});
</script>
<script>
	Morris.Donut({
		element: 'auto',
		data: <?php echo $auto; ?>,
		colors: ['#8d5790', '#904189', '#901280']
	});
</script>

<script>
	Morris.Donut({
		element: 'ulica',
		data: <?php echo $ulica; ?>,
		colors: ['#8d5790', '#904189', '#901280']
	});
</script>
