
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
                <input type="hidden" name='action' value='AvailResid'>        
                <label class='w-25' for="compte">Compte de référence : </label> <br/> <select class="form-control" id='compte' name='compte' style="width: 500px">
                    <?php
                    foreach ($results as $compte) {
                        echo ("<option value=" . $compte->getId() . ">" . $compte->getLabel() . "</option>");
                    }
                    ?>
                </select>
                
            </div>
            <p/>
            <br/> 
            <button class="btn btn-primary" type="submit">Chercher</button>
        </form>
        <p/>
    </div>
    <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

    <!-- ----- fin viewInsert -->



