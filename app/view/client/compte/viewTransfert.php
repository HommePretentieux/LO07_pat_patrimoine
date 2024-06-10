
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
                <input type="hidden" name='action' value='compteTransferred'>        
                <label class='w-25' for="banque1">Banque de retrait: </label> <br/> <select class="form-control" id='banque1' name='banque1' style="width: 500px">
                    <?php
                    foreach ($results as $compte) {
                        echo ("<option value=".$compte->getId().">".$compte->getLabel()."</option>");
                    }
                    ?>
                </select>
                <label class='w-25' for="montant">Montant : </label> <br/> <input type="float" id ='montant' name='montant' placeholder='30 000,00'> <br/>
                <label class='w-25' for="banque2">Banque de dépôt: </label> <br/> <select class="form-control" id='banque2' name='banque2' style="width: 500px">
                    <?php
                    foreach ($results as $compte) {
                        echo ("<option value=".$compte->getId().">".$compte->getLabel()."</option>");
                    }
                    ?>
                </select>
            </div>
            <p/>
            <br/> 
            <button class="btn btn-primary" type="submit">Ajouter</button>
        </form>
        <p/>
    </div>
    <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

    <!-- ----- fin viewInsert -->



