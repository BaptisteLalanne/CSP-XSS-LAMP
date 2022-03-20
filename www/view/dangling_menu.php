<div id="menu">
    <ul>
        <?php 
        if (!isset($_SESSION['pseudo'])) {
        ?>
        <li><a href=".?route=dangling_login">Connexion</a></li>
        <li><a href=".?route=register">Inscription</a></li>
        <?php
        } else {
        ?>
        <li><a href=".?route=disconnect">Deconnexion</a></li>
        <li><a href=".?route=dangling_home">Messagerie</a></li>
        <?php
        }
        ?>
    </ul>
</div>
