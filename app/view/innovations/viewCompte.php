<!-- ----- début viewCompte -->

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
                <input type="hidden" name='action' value='AvailResid'>        
                <label class='fw-bold' for="compte">Compte de référence</label>
                <select class="form-control" id='compte' name='compte' style="width: 500px">
                    <?php
                    // La liste des comptes est dans une variable $results
                    // $element est une instance de la classe compte, on peut donc afficher son label et récupérer son id
                    foreach ($results as $compte) {
                        echo ("<option value=" . $compte->getId() . ">" . $compte->getLabel() . "</option>");
                    }
                    ?>
                </select>
                
            </div>
            <p/>
            <br/> 
            <button class="btn btn-warning mb-2" type="submit">Chercher</button>
        </form>
        <p/>
    </div>
    <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

    <!-- ----- fin viewCompte -->



