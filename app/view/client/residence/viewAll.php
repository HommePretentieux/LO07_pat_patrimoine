
<!-- ----- début viewAll -->
<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentClientMenu.php';
        include $root . '/app/view/fragment/fragmentJumbotron.html';
        ?>

        <table class = "table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope = "col">Label</th>
                    <th scope = "col">Ville</th>
                    <th scope = "col">Prix</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // La liste des vins est dans une variable $results             
                foreach ($results as $element) {
                    printf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>", $element[0],
                            $element[1],
                            number_format($element[2], 2, ",", " "));
                }
                ?>
            </tbody>
        </table>
        
    </div>
    <?php
    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>
    <!------- fin viewAll-->


