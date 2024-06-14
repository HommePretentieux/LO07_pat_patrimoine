 
<!-- ----- debut de la page cave_acceuil -->
<?php include 'fragment/fragmentHeader.html'; ?>
<body>
    <div class="container">
        <?php
        if ($_SESSION['statut'] == 0) {
            include 'fragment/fragmentAdminMenu.php';
        } else {
            include 'fragment/fragmentMenu.html';
        }
        
        include 'fragment/fragmentJumbotron.html';
        ?>


        <div> <h4>Vous n'avez pas le statut pour avoir accès à cette option</h4> </div>
        <div> <p> Cette fonctionnalité permet au client de regarder quelle(s) résidence(s) il peut acheter avec le compte de son choix. Pour y avoir accès, vous devez vous connecter en tant que client.
            </p>
        </div>
    </div>   



    <?php
    include 'fragment/fragmentFooter.html';
    ?>

    <!-- ----- fin de la page cave_acceuil -->

</body>
</html>