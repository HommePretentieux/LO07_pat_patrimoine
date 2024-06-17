<!-- ----- début viewAchete -->

<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentClientMenu.php';
        include $root . '/app/view/fragment/fragmentJumbotron.html';
        ?>
       
        <?php
        echo ("<h3>L'achat a bien été effectué<h3>");
        echo ("<br>");
        echo ("</div>");

        include $root . '/app/view/fragment/fragmentFooter.html';
        ?>
        
        <!-- ----- fin viewAchete -->    


