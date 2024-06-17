<!-- ----- début viewTransfert -->

<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentClientMenu.php';
        include $root . '/app/view/fragment/fragmentJumbotron.html';
        ?> 

        <form role="form" class='mt-3' method='get' action='router1.php'>
            <div class="form-group col-4">
                <input type="hidden" name='action' value='compteTransferred'>        
                <label class='fw-bold' for="banque1">Compte de retrait</label> 
                <select class="form-control" id='banque1' name='banque1' style="width: 500px">
                    <?php
                    foreach ($results as $compte) {
                        echo ("<option value=" . $compte->getId() . ">" . $compte->getLabel() . "</option>");
                    }
                    ?>
                </select> <br>
                <label class='fw-bold' for="montant">Montant</label>
                <input type="float" class='form-control' id ='montant' name='montant' placeholder='30 000,00' required> <br>
                <label class='fw-bold' for="banque2">Compte de dépôt</label>
                <select class="form-control" id='banque2' name='banque2' style="width: 500px">
                    <?php
                    foreach ($results as $compte) {
                        echo ("<option value=" . $compte->getId() . ">" . $compte->getLabel() . "</option>");
                    }
                    ?>
                </select>
            </div> <br>
            <button class="btn btn-warning mb-2" type="submit">Ajouter</button>
        </form>
        <p/>
    </div>
    <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

    <!-- ----- fin viewTransfert -->



