<?php 
require 'header-dashboard.php';
?>
<body >
<div id="dashboard" class="text-center">
	<h2 class="mb-4">Gestion de votre magasin</h2>
	<?php

		if( isset( $_GET['dashboard'] ) ) {

			switch( $_GET['dashboard'] ) {
				case 'magasin' :
					header('Location: form-magasin.php');
				break;
				case 'stock' :
					header('Location: form-stock.php');
				break;
			}
		} else {
			$chemin = 'dashboard.php';
		}

	?>

<button type="button" class="btn btn-outline-success"><a href="./dashboard.php?dashboard=magasin">Magasin</a></button>
<button type="button" class="btn btn-outline-success"><a href="./dashboard.php?dashboard=stock">Stock</a></button>
<br><br>
</div>
</body>
<footer class="ml-2 text-center mt-5">
<button type="button" class="btn btn-outline-success"><a href="./connexion/deconnexion.php?dashboard=stock">Déconnexion</a></button>
</footer>

</html>
