<!-- ----- début viewInsert pour un compte -->

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
        <h2> Ajout d'un compte </h2>
        
        <form role="form" class='mt-3' method='get' action='router1.php'>
            <div class="form-group col-4">
                <input type="hidden" name='action' value='compteCreated'>        
                <label class='fw-bold' for="label">Label</label>
                <input type="text" class='form-control' id='label' name='label' size='75' placeholder='Livret A' required> <br>                          
                <label class='fw-bold' for="montant">Montant</label>
                <input type="float" class='form-control' id ='montant' name='montant' placeholder='30 000,00' required> <br>
                <label class='fw-bold' for="banque">Banque</label>
                <select class="form-control" id='banque' name='banque' style="width: 250px">
                    <?php
                    // La liste des banques est dans une variable $results
                    // $element est une instance de la classe banque, on peut donc afficher son label et récupérer son id
                    foreach ($results as $banque) {
                        echo ("<option value=" . $banque->getId() . ">" . $banque->getLabel() . "</option>");
                    }
                    ?>
                </select>
            </div> <br>
            <button class="btn btn-warning mb-2" type="submit">Ajouter</button> <br>
        </form>
    </div>
    <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

    <!-- ----- fin viewInsert pour un compte -->



