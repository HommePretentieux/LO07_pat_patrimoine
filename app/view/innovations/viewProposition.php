 
<!-- ----- debut de la page cave_acceuil -->
<?php include $root . '/app/view/fragment/fragmentHeader.html'; ?>
<body>
    <div class="container">
        <?php
        if ($_SESSION['statut'] == 0) {
            include $root . '/app/view/fragment/fragmentAdminMenu.php';
        } else if ($_SESSION['statut'] == 1) {
            include $root . '/app/view/fragment/fragmentClientMenu.php';
        } else {
            include $root . '/app/view/fragment/fragmentMenu.html';
        }

        include $root . '/app/view/fragment/fragmentJumbotron.html';
        ?>


        <div> <h4>Disclaimer : il s'agit plus d'alternatives potentielles que de propositions d'amélioration.</h4> </div>
        <div> <ul>
                <li> Pour économiser quelques lignes de code, on pourrait passer directement par les vues pour appeler les controlleurs ou d'autres vues, au lieu d'utiliser un routeur. Celui-ci existerait toujours, mais ne serait appelé que pour les accueils.
                </li>
                <li> On pourrait aussi complètement supprimer le routeur et remplacer le fichier actuel index par le fichier viewAccueil, puis passer de vue en vue en utilisant les différents controlleurs.</li>
                <li> On pourrait automatiser la recherche de données en envoyant un formulaire à l'utilisateur pour qu'il décide des infos que la vue affiche. On lui donnerait le choix entre les différentes classes, et leurs différents attibuts, pour qu'il puisse choisir librement ce qu'il y aura dans le tableau de données</li>
            </ul>
        </div>
    </div>   



    <?php
    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>

    <!-- ----- fin de la page cave_acceuil -->

</body>
</html>