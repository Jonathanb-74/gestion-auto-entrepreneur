<!DOCTYPE html>
<html>
<head>
	<?php
		//CONF
		$racine = "../";
		require($racine . "/include/conf/conf.php");

		//NOM SITE
		$ns_page = "Documents";

		require($racine . $p_php . "head.php");
	?>
</head>
<body>
	<header>
		<?php echo menu(); ?>
	</header>
	<main>
		<h1>Documents</h1>

		<?php 
			// On créé la requête
			$reqListeDocuments = "SELECT * FROM document JOIN prestation ON document.idprestation = prestation.id ";
			if (isset($_GET['id']) && !empty($_GET['id'])) 
			{
				$reqListeDocuments .= "WHERE client =" . $_GET['id'] . " ";
			}
			$reqListeDocuments .= "ORDER BY document.id DESC";
			// echo $reqListeDocuments;
			
			// on envoie la requête
			$resListeDocumentsCount = $conn->query($reqListeDocuments) or die();
			 
			// Si on a des lignes...
			if ( $resListeDocumentsCount->num_rows > 0 )
			{
				?>
					<div class="table-responsive">
						<table class="">
							<thead>
								<tr>
									<th scope="col">Type</th>
									<th scope="col" colspan="2">Destinataire</th>
									<th scope="col">Date d'édition</th>
									<th scope="col">Numéro du document</th>
									<th scope="col">Note:</th>
									<th scope="col">Lien</th>
								</tr>
							</thead>
							<tbody>
						<?php
							// on envoie la requête
							$resListeDocuments = $conn->query($reqListeDocuments);
							 
							while ($dataListeDocuments = mysqli_fetch_array($resListeDocuments)) 
							{
								?>
									<tr>
										<td><?php echo ($dataListeDocuments['type'] == 1) ? "<span class='badge badgeFacture'>Facture</span>" : "<span class='badge badgeDevis'>Devis</span>" ;  ?></td>
										<?php
										if (clientInfo("type", $dataListeDocuments['client']) == 1) {
											?>
												<td class="text-right"><span class="badge badgeProfessionnel"><?php echo ucfirst(clientType(clientInfo("type", $dataListeDocuments['client']))); ?></span></td>
												<td class="text-left"><?php echo clientNom($dataListeDocuments['client']); ?></td>
											<?php
										}
										elseif (clientInfo("type", $dataListeDocuments['client']) == 2) {
											?>
												<td class="text-right"><span class="badge badgeParticulier"><?php echo ucfirst(clientType(clientInfo("type", $dataListeDocuments['client']))); ?></span></td>
												<td class="text-left"><?php echo clientNom($dataListeDocuments['client']); ?></td>
											<?php
										}
										?>
										<td><?php echo utf8_encode(strftime('%d/%m/%g', strtotime($dataListeDocuments['dateEdition']))); ?></td>
										<td><?php echo documentNumerotationAffichage($dataListeDocuments['numero']); ?></td>
										<td><?php echo $dataListeDocuments['note']; ?></td>
										<td><a href="<?php echo $racine . "/include/documents/" . documentNumerotationAffichage($dataListeDocuments['numero']) . ".pdf"; ?>" target="_blank"><i class="fas fa-file-pdf"></i></a></td>
									</tr>
								<?php
							}
						?>
					</tbody>
				</table>
			</div>
			<?php
			}
			else
			{
			    echo "
			    <div class='alert alert-danger' role='alert'>
				  Aucun document n'a été trouvé pour " . clientNom($_GET['id']) . "
				</div>";
			}
		?>
	</main>
	<footer>
		<?php require($racine . $p_php . "footer.php"); ?>
	</footer>
</body>
</html>

<style type="text/css">
	.badge-danger
	{
		display: none;
	}
</style>

<script type="text/javascript">
	$('#particulierListe').css('display', 'none');

	$("#inputTypeClient").change
	(
		function () 
		{
			if (document.getElementById('inputTypeClient').value == "professionnel") 
			{
				$('#particulierListe').hide();
				$('#entrepriseListe').show();
			}
			if (document.getElementById('inputTypeClient').value == "particulier") 
			{
				$('#particulierListe').show();
				$('#entrepriseListe').hide();
			}
		}
	);
</script>