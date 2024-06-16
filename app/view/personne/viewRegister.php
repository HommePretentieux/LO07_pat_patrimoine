<!-- ----- début viewRegister -->

<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
    <div class="container">
        
        <?php
        include $root . '/app/view/fragment/fragmentMenu.html';
        include $root . '/app/view/fragment/fragmentJumbotron.html';
        ?> 

        <form role="form" class='mt-3' method='get' action='router1.php'>
            <div class="form-group col-4">
                <input type="hidden" name='action' value='registered'>
                <label class='fw-bold' for="nom">Nom</label>
                <input type="text" class='form-control' id='nom' name='nom' placeholder='Dupont'> <br>
                <label class='fw-bold' for="prenom">Prénom</label>
                <input type="text" class='form-control' id='prenom' name='prenom' placeholder='Jean'> <br>                      
                <label class='fw-bold' for="login">Login</label>
                <input type="text" class='form-control' id='login' name='login' placeholder='jean'> <br>                      
                <label class='fw-bold' for="mdp">Mot de passe</label>
                <input type="password" class='form-control' id='mdp' name='mdp' placeholder='secret'> <br>
            </div>
            <button class="btn btn-warning mb-2" type="submit">S'inscrire</button><br>
        </form>
    </div>
    
    <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

    <!-- ----- fin viewRegister -->



