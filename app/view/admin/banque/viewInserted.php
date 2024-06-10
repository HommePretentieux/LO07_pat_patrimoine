
<!-- ----- début viewInserted -->
<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentAdminMenu.php';
        include $root . '/app/view/fragment/fragmentJumbotron.html';
        ?>
        <!-- ===================================================== -->
        <?php
        if ($results) {
            echo ("<h3>La nouvelle banque a été ajoutée </h3>");
            echo("<ul>");
            echo ("<li>Label = " . $_GET['label'] . "</li>");
            echo ("<li>Pays = " . $_GET['pays'] . "</li>");
            echo("</ul>");
        } else {
            echo ("<h3>Problème d'insertion de la banque</h3>");
            echo ("label = " . $_GET['label']);
        }

        echo("</div>");

        include $root . '/app/view/fragment/fragmentFooter.html';
        ?>
        <!-- ----- fin viewInserted -->    


