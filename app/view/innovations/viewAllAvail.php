<!-- ----- début de viewAll pour les résidences disponibles -->

<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentClientMenu.php';
        include $root . '/app/view/fragment/fragmentJumbotron.html';
        ?>

        <br>
        <h2> Résidences disponibles avec votre compte </h2>
        <br>
        
        <table class = "table table-striped table-bordered table-warning">
            <thead>
                <tr>
                    <th scope = "col">Label</th>
                    <th scope = "col">Ville</th>
                    <th scope = "col">Prix</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // La liste des résidences est dans une variable $results
                // $element est une instance de la classe résidence, on peut donc appeler son label, sa ville et son prix
                foreach ($results as $element) {
                    printf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>", $element->getLabel(),
                            $element->getVille(),number_format($element->getPrix(), 2, ",", " "));
                }
                ?>
            </tbody>
        </table>
        <br>
    </div>
    <?php
    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>
    <!------- fin de viewAll pour les résidences disponibles -->


