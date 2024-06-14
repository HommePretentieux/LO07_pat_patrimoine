
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
                <input type="hidden" name='action' value='compteCreated'>        
                <label class='w-25' for="label">Label : </label> <br/> <input type="text" id='label' name='label' size='75' placeholder='Livret A'> <br/>                          
                <label class='w-25' for="montant">Montant : </label> <br/> <input type="float" id ='montant' name='montant' placeholder='30 000,00'> <br/>
                <label class='w-25' for="banque">Banque : </label> <br/> <select class="form-control" id='banque' name='banque' style="width: 500px">
                    <?php
                    foreach ($results as $banque) {
                        echo ("<option value=" . $banque->getId() . ">" . $banque->getLabel() . "</option>");
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



