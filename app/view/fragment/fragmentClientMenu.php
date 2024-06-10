
<!-- ----- début fragmentCaveMenu -->

<nav class="navbar navbar-expand-lg bg-success fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="router1.php?action=CaveAccueil">Siebering-Hospitalier</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mes comptes bancaires</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router1.php?action=compteReadAllFromClient">Liste de mes comptes</a></li>
            <li><a class="dropdown-item" href="router1.php?action=compteCreate">Ajouter un nouveau compte</a></li>
            <li><a class="dropdown-item" href="router1.php?action=compteTransfert">Transfert inter-comptes</a></li> 
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mes résidences</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router1.php?action=readAllResidence">Liste de mes résidences</a></li>
            <li><a class="dropdown-item" href="router1.php?action=vinReadId">Achat d'une nouvelle résidence</a></li>           
          </ul>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mon patrimoine</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router1.php?action=banqueReadAll">Bilan de mon patrimoine</a></li>
          </ul>
        </li>   
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Innovations</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router1.php?action=vinReadAll">Proposez une fonctionnalité originale</a></li>
            <li><a class="dropdown-item" href="router1.php?action=vinReadId">Proposez une amélioration du code MVC</a></li>
          </ul>
        </li><li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Profil</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router1.php?action=connect">Se connecter</a></li>
            <li><a class="dropdown-item" href="router1.php?action=vinReadId">S'inscrire</a></li>
            <li><a class="dropdown-item" href="router1.php?action=vinCreate">Se déconnecter</a></li> 
          </ul>
        </li>

      </ul>
    </div>
  </div>
</nav> 

<!-- ----- fin fragmentCaveMenu -->
