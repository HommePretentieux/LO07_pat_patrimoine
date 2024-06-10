
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


    </div>
    <?php
    echo "erreur : login ou mot de passe incorrect";
    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>

    <!-- ----- fin viewInsert -->



