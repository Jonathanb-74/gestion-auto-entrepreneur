<?php
$racine = "../..";
require($racine . "/include/conf/conf.php");
require_once ($racine . "/include/dompdf/autoload.inc.php");

if (isset($_POST['id']) && !empty($_POST['id']) && isset($_POST['type']) && !empty($_POST['type'])) 
{
	$id = $_POST['id'];
	$type = $_POST['type'];
	$note = $_POST['inputTexteNote'];
}
// elseif (isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['type']) && !empty($_GET['type'])) 
// {
// 	$id = $_GET['id'];
// 	$type = $_GET['type'];
// 	$note = "note";
// }
else
{
	echo "erreur";
	exit();
}

$numeroDoc = documentNumerotation($type, $id, $note);
// $numeroDoc = "F-2021-13";


// echo $numeroDoc . "<br>";
// echo $id;
// echo ($type == "1") ? "<h1>FACTURE</h1>" :"" ;
// echo ($type == "2") ? "<h1>DEVIS</h1>" :"" ;

if ($type == "1") 
{
	$typeText = "FACTURE";
	$typeTextC = "F";

	$verifFacture = verifFacture($id);
	$ok = $verifFacture->ok;

	if ($ok == 1) 
	{
		prestationCloture($id);
	}
	else
	{
		exit();
	}
}
elseif ($type == "2") 
{
	$typeText = "DEVIS";
	$typeTextC = "D";
	$infoDevis = $_POST['inputTexteInformation'];
	// $infoDevis = "text info";
// echo "**********OK**********";
}
else
{
	exit();
}

