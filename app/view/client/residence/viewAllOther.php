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

        <form role="form" method='get' action='router1.php'>
            <div class="form-group">
                <input type="hidden" name='action' value='ReadOneResidence'>
                <label for="label">Label : </label> 
                <select class="form-control" id='label' name='label' style="width: 250px">
                    <?php
                    foreach ($results as $label) {
                        echo ("<option value=".$label->getId().">".$label->getLabel()."</option>");
                    }
                    ?>
                </select>
            </div>
            <p/><br/>
            <button class="btn btn-primary" type="submit">Entrer</button>
        </form>
        
    </div>
    <?php
    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>
    <!------- fin de viewAll pour les résidences des autres clients -->


