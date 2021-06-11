<!DOCTYPE html>
<html>
<head>
	<?php
		//CONF
		$racine = "../";
		require($racine . "/include/conf/conf.php");

		//NOM SITE
		$ns_page = "Liste des produits";

		require($racine . $p_php . "head.php");
	?>
</head>
<body>
	<header>
		<?php echo menu(); ?>
	</header>
	<main>
		<h1>Liste des produits</h1>

		<div class="text-center w-25 mx-auto mb-4">
			<a href="nouveau.php"><button type="button" class="btn btnBarre">Nouveau</button></a>
		</div>

		<div class="table-responsive">
			<table class="">
				<thead>
					<tr>
						<th scope="col">Ref</th>
						<th scope="col">Désignation</th>
						<th scope="col">Activité</th>
						<th scope="col">Prix d'achat</th>
						<th scope="col">Coefficient de marge</th>
						<th scope="col">Prix de vente</th>
						<th scope="col">Description</th>
						<th scope="col" colspan="2">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php
						use Michelf\Markdown;

						// On créé la requête
						$reqProduits = "SELECT * FROM produits";
						 
						// on envoie la requête
						$resProduits = $conn->query($reqProduits);
						 
						while ($dataProduits = mysqli_fetch_array($resProduits)) 
						{
							?>
								<tr>
									<td><?php echo ref($dataProduits['ref']); ?></td>
									<td><?php echo $dataProduits['designation']; ?></td>
									<td><?php echo categorieNom($dataProduits['categorie']); ?></td>
									<td><?php echo $dataProduits['prixachat']; ?> €</td>
									<td><?php echo $dataProduits['coefmarge']; ?> %</td>
									<td><?php echo $dataProduits['prixvente']; ?> €</td>
									<td class="text-left"><?php echo Markdown::defaultTransform($dataProduits['commentaire']); ?></td>
									<td><a href="<?php echo "edit.php?ref=" . $dataProduits['ref']; ?>"><i title="Editer" class="fas fa-pen-square"></a></i></td>
									<td><a> <?php echo ($dataProduits['desactiver'] == 0) ? "<i title=\"Cet article est activé\" class=\"fas fa-check-circle\"></i>" : "<i title=\"Cet article est désactivé, vous ne pourrez plus l'utiliser dans les prochaines factures.\" class=\"fas fa-times-circle\"></i>" ; ?></a></td>
								</tr>
							<?php
						}
					?>
				</tbody>
			</table>
		</div>
	</main>
	<footer>
		<?php require($racine . $p_php . "footer.php"); ?>
	</footer>
</body>
</html>