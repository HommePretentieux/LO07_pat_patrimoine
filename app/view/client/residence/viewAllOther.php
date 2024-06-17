<!-- ----- début de viewAll pour les résidences des autres clients -->

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
            <div class="form-group">
                <input type="hidden" name='action' value='residenceReadOne'>
                <label class='fw-bold' for="label">Label</label> 
                <select class="form-control" id='label' name='label' style="width: 250px">
                    <?php
                    // La liste des résidnces est dans une variable $results
                    // $label est une instance de la classe residence, on peut donc afficher son label et récupérer son id
                    foreach ($results as $label) {
                        echo ("<option value=".$label->getId().">".$label->getLabel()."</option>");
                    }
                    ?>
                </select><br>
            </div>
            <button class="btn btn-warning mb-2" type="submit">Entrer</button><br>
        </form>
    </div>
    <?php
    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>
    <!------- fin de viewAll pour les résidences des autres clients -->


