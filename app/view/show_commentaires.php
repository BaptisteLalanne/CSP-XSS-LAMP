<main>
	
	<div">
		<div>
			<?php foreach ($data as $c) { ?>

			<div class="commentaire">
				<h3><?php echo $c->commentaire; ?></h3>
				<p>Ecrit par <?php echo $c->pseudo; ?></p>
			</div>

			<?php } ?>
		</div>
	</div>

</main>