<!-- ----- début de viewAll pour les comptes -->

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
        <h2> Liste des comptes enregistrés sur le site </h2>
        <br>
        
        <table class = "table table-striped table-bordered table-warning">
            <thead>
                <tr>
                    <th scope = "col">Nom</th>
                    <th scope = "col">Prénom</th>
                    <th scope = "col">Banque</th>
                    <th scope = "col">Pays</th>
                    <th scope = "col">Compte</th>
                    <th scope = "col">Montant</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // La liste des comptes est dans une variable $results
                // $element contient le nom et le prenom du client, sa banque et son pays, le nom et le montant du compte
                foreach ($results as $element) {
                    printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", $element[0],
                            $element[1],
                            $element[2],
                            $element[3],
                            $element[4],
                            number_format($element[5], 2, ",", " "));
                }
                ?>
            </tbody>
        </table>
        <br>
    </div>
    <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

    <!-- ----- fin de viewAll pour les comptes -->


