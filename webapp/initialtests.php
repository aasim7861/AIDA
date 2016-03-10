<?php require 'includes/header.php'; ?>
<?php require 'includes/leftnav.php'; ?>
<!-- Content -->
	<div class="one-thirds column">
		<div id="right" id="right">
			<div class="two-thirds column">
				<h3>Initialisation and Configuration</h3>
				
				<ul class="square">
					<?php 		
					    print  "Base URL =". $config['base_url'];
					    print "<br />";
					    print "<strong>Aasim Amin's Final Year</strong>";
					    print "<pre>";
					    print_r($db);
					    print "</pre>";
					 ?>
				</ul>
		</div>	
		</div>
	 </div>
<?php require 'includes/footer.php'; ?>




