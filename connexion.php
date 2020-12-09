<!DOCTYPE html>
<html>
<head>
	<?php
		//CONF
		// $racine = ".";
		// require($racine . "/include/conf/conf.php");

		//NOM SITE
		$ns_page = "Connexion";

		require($racine . $p_php . "head.php");
	?>
</head>
<body>
	<header>
		<?php echo menuConnexion(); ?>
	</header>
	<main>
		<h1>Connexion</h1>

		<?php
			if (isset($_POST['inputEmail']) && !empty($_POST['inputEmail']) && isset($_POST['inputPassword']) && !empty($_POST['inputPassword'])) 
			{
				if ($_POST['inputEmail'] == entrepriseInfo('email')) 
				{
					if (password($_POST['inputPassword']) == entrepriseInfo('password')) 
					{
						session_start();
						$_SESSION['utilisateur'] = $_POST['inputEmail'];
						// header('Location: /');
						header("Location: " . $_SERVER['HTTP_REFERER']);
						exit();
					}
					else
					{
						?>
							<div class="alert alert-danger text-center" role="alert">
								Le mot de passe n'est pas correcte.
							</div>
						<?php
					}
				} 
				else 
				{
					?>
						<div class="alert alert-danger text-center" role="alert">
							Une erreur est survenu, merci de rééssayer !
						</div>
					<?php
				}
			}

			// echo password("Azerty");
		?>

		<form method="POST" action="#">
			<div class="form-group row">
				<label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="inputEmail" name="inputEmail">
				</div>
			</div>
			<div class="form-group row">
				<label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" id="inputPassword" name="inputPassword">
				</div>
			</div>
			<div class="form-group row text-center">
				<div class="col-sm">
					<button type="submit" class="btn btnValider">Connexion</button>
				</div>
			</div>
		</form>
	</main>
	<footer>
		<?php require($racine . $p_php . "footer.php"); ?>
	</footer>
</body>
</html>