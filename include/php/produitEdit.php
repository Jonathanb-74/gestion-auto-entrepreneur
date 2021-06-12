<?php
$racine = "../..";
require($racine . "/include/conf/conf.php");

if (isset($_POST['inputREF']) && !empty($_POST['inputREF']) && isset($_POST['inputPrixVente']) && !empty($_POST['inputPrixVente']))
{
	$ref = $_POST['inputREF'];
	// echo $ref;
	// echo "<br>";
	// echo $_POST['inputProduitType'];
	// echo "<br>";
	// echo $_POST['inputProduitNom'];
	// echo "<br>";
	// echo $_POST['inputProduitDescription'];
	// echo "<br>";
	// echo $_POST['inputPrixAchat'];
	// echo "<br>";
	// echo $_POST['inputCoefMarge'];
	// echo "<br>";
	// echo $_POST['inputPrixVente'];


	$PrixAchat = $_POST['inputPrixAchat'];
	$CoefMarge = $_POST['inputCoefMarge'];
	$PrixVente = $_POST['inputPrixVente'];

	$Description    = htmlspecialchars(rtrim(ltrim($_POST['inputProduitDescription'])));
	$Description = mysqli_real_escape_string($conn, $Description);

	$reqProduitEdit = "UPDATE produits SET prixachat='$PrixAchat', coefmarge='$CoefMarge', prixvente='$PrixVente', commentaire='$Description', desactiver='1' WHERE ref=$ref";

	echo $reqProduitEdit . "<br><br>";

	if ($conn->query($reqProduitEdit) == TRUE) 
	{
		$retour = "ok";
	} 
	else 
	{
		$retour = "Error: " . $reqProduitEdit . "<br>" . $conn->error;
		echo "<br>Error: " . $reqProduitEdit . "<br>" . $conn->error;
	}
	echo "<br>FIN";
	header('Location: /produit/edit.php?msg=' . $retour . '&ref=' . $ref);
}
else
{
	echo "pas OK";
}