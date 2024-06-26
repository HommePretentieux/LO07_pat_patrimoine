<!-- ----- début fragmentAdminMenu -->

<nav class="navbar navbar-expand-lg bg-warning fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="router1.php?action=accueil">Siebering-Hospitalier</a>
        <a class="navbar-brand" href="router1.php?action=accueilAdmin"><?php echo ("| Administrateur | ".$_SESSION['nom'] ." ". $_SESSION['prenom'] . " |");?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Banques</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="router1.php?action=banqueReadAll">Liste des banques</a></li>
                        <li><a class="dropdown-item" href="router1.php?action=banqueCreate">Ajout d'une banque</a></li>
                        <li><a class="dropdown-item" href="router1.php?action=banqueReadLabel">Liste des comptes d'une banque</a></li> 
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Clients</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="router1.php?action=clientReadAll">Liste des clients</a></li>
                        <li><a class="dropdown-item" href="router1.php?action=adminReadAll">Liste des administrateurs</a></li>
                        <li><a class="dropdown-item" href="router1.php?action=compteReadAll">Liste des comptes</a></li>
                        <li><a class="dropdown-item" href="router1.php?action=residenceReadAll">Liste des residences</a></li>
                    </ul>
                </li><li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Innovations</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="router1.php?action=pasClient">Proposez une fonctionnalité originale</a></li>
                        <li><a class="dropdown-item" href="router1.php?action=proposition">Proposez une amélioration du code MVC</a></li>
                    </ul>
                </li><li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Profil</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="router1.php?action=connect">Se connecter</a></li>
                        <li><a class="dropdown-item" href="router1.php?action=register">S'inscrire</a></li>
                        <li><a class="dropdown-item" href="router1.php?action=disconnect">Se déconnecter</a></li> 
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav> 

<!-- ----- fin fragmentAdminMenu -->

