<!-- ----- début de viewAll pour les compte du client -->

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
        <h2> Liste de vos comptes </h2>
        <br>
        
        <table class = "table table-striped table-bordered table-warning">
            <thead>
                <tr>
                    <th scope = "col">Banque</th>
                    <th scope = "col">Pays</th>
                    <th scope = "col">Compte</th>
                    <th scope = "col">Montant</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // La liste des comptes est dans une variable $results
                // $element contient la banque dans lequel est inscrit le compte, son pays, son label et son montant
                foreach ($results as $element) {
                    printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", $element[0],
                            $element[1],
                            $element[2],
                            number_format($element[3], 2, ",", " "));
                }
                ?>
            </tbody>
        </table>
        <br>
    </div>
    <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

    <!-- ----- fin de viewAll pour les compte du client -->


