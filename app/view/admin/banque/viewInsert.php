<!-- ----- début de la vue affichant le formulaire pour ajouter un banque -->

<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentAdminMenu.php';
        include $root . '/app/view/fragment/fragmentJumbotron.html';
        ?> 

        <br>
        <h2> Ajout d'une banque </h2>
        
        <form role="form" class='mt-3' method='get' action='router1.php'>
            <div class="form-group col-4">
                <input type="hidden" name='action' value='banqueCreated'>        
                <label class='fw-bold' for="label">Label</label>
                <input type="text" class='form-control' id='label' name='label' value='Banque de smerep'> <br>                          
                <label class='fw-bold' for="pays">Pays</label>
                <input type="text" class='form-control' id='pays' name='pays' value='France'> <br> 
            </div>
            <button class="btn btn-warning mb-2" type="submit">Ajouter</button> <br>
        </form>
    </div>
    <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

    <!-- ----- fin viewInsert -->



