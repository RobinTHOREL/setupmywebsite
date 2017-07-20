<div class="row">
	<div class="col-12">
		<div class="logo">
			<i class="fa fa-cog"></i>
		</div>
		<p class="smw">SMW-ADMIN</p>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<h1>Bienvenue sur Setup-My Website</h1>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<button class="btn btn-default has-spinner" id="one">
			<?php "http://".$_SERVER["HTTP_HOST"].BASE_ABSOLUTE_PATTERN."install/databaseConfiguration" ?>
			<a href=<?php echo "http://".$_SERVER["HTTP_HOST"].BASE_ABSOLUTE_PATTERN."smw-admin/install/databaseConfiguration" ?>>Commencer l'installation<a/>
		</button>
		<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="jquery.buttonLoader.js"></script>

		<script>
			$(document).ready(function () {

				$('.has-spinner').click(function () {
					var btn = $(this);
					$(btn).buttonLoader('start');
					//durée du loader
					setTimeout(function () {
						$(btn).buttonLoader('Boom!');
					},50);
				});
			});
		</script>
	</div>
</div>


