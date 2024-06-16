<!-- ----- début de la page d'accueil d'un client -->

<?php include $root . '/app/view/fragment/fragmentHeader.html'; ?>
<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentClientMenu.php';
        include $root . '/app/view/fragment/fragmentJumbotron.html';
        ?>
    </div>   

    <?php
    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>

    <!-- ----- fin de la page d'accueil d'un client -->

</body>
</html>