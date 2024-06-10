
<!-- ----- début viewInsert -->

<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentClientMenu.php';
        include $root . '/app/view/fragment/fragmentJumbotron.html';
        ?> 

        <form role="form" method='get' action='router1.php'>
            <div class="form-group">
                <input type="hidden" name='action' value='BoughtResidence'> 
                <label class='w-25' for="acheteur">Compte de l'acheteur : </label> <br/> <select class="form-control" id='acheteur' name='acheteur' style="width: 500px">
                    <?php
                    foreach ($compte_acheteur as $compte) {
                        echo ("<option value=" . $compte->getId() . ">" . $compte->getLabel() . "</option>");
                    }
                    ?>
                </select>
                
                <label class='w-25' for="vendeur">Compte du vendeur : </label> <br/> <select class="form-control" id='vendeur' name='vendeur' style="width: 500px">
                    <?php
                    foreach ($compte_vendeur as $compte) {
                        echo ("<option value=" . $compte->getId() . ">" . $compte->getLabel() . "</option>");
                    }
                    ?>
                </select>
                
                <?php
                echo ("<label class='w-25' for='prix'>Prix : </label> <br/> <input type='number' id ='prix' name='prix' value='$residence_prix[0]'> <br/>");
                ?>
            </div>
            <p/>
            <br/> 
            <button class="btn btn-primary" type="submit">Ajouter</button>
        </form>
        <p/>
    </div>
    <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

    <!-- ----- fin viewInsert -->



