
<!-- ----- début viewId -->
<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentAdminMenu.php';
        include $root . '/app/view/fragment/fragmentJumbotron.html';

        // $results contient un tableau avec la liste des clés.
        ?>

        <form role="form" method='get' action='router1.php'>
            <div class="form-group">
                <input type="hidden" name='action' value='banqueReadOne'>
                <label for="id">Label : </label> <select class="form-control" id='label' name='label' style="width: 250px">
                    <?php
                    foreach ($results as $label) {
                        echo ("<option>$label</option>");
                    }
                    ?>
                </select>
            </div>
            <p/><br/>
            <button class="btn btn-primary" type="submit">Entrer</button>
        </form>
        <p/>
    </div>

    <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

    <!-- ----- fin viewId -->