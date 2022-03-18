<main>

    <h2>Messagerie</h2>

    <div id="dw_clear">
        <a class="blackButton" href=".?route=dangling_clear">Supprimer l'historique</a>
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

            <input type='submit' value='Envoyer'>
        </form>
    </div>

    <div id='dangling_profile'>
        <h3>Votre profil: </h3>
        <p><b>Pseudo : </b><?= $_SESSION['pseudo'] ?></p>
        <p><b>Mail : </b><?= $_SESSION['mail'] ?></p>
        <p><b>Clef API : </b><?= $_SESSION['key'] ?></p>
    </div>
</main>