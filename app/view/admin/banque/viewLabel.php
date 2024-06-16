<!-- ----- début viewLabel -->

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
        <h2> Choix d'une banque </h2>
        
        <form role="form" class='mt-3' method='get' action='router1.php'>
            <div class="form-group col-4">
                <input type="hidden" name='action' value='banqueReadSome'>
                <label class='fw-bold' for="id">Label</label> 
                <select class="form-control" id='id' name='id' style="width: 250px">
                    <?php
                    // La liste des banques est dans une variable $results
                    // $element est une instance de la classe banque, on peut donc afficher son label et récupérer son id
                    foreach ($results as $element) {
                        echo ("<option value=" . $element->getId() . ">" . $element->getLabel() . "</option>");
                    }
                    ?>
                </select> <br>
            </div>
            <button class="btn btn-warning mb-2" type="submit">Chercher</button>
        </form>
        <p/>
    </div>

    <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

    <!-- ----- fin viewLabel -->