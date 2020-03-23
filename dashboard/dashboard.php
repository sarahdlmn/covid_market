 <html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
   <link rel="stylesheet" href="./assets/css/style.css">
    <title>Covid Market</title>
</head>
<header><H1 class="col-12">
        Covid Market
    </H1><div class="progress">
  <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div> 
</div>
   
</header>

<body>

<div id="dashboard">
	
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

</div>

<button type="button" class="btn btn-outline-success"><a href="./dashboard.php?dashboard=magasin">Magasin</a></button>
<button type="button" class="btn btn-outline-success"><a href="./dashboard.php?dashboard=stock">Stock</a></button>
<button type="button" class="btn btn-outline-success"><a href="./connexion/deconnexion.php?dashboard=stock">Déconnexion</a></button>


</body>
<footer>

<h3><p>Covid Market</p></h3>

</footer>

</html>
