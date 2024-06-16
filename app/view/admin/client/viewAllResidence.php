<!-- ----- début de viewAll pour les résidences -->

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
        <h2> Liste des résidences enregistrées sur le site </h2>
        <br>
        
        <table class = "table table-striped table-bordered table-warning">
            <thead>
                <tr>
                    <th scope = "col">Nom</th>
                    <th scope = "col">Prenom</th>
                    <th scope = "col">Label</th>
                    <th scope = "col">Ville</th>
                    <th scope = "col">Prix</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // La liste des résidences est dans une variable $results
                // $element contient le nom et le prénom du propriétaire, le nom, la ville et le prix de la résidence
                foreach ($results as $element) {
                    printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", $element[0],
                            $element[1],
                            $element[2],
                            $element[3],
                            number_format($element[4], 2, ",", " "));
                }
                ?>
            </tbody>
        </table>
        <br>
    </div>
    <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

    <!-- ----- fin de viewAll pour les résidences -->


