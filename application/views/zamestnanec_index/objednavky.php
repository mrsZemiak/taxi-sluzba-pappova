<div class="container" style="background-color:#333333; height: 100vh; overflow: hidden;">
	<div class="inner">
	<h1 style="text-align: center; color: white;" class="margin-top">Aktuálne objednávky</h1>
		<div id="objednavky" class="zoznam-objednavok"></div>


	</div>
</div>


<script>
function dis() {
xmlhttp= new XMLHttpRequest();
xmlhttp.open("GET","<?php echo site_url('Zamestnanci_index/Objednavky/getObjednavky'); ?>",false);
xmlhttp.send(null);
document.getElementById("objednavky").innerHTML=xmlhttp.responseText;
}

setInterval(function () {
dis();
},1000);
</script>
