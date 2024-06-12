
<!-- ----- début viewInsert -->

<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentMenu.html';
        include $root . '/app/view/fragment/fragmentJumbotron.html';
        ?> 

        <form role="form" method='get' action='router1.php'>
            <div class="form-group">
                <input type="hidden" name='action' value='registered'>
                <label class='w-25' for="nom">Nom : </label><input type="text" id='nom' name='nom' size='75' placeholder='Dupont'> <br><br>
                <label class='w-25' for="prenom">Prénom : </label><input type="text" id='prenom' name='prenom' size='75' placeholder='Jean'> <br><br>                          
                <label class='w-25' for="login">Login : </label><input type="text" id='login' name='login' size='75' placeholder='jean'> <br><br>                          
                <label class='w-25' for="mdp">Mot de passe : </label><input type="text" od='mdp' name='mdp' placeholder='secret'> <br> <br>
            </div>
            <p/>
            <br/> 
            <button class="btn btn-primary" type="submit">S'inscrire</button>
        </form>
        <p/>
    </div>
    <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

    <!-- ----- fin viewInsert -->



