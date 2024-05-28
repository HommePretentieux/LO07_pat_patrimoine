<?php
include 'nav.php';

?>
<br>
<div id='exercice1' class="card ">
    <div class="card-body bg-info align-self-center col-10">
        <h5 class="card-title">insertion d'un tuple</h5>
        <?php
        echo "<ul><li>dsn =$dsn</li><li>username =$username</li><li>password=....</ul><br>";
        try {
            $requete = "insert into vin values (3001, 'Champagne de Troyes', 1976, 11.45)";
            $database->exec($requete);
            echo "tuple inséré =1";
        } catch (PDOException $e) {
            echo "tuple inséré=0";
        }
        ?>
    </div>
</div>
<br>