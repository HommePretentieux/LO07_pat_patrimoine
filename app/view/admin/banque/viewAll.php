<!-- ----- début de viewAll pour les banques -->

<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentAdminMenu.php';
        include $root . '/app/view/fragment/fragmentJumbotron.html';
        ?>

        <br>
        <h2> Liste des banques inscrites sur le site </h2>
        <br>
        
        <table class = "table table-striped table-bordered table-warning">
            <thead>
                <tr>
                    <th scope = "col">Label</th>
                    <th scope = "col">Pays</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // La liste des banques est dans une variable $results
                // $element est une instance de la classe banque, on peut donc appeler son label et son pays
                foreach ($results as $element) {
                    printf("<tr><td>%s</td><td>%s</td></tr>", $element->getLabel(),
                            $element->getPays());
                }
                ?>
            </tbody>
        </table>
        <br>
    </div>
    <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

    <!-- ----- fin de viewAll pour les banques -->


