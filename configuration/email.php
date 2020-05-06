<!DOCTYPE html>
<html>
<head>
<head>
	<?php
		//CONF
		$racine = "..";
		require($racine . "/include/conf/conf.php");

		//NOM SITE
		$ns_page = "Email de notifications";

		require($racine . $p_php . "head.php");
	?>
</head>
<body>
	<header>
		<?php echo menu(); ?>
	</header>
	<main>
		<h1>Email de notifications</h1>

		<?php
		if (isset($_GET['msg']) && !empty($_GET['msg'])) 
		{
			if ($_GET['msg'] == "ok") 
			{
				?>
					<div class="alert alert-success text-center w-25 mx-auto mt-3" role="alert">
					  Succes !
					</div>
				<?php
			}
			else
			{
				?>
					<div class="alert alert-danger text-center w-25 mx-auto mt-3" role="alert">
					  <?php echo $_GET['msg']; ?>
					</div>
				<?php
			}
		}
		?>

		<fieldset class="borderForm mb-4" id="parametreExedition">
		<legend>Paramètres d'expedition</legend>
			<form method="POST" action="<?php echo $racine . $p_php . "parametreEmail.php"; ?>">

				<p class="formText">Paramètre du serveur:</p>
			
				<div class="form-row">
					<div class="form-group col-md-4" id="particulierNom">
						<label for="inputServeurSMTP"><span class="warning">*</span>Serveur SMTP</label>
						<input type="text" class="form-control" id="inputServeurSMTP" name="inputServeurSMTP" value="<?php echo parametre("10", "texte1"); ?>" required>
					</div>
					<div class="form-group col-md-4" id="particulierNom">
						<label for="inputSecurite"><span class="warning">*</span>Sécurité</label>
						<select class="form-control" id="inputSecurite" name="inputSecurite" required>
							<option value="" <?php echo (parametre("13", "texte1") == "") ? "selected" : "" ; ?>>Non</option>
							<option value="STARTTLS" <?php echo (parametre("13", "texte1") == "STARTTLS") ? "selected" : "" ; ?>>STARTTLS</option>
							<option value="tls" <?php echo (parametre("13", "texte1") == "tls") ? "selected" : "" ; ?>>tls</option>
							<option value="ssl" <?php echo (parametre("13", "texte1") == "ssl") ? "selected" : "" ; ?>>ssl</option>
						</select>
					</div>
					<div class="form-group col-md-4" id="particulierNom">
						<label for="inputPort"><span class="warning">*</span>Port</label>
						<input type="number" class="form-control" id="inputPort" name="inputPort" value="<?php echo parametre("14", "texte1"); ?>" required>
					</div>
				</div>

				<p class="formText">Authentification:</p>

				<div class="form-row">
					<div class="form-group col-md-6" id="particulierNom">
						<label for="inputUtilisateur"><span class="warning">*</span>Nom d'utilisateur</label>
						<input type="text" class="form-control" id="inputUtilisateur" name="inputUtilisateur" value="<?php echo parametre("11", "texte1"); ?>" required>
					</div>
					<div class="form-group col-md-6" id="particulierNom">
						<label for="inputMotDePasse"><span class="warning">*</span>Mot de passe</label>
						<input type="password" class="form-control" id="inputMotDePasse" name="inputMotDePasse" value="<?php echo parametre("12", "texte1"); ?>" required>
					</div>
				</div>

				<p class="formText">Envoi:</p>

				<div class="form-row">
					<div class="form-group col-md-6" id="particulierNom">
						<label for="inputNomEnvoi">Nom de l'expéditeur</label>
						<input type="text" class="form-control" id="inputNomEnvoi" name="inputNomEnvoi" value="<?php echo parametre("16", "texte1"); ?>" required>
					</div>
					<div class="form-group col-md-6" id="particulierNom">
						<label for="inputNomEmail"><span class="warning">*</span>Adresse de l'expéditeur</label>
						<input type="text" class="form-control" id="inputNomEmail" name="inputNomEmail" value="<?php echo parametre("15", "texte1"); ?>" required>
					</div>
				</div>
				<div class="text-center">
					<button type="submit" class="btn btnValider mt-4" name="valider" value="parametreExedition">Valider</button>
					<button type="submit" class="btn btnSupprimer mt-4" name="valider" value="parametreExeditionEmailTest">Envoyer un email de test</button>
				</div>
			</form>
		</fieldset>

		<fieldset class="borderForm mb-4" id="envoiFactre">
		<legend>Envoi d'une facture</legend>
			<form method="POST" action="<?php echo $racine . $p_php . "parametreEmail.php"; ?>">
				<div class="form-row">
					<div class="form-group col-md-6" id="particulierNom">
						<label for="inputSujet"><span class="warning">*</span>Sujet</label>
						<input type="text" class="form-control" id="inputSujet" name="inputSujet" value="<?php echo parametre("6", "texte1"); ?>">
					</div>
				</div>
				<div class="form-row">
					<textarea cols="80" id="editor1" name="inputContenu" rows="10" data-sample-short>
						<?php echo parametre("7", "texte1"); ?>
					</textarea>
				</div>
				<div class="text-center">
					<button type="submit" class="btn btnValider mt-4" name="valider" value="envoiFactre">Valider</button>
				</div>
			</form>
		</fieldset>

		<fieldset class="borderForm mb-4" id="envoiDevis">
		<legend>Envoi d'un devis</legend>
			<form method="POST" action="<?php echo $racine . $p_php . "parametreEmail.php"; ?>">
				<div class="form-row">
					<div class="form-group col-md-6" id="particulierNom">
						<label for="inputSujet"><span class="warning">*</span>Sujet</label>
						<input type="text" class="form-control" id="inputSujet" name="inputSujet" value="<?php echo parametre("8", "texte1"); ?>">
					</div>
				</div>
				<div class="form-row">
					<textarea cols="80" id="editor2" name="inputContenu" rows="10" data-sample-short>
						<?php echo parametre("9", "texte1"); ?>
					</textarea>
				</div>
				<div class="text-center">
					<button type="submit" class="btn btnValider mt-4" name="valider" value="envoiDevis">Valider</button>
				</div>
			</form>
		</fieldset>

	</main>
	<footer>
		<?php require($racine . $p_php . "footer.php"); ?>
	</footer>
</body>
</html>