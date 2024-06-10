
<!-- ----- début viewInserted -->
<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentClientMenu.php';
        include $root . '/app/view/fragment/fragmentJumbotron.html';
        ?>
        <!-- ===================================================== -->
        <?php
        if ($results != -1) {
            echo ("<h3>Le nouveau compte a été ajoutée </h3>");
            echo("<ul>");
            echo ("<li>Label = $results[1]</li>");
            echo ("<li>Montant = $results[2]</li>");
            echo ("<li>Banque = $banque[0]</li>");
        } else {
            echo ("<h3>Problème d'insertion du compte</h3>");
        }

        echo("</div>");

        include $root . '/app/view/fragment/fragmentFooter.html';
        ?>
        <!-- ----- fin viewInserted -->    


