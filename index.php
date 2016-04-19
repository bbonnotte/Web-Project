<?php
/*
* Page d'acceuil du site 
* 
* Projet de Programmation Web
* ENSEIRB MATMECA // Telecom
* @ author Benjamin BONNOTTE & Abdoul GUISSET
*
*/

// Pour chaque page du site on appel le fichier contenant les fonctions devant etre presente
require_once("src/fonctions.php");

// Définition du titre de la page
$titre = 'Acceuil';

// On appel l'entete de la page
include('src/entete.php');

// Permet de compter le nombre de brocantes disponible sur le site 
$nb_total_brocantes = $connect->prepare("SELECT * FROM brocante");
$nb_total_brocantes->execute();
$count = $nb_total_brocantes->rowCount();
?>

<section>
	<article>
		<h2>
			<p>
				Bonjour et bienvenue sur votre site de Brocante en ligne ! 
			</p>
		</h2>
			<p>
				Le principe est simple : 
					<ul>
						<li >Vous êtes dans le cas n°1 : Vous rechercher l'objet de vos rêves sur nos brocantes en lignes : <a href="brocantes.php">Consultez des maintenant nos brocantes !</a></li>
						<li>Vous êtes dans le cas n°2 : Vous souhaiter créer votre propre brocante et vendre vos objets c'est : <a href="inscription.php">Inscrivez-vous et vendez tout !</a></li>
						<p align ="center">Actuellement il y a <b><?php echo"$count"?></b> brocantes en ligne !</p>
						<p align ="center">Dans tous les cas, nous vous souhaitons une bonne visite sur <b>Brocant'eirb !</b></p>
					</ul>
			</p>

<!-- Konami Code : -->
<script type="text/javascript">
if ( window.addEventListener ) {
var kkeys = [], konami = "38,38,40,40,37,39,37,39,66,65";
window.addEventListener("keydown", function(e){
kkeys.push( e.keyCode );
if ( kkeys.toString().indexOf( konami ) >= 0 ) {
alert('Cliquez-ici :');
window.location = "http://enseirb-matmeca.fr";
}
}, true);
}
</script>	
<!-- Konami Code : -->
	</article>
</section>
<?php include('src/footer.php'); ?>
