<!-- ----- début de viewAll pour le patrimoine du client -->

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
        <h2> Votre patrimoine </h2>
        <br>

        <table class = "table table-bordered table-warning">
            <thead>
                <tr>
                    <th scope = "col">Catégorie</th>
                    <th scope = "col">Label</th>
                    <th scope = "col">Valeur</th>
                    <th scope = "col">Capital</th>
                </tr>
            </thead>
            <tbody>
                
                <?php
                $cumul = 0;
                // La liste des comptes est dans une variable $comptes
                // $element est une instance de la classe compte, on peut donc appeler son label et son montant
                foreach ($comptes as $element) {
                    $cumul = $cumul + $element->getMontant();
                    printf("<tr class='table-primary'><td>Compte</td><td>%s</td><td>%s</td><td>%s</td></tr>", $element->getLabel(),
                            number_format($element->getMontant(), 2, ",", " "), number_format($cumul, 2, ",", " "));
                }
                // La liste des résidences est dans une variable $resid
                // $element est une instance de la classe résidence, on peut donc appeler son label et son prix
                foreach ($resid as $element) {
                    $cumul = $cumul + $element->getPrix();
                    printf("<tr class='table-info'><td>Résidence</td><td>%s</td><td>%s</td><td>%s</td></tr>", $element->getLabel(),
                            number_format($element->getPrix(), 2, ",", " "), number_format($cumul, 2, ",", " "));
                }
                ?>
                
            </tbody>
        </table>
        <br>
    </div>
    
    <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

    <!-- ----- fin de viewAll pour le patrimoine du client -->


