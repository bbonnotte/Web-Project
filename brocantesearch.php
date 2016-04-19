<?php
/*
* Page des brocantes dans selon la recherche d'un utilisateur
*
* Projet de Programmation Web
* ENSEIRB MATMECA // Telecom
* @ author Benjamin BONNOTTE & Abdoul GUISSET
*
*/

//Nom de la page
$titre= 'Les Brocantes';

require_once("src/fonctions.php");

include('src/entete.php');

// On recupere la requete de l'uilisateur
$search=$_POST['search'];

?>
<section>
	<article>

<?php 
//On récupère toute les infos sur les brocantes
$brocantes = $connect->prepare("SELECT * FROM brocante WHERE description LIKE '%$search%'");
$brocantes->execute() or die(print_r($brocantes->errorInfo(), true));

// Titre
echo "
<h2> Les brocantes \"$search\" </h2> 
";


// Boucle pour l'affichage des brocantes selon la recherche
	while ($ligne = $brocantes->fetch()) {
			
		$ID_Brocante = $ligne['ID_Brocante'];
		$nom_brocante = $ligne['nom_brocante'];
		$lieu = $ligne['lieu'];
		$description = $ligne['description'];
		$photo1=$ligne['photo1'];

			echo "
		<div class='broc'>	
		<a href=\"detailbroc.php?idbroc=$ID_Brocante\"><h2>Brocante \"$nom_brocante\" </h2></a>
		<img  class='roundedImageShadowProfil' src='src/$photo1'>
		<p><b>Description de la brocante :</b> $description</p>
		</div>
		<br>
		";
	
}

?>
<!-- Bouton de retour à la page principal des brocantes-->
	<a href="brocantes.php">Retour aux brocantes</a>

	</article>
</section>
<?php include('src/footer.php'); ?>