use Dompdf\Dompdf;
ob_start();
?>
<!-- CSS -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet"> 
<style>
	*
	{
		font-family: 'Open Sans', sans-serif;
	}
	body
	{
		width: 18cm;
		height: 29.7cm; 
		margin: 0; 
		padding-left: 0.5cm; 
		color: #001028;
		background: #FFFFFF; 
		/*font-family: Arial, sans-serif; */
		font-family: 'Open Sans', sans-serif;
		/*font-size: 12px; */
		/*border: solid 1px black;*/
		font-size: 100%;
	}
	#page
	{
		margin: 0; 
		padding: 0;
		/*border: solid 1px black;*/
	}
	#titre
	{
		width: 100%;
		/*border: solid 1px black;*/
	}
	#en-tete
	{
		border-collapse: collapse;
		width: 100%;
		margin-top: 1cm;
	}
	#en-tete td
	{
		/*border: solid 1px black;*/
		width: 50%;
		height: 3cm;
		vertical-align: top;
	}
	#en-tete img
	{
		display:  block;
		width: 40%;
		max-width: 40%;
		margin-left:  0;
	}
	#en-tete h1
	{
		text-transform: capitalize;
		text-align: center;
		font-size: xx-large;
		/*border: solid 1px black;*/
		margin-bottom: 0;
	}
	#en-tete span
	{
		text-align: center;
		font-size: medium;
		margin-top: 10px;
		margin-bottom: 10px;
		margin-left: auto;
		margin-right: auto;
		display: block;
		border: solid 1px black;
		width: 50%;
		background-color: #D2D2D2;
	}

	#w-10
	{
		width: 10%;
	}
	#w-20
	{
		width: 20%;
	}
	#w-40
	{
		width: 40%;
	}
	#w-50
	{
		width: 50%;
	}

	#iformationsDevis p
	{
		/*border: solid 1px #DEDEDE;*/
		padding: 0;
		margin: 0;
	}

	#tab1
	{
		border-collapse: collapse;
		width: 100%;
		margin-top: 1cm;
	}
	#tab1 td
	{
		/*border: solid 1px black;*/
		/*width: 50%;*/
		/*height: 3cm;*/
		vertical-align: top;
		padding-bottom: 0.5cm;
	}
	#tab1 #titre
	{
		width: 20%;
		text-align: right;
	}
	#tab1 #donnees
	{
		width: 40%;
	}
	#tab1 h2
	{
		margin-top: 0;
		margin-bottom: 0;
		/*border-bottom: solid 1px;*/
		font-size: 110%;
		width: 80%;
	}
	#tab1 p
	{
		margin-top: 0;
		margin-bottom: 0;
		margin-left: 0.5cm;
		font-size: medium;
	}
	.nom
	{
		font-weight: 600;
	}




	#infoPayementFactures
	{
		border-collapse: collapse;
		width: 100%;
		margin-top: 1cm;
	}
	#infoPayementFactures .titre td
	{
		text-align: center;
		background-color: #1867F8;
		padding: 8px 0;
		vertical-align: middle;
		color: #FFFFFF;
		font-size: /*normal*/;
		font-weight: 600;
	}
	#infoPayementFactures .info td
	{
		text-align: center;
		vertical-align: middle;
		background-color: #f2f2f2;
		/*font-size: small;*/
	}
	#infoPayementFactures td
	{
		/*border: solid 1px black;*/
		width: 25%;
		/*height: 3cm;*/
		vertical-align: top;
	}
	#infoPayementFactures h2
	{
		margin-top: 0;
		margin-bottom: 0;
		border-bottom: solid 1px;
		/*font-size: 100%;*/
		width: 80%;
	}
	#infoPayementFactures p
	{
		margin-top: 0;
		margin-bottom: 0;
		margin-left: 0.5cm;
	}

	#tab3
	{
		border-collapse: collapse;
		width: 100%;
		margin-top: 1cm;
	}
	#tab3 .titre td
	{
		text-align: center;
		background-color: #1867F8;
		padding: 8px 0;
		vertical-align: middle;
		color: #FFFFFF;
		font-size: medium;
		font-weight: 600;
	}
	#tab3 .info td
	{
		text-align: center;
		vertical-align: middle;
		background-color: #f2f2f2;
		font-size: small;
	}
	#tab3 td.date
	{
		/*border: solid 1px black;*/
		width: 30%;
		/*height: 3cm;*/
		vertical-align: top;
	}
	#tab3 td.info
	{
		/*border: solid 1px black;*/
		width: 70%;
		/*height: 3cm;*/
		vertical-align: top;
	}
	#tab3 h2
	{
		margin-top: 0;
		margin-bottom: 0;
		border-bottom: solid 1px;
		font-size: 120%;
		width: 80%;
	}
	#tab3 p
	{
		margin-top: 0;
		margin-bottom: 0;
		margin-left: 0.5cm;
	}
	


	.tableProduits 
	{
		border-collapse: collapse;
		width: 100%;
		border-bottom: 1px solid #707070;
		margin-top: 1cm;
	}
	.tableProduits th
	{
		text-align: center;
		padding: 8px;
		background-color: #1867F8;
		color: white;
		font-weight: 600;
	}
	.tableProduits td 
	{
		padding: 8px;
	}

	.tableProduits tr:nth-child(even){background-color: #f2f2f2}

	#basPage
	{
		border-collapse: collapse;
		width: 100%;
		margin-top: 2cm;
	}
	#basPage td#infoPayementFactures
	{
		/*padding: 8px;*/
		width: 65%;
	}
	#basPage td#prix
	{
		/*padding: 8px;*/
		width: 35%;
	}
	#basPage th
	{
		/*text-align: center;
		padding: 8px;
		background-color: #1867F8;
		color: white;*/
	}

	#tableInfoPayementFactures
	{
		border-collapse: collapse;
		width: 100%;
		/*border: solid 1px black;*/
		width: 90%;
		margin-bottom: 1cm;
	}
	#tableInfoPayementFactures td.titre
	{
		text-align: right;
		padding-right: 0.5cm;
		font-weight: 900;
	}
	#tableInfoPayementFactures td.info
	{
		font-style: italic;
	}
	
	.tablePrix 
	{
		border-collapse: collapse;
		width: 100%;
	}
	.tablePrix td 
	{
		padding: 8px;
	}
	.tablePrix th
	{
		text-align: center;
		padding: 8px;
		background-color: #1867F8;
		color: white;
	}
	.tablePrix .description
	{
		text-align: right;
		width: 15%;
		letter-spacing: 1px;
	}
	.tablePrix .valeure
	{
		text-align: center;
		width: 15%;
		border-bottom: 1px dotted #707070;
	}
	.tablePrix .info
	{
		text-align: center;
		width: 70%;
		/*border-bottom: 1px dotted #707070;*/
		vertical-align: bottom;
		color: #B8B8B8;
		background-color: #FFFFFF;
	}
	.fin .description
	{
		text-align: right;
		/*width: 25%;*/
		padding-top: 10px;
		padding-bottom: 10px;
		font-weight: 900;
		letter-spacing: 1px;
		/*border: solid 1px black;*/
	}
	.fin .valeure
	{
		text-align: center;
		width: 15%;
		border-bottom: 1px dotted #707070;
		padding-top: 10px;
		padding-bottom: 10px;
		background-color: #508EFF;
		font-weight: 900;
	}
	.text-center
	{
		text-align: center;
	}
	.text-left
	{
		text-align: left;
	}
	footer
	{
		width: 18cm;
		height: 2cm;
		margin-top: 2cm;
		/*border-top: solid 1px black;*/
		/*border-bottom: solid 1px black;*/
		text-align: center;
	}
	
</style>
<!-- FIN CSS -->


<!-- HTML -->
<body>    
	<div id="page">
		<!-- <div id="titre"> -->
			<!-- <h1><?php  echo $typeText; ?></h1> -->
			<!-- <span>N° <?php  echo $numeroDoc; ?></span> -->
		<!-- </div> -->
		<table id="en-tete">
			<tr>
				<td>
					<img src="http://127.0.0.5/logo.png">
				</td>
				<td>
					<h1><?php  echo $typeText; ?></h1>
					<span>N° <?php  echo $numeroDoc; ?></span>
				</td>
			</tr>
		</table>

		<table id="tab1">
			<tr>
				<td id="w-40">
				</td>
				<td id="titre">
					<h2>Client :</h2>
				</td>
				<td id="donnees">
					<p class="nom"><?php echo clientNom(prestationInfo("client", $id)); ?></p>
					<p><?php echo clientInfo("adresse", prestationInfo("client", $id)); ?></p>
					<p><?php echo clientInfo("cp", prestationInfo("client", $id)) . " " . clientInfo("ville", prestationInfo("client", $id)); ?></p>
				</td>
			</tr>
			<tr>
				<td id="w-40">
				</td>
				<td id="titre">
					<h2>Edition :</h2>
				</td>
				<td id="donnees">
					<p><?php echo utf8_encode(strftime('%d %B %Y')); ?></p>
				</td>
			</tr>
		</table>

		<?php 
			//DEVIS
			if ($type == 2) 
			{
				if ($infoDevis != "") 
				{
					echo "<div id=\"iformationsDevis\">"; 
					echo "<p><b>Informations:</b> " . $infoDevis . "</p>"; 
					echo "</div>"; 
				}
			}
		?>

		
		
		<table class="tableProduits">
			<tr>
				<th style="width: 10%;">Ref</th>
				<th style="width: 50%;">Description</th>
				<th style="width: 10%;">Quantité</th>
				<th style="width: 15%;">Prix unitaire</th>
				<th style="width: 15%;">Total</th>
			</tr>
			<?php
				$reqSelectProduits = "SELECT * FROM prestationproduit WHERE facture='$id'";
				 
				$resSelectProduits = $conn->query($reqSelectProduits);
				
				$calcPrix = 0;

				while ($dataSelectProduits = mysqli_fetch_array($resSelectProduits))
				{
					if ($dataSelectProduits['offert'] == "0") 
					{
						$calcPrix = (produitInfo("prixvente", $dataSelectProduits['produit']) * $dataSelectProduits['produitqte']);
						$calcPrixTotal = $calcPrixTotal + $calcPrix;
					}
				    ?>
				    <tr>
						<td class="text-center"><?php echo ref(produitInfo("ref", $dataSelectProduits['produit'])); ?></td>
						<td class="text-left"><?php echo produitInfo("designation", $dataSelectProduits['produit']); ?></td>
						<td class="text-center"><?php echo $dataSelectProduits['produitqte']; ?></td>
						<td class="text-center"><?php echo produitInfo("prixvente", $dataSelectProduits['produit']) . "€"; ?></td>
						<td class="text-center"><?php echo ($dataSelectProduits['offert'] == "1") ? "OFFERT" : $calcPrix . "€"; ?></td>
					</tr>
				    <?php
				}
			?>
		</table>

		<table id="basPage">
			<tr>
				<td id="infoPayementFactures">
					<?php 
						//FACTURE
						if ($type == 1) 
						{
							?>
								<table id="tableInfoPayementFactures">
									<tr>
										<td class="titre">Date de facturation:</td>
										<td class="info"><?php echo utf8_encode(strftime('%d %B %Y', strtotime(prestationInfo("datefacturation", $id)))); ?></td>
									</tr>
									<tr>
										<td class="titre">Date de livraison:</td>
										<td class="info"><?php echo utf8_encode(strftime('%d %B %Y', strtotime(prestationInfo("datelivraison", $id)))); ?></td>
									</tr>
									<tr>
										<td class="titre">Moyen de règlement:</td>
										<td class="info"><?php echo prestationInfo("moyenpaiement", $id); ?></td>
									</tr>
									<tr>
										<td class="titre">Echéance de paiement:</td>
										<td class="info"><?php echo utf8_encode(strftime('%d %B %Y', strtotime(prestationInfo("datefacturation", $id) . " +30 days"))); ?></td>
									</tr>
								</table>
							<?php
						}
					?>
				</td>
				<td id="prix">
					<table class="tablePrix">
						<tr>
							<th class="titre" colspan="2">Facture total</th>
						</tr>
						<tr>
							<td class="description">Sous-total</td>
							<td class="valeure"><?php echo $calcPrixTotal; ?>€</td>
						</tr>
						<tr>
							<td class="description">Remise</td>
							<td class="valeure"><?php echo number_format(prestationInfo('remise', $id), 2, ',', ' '); ?>%</td>
						</tr>
						<tr class="fin">
							<td class="description">Solde du</td>
							<td class="valeure"><?php $number = ($calcPrixTotal * (1-(prestationInfo('remise', $id)/100))); echo number_format($number, 2, ',', ' '); ?>€</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<div class="text-center" style="margin-top: 1cm;">
			<a>TVA non applicable, art. 293B du CGI</a>
		</div>

		
	</div>
</body>
<!-- FIN HTML -->

<!-- FIN HTML -->
<?php
$html = ob_get_clean();
$dompdf = new DOMPDF();
$dompdf->load_html($html);

$dompdf->get_canvas()->page_text(490, 770, "Page {PAGE_NUM}/{PAGE_COUNT}", 'Arial', 13, array(0,0,0));

$dompdf->render();
// $dompdf->stream($typeTextC . "-" . $numeroDoc);

file_put_contents($racine . "/include/documents/" . $typeTextC . "-" . $numeroDoc . ".pdf", $dompdf->output());

// $output = $dompdf->output();
// file_put_contents($typeTextC . "-" . $numeroDoc . ".pdf", $output);


header('Location: /prestation/documents.php?&id=' . $id . '#listeDoc');
// exit();
?>