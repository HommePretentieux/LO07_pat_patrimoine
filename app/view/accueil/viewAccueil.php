<!-- ----- début de la page d'accueil général -->

<?php include $root . '/app/view/fragment/fragmentHeader.html'; ?>
<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentMenu.html';
        include $root . '/app/view/fragment/fragmentJumbotron.html';
        ?>
    </div>   

    <?php
    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>

    <!-- ----- fin de la page d'accueil général -->

</body>
</html>