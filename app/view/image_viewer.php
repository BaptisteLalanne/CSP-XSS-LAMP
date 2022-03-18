<main>
    <div id="img_clear">
        <a href=".?route=dangling_clear">Nettoyer</a>
    </div>
    <div id="img_comments">

        <?php foreach ($data as $c) { ?>

        <div class="image">
            
            <img src="<?php echo $url; ?>" />

            <!-- 
            si $url = http://bidule.com/img.png
            alors <img src="http://bidule.com/img.png" />
            
            si $url = xxx" onload="alert('hacked')
            <img src="xxx" onload="alert('hacked')" />
            -->


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