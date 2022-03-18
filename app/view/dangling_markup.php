<main>
    <div id="dw_clear">
        <a class="blackButton" href=".?route=dangling_clear">Nettoyer</a>
    </div>
    <div id="dw_comments">
        <?php foreach ($data as $c) { ?>

        <div class="comment">
            <p><b>Commentaire :</b> <?= $c->comment ?></p>
        </div>

        <?php } ?>
	</div>
    <div>
        <form action='.?route=dangling_insert' method='POST'>

            <p>
                <label for='comment'>Votre commentaire :</label>
                <input type='text' id='comment' name='comment'>
            </p>

            <input type='text' name='_token' value='keep_that_nounce_secret' hidden>
            <input type="submit" value="Envoyer">
        </form>
    </div>
</main>