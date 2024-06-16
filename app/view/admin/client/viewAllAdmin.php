<!-- ----- début de viewAll pour les administrateurs -->

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
        <h2> Liste des administrateurs du site </h2>
        <br>
        
        <table class = "table table-striped table-bordered table-warning">
            <thead>
                <tr>
                    <th scope = "col">Nom</th>
                    <th scope = "col">Prenom</th>
                    <th scope = "col">Login</th>
                    <th scope = "col">Mot de passe</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // La liste des administrateurs est dans une variable $results
                // $element est une instance de la classe personne, on peut donc appeler son nom, son prénom, son login et son mot de passe
                foreach ($results as $element) {
                    printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", $element->getNom(),
                            $element->getPrenom(), $element->getLogin(), $element->getPassword());
                }
                ?>
            </tbody>
        </table>
        <br>
    </div>
    <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

    <!-- ----- fin de viewAll pour les administrateurs -->


