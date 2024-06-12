
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

    <table class = "table table-bordered">
      <thead>
        <tr>
          <th scope = "col">Catégorie</th>
          <th scope = "col">Label</th>
          <th scope = "col">Valeur</th>
          <th scope = "col">Capital</th>
        </tr>
      </thead>
      <tbody>
          <?php
          $cumul=0;            
          foreach ($comptes as $element) {
              $cumul=$cumul+$element->getMontant();
           printf("<tr class='table-primary'><td>Compte</td><td>%s</td><td>%d</td><td>%d</td></tr>", $element->getLabel(), 
             $element->getMontant(), $cumul);
          }
          foreach ($resid as $element) {
              $cumul=$cumul + $element[2];
           printf("<tr class='table-info'><td>Résidence</td><td>%s</td><td>%s</td><td>%s</td></tr>", $element[0], 
             $element[2], $cumul);
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  