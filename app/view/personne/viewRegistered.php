
<!-- ----- début viewInsert -->

<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentClientMenu.php';
        include $root . '/app/view/fragment/fragmentJumbotron.html';
        ?> 


    </div>
    <?php
    echo "Bienvenue dans le Pat'Patrimoine";
    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>

    <!-- ----- fin viewInsert -->



