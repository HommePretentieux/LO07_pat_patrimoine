<!-- ----- début viewConnect -->

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
                <input type="hidden" name='action' value='connected'>        
                <label class='fw-bold' for="login">Login</label>
                <input type="text" class='form-control' id='login' name='login' placeholder='prénom' required> <br>                          
                <label class='fw-bold' for="mdp">Mot de passe</label>
                <input type="password" class='form-control' id='mdp' name='mdp' placeholder='*******' required> <br> 
            </div>
            <button class="btn btn-warning mb-2" type="submit">Se connecter</button><br>
        </form>
    </div>
    
    <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

    <!-- ----- fin viewConnect -->



