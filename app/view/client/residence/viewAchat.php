<!-- ----- début viewAchatt -->

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
        <h2> Achat d'une résidence </h2>

        <form role="form" class='mt-3' method='get' action='router1.php'>
            <div class="form-group col-4">
                <input type="hidden" name='action' value='BoughtResidence'> 
                <input type="hidden" name='label' value='<?php echo $residence_label; ?>'> 
                <label class='fw-bold' for="acheteur">Compte de l'acheteur</label>
                <select class="form-control" id='acheteur' name='acheteur' style="width: 250px">
                    <?php
                    foreach ($compte_acheteur as $compte) {
                        echo ("<option value=" . $compte->getId() . ">" . $compte->getLabel() . "</option>");
                    }
                    ?>
                </select><br>
                <label class='fw-bold' for="vendeur">Compte du vendeur</label>
                <select class="form-control" id='vendeur' name='vendeur' style="width: 250px">
                    <?php
                    foreach ($compte_vendeur as $compte) {
                        echo ("<option value=" . $compte->getId() . ">" . $compte->getLabel() . "</option>");
                    }
                    ?>
                </select><br>
                
                <?php
                echo ("<label class='fw-bold' for='prix'>Prix</label> <input type='number' class='form-control' id ='prix' name='prix' value='" . $infos['prix'] . "' readonly><br>");
                ?>
            </div>
            <button class="btn btn-warning mb-2" type="submit">Ajouter</button> <br>
        </form>
    </div>
    <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

    <!-- ----- fin viewAchat -->



