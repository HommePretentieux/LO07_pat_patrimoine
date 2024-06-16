<!-- ----- début viewErrorConnect -->

<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
    <div class="container">
        
        <?php
        include $root . '/app/view/fragment/fragmentMenu.html';
        include $root . '/app/view/fragment/fragmentJumbotron.html';
        ?> 
        
        <h2> Erreur : login ou mot de passe incorrect </h2>
        <br>
    </div>
    
    <?php
    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>

    <!-- ----- fin viewErrorConnect -->



