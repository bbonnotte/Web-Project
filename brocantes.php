<?php
/*
* Page de toute les brocantes 
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

?>
<section>
	<article>
		<!-- Formulaire de recherche en un mot -->
		<form action="brocantesearch.php" method="post" class="center">
				<b>Recherche en un mot : </b>
			    <input type="text" name="search">
			    <input type="submit" name="form" value="Rechercher">
		    </fieldset>
		</form>
		
		<!--Formulaire permettant de choisir une brocante selon un lieu précis -->
		<form method="post" enctype="multipart/form-data" action="brocantelieu.php" class="center">
			<fieldset><legend>Choix du département</legend>
			    <select name="lieu" size="1">
       				<?php for ($lieu = 01 ; $lieu <= 95 ; $lieu++)
						{ // Boucle pour le choix du lieu allant de 1 à 95 (départements)
					?>
                  <option value="<?php echo $lieu ?>"><?php echo $lieu; ?></option>
					<?php              
						}
					?>  
			    </select>
				<p id="submit"><input type="submit" value="GO !" tabindex="2"></p>
			</fieldset>
		</form>
<?php 
//On récupère toute les infos sur les brocantes
$brocantes = $connect->prepare("SELECT * FROM brocante");
$brocantes->execute() or die(print_r($brocantes->errorInfo(), true));
		

// Boucle pour l'affichage
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
	</article>
</section>
<?php include('src/footer.php'); ?>