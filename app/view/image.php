<main>
	
	<!-- URL FORM -->
	<div id="img_form" class="contentPane">
		<h3>Construisez votre propre album à partir de vos images Imgur préférées !</h3>
		<div>
			<form action='.?route=image_insert' method='POST'>
				<label for='imageSrc'>URL Imgur :</label> <input type='text' id='imageSrc' name='imageSrc'>
				<input type="submit" id="imageSubmitButton" value="Ajouter">
			</form>
		</div>
	</div>

	<!-- IMAGES -->
	<div id="img_album" class="contentPane">
		<h3>Les photos de l'album :</h3>
		<div id="img_album_container">
			<?php foreach ($imageData as $i) { ?>
				<div class="image">
					<img src="<?= $i->src ?>">
				</div>
			<?php } ?>
		</div>
	</div>

	<!-- CLEAR BUTTON -->
	<div id="img_clear" class="contentPane">
		<a class="blackButton" href=".?route=image_clear">Supprimer les photos</a>
	</div>

</main>