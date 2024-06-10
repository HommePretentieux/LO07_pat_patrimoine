
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
                <input type="hidden" name='action' value='connected'>        
                <label class='w-25' for="id">Login : </label><input type="text" name='login' size='75' placeholder='prénom'> <br/>                          
                <label class='w-25' for="id">Mot de passe : </label><input type="password" name='mdp' placeholder='*******'> <br/> 
            </div>
            <p/>
            <br/> 
            <button class="btn btn-primary" type="submit">Se connecter</button>
        </form>
        <p/>
    </div>
    <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

    <!-- ----- fin viewInsert -->



