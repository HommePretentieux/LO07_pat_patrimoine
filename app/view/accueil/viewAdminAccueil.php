<!-- ----- début de la page d'accueil d'un administrateur -->

<?php include $root . '/app/view/fragment/fragmentHeader.html'; ?>
<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentAdminMenu.php';
        include $root . '/app/view/fragment/fragmentJumbotron.html';
        ?>
    </div>   

    <?php
    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>

    <!-- ----- fin de la page d'accueil d'un administrateur -->

</body>
</html>