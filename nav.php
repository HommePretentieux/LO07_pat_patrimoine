<!doctype html>
<?php
include '../connection.php';
?>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TODO</title>
        <link 
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
            rel="stylesheet" 
            integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" 
            crossorigin="anonymous">
        <link rel="stylesheet" href="../css/bootstrap53.min.css" type="text/css"/>

    </head>
    <body>
        <div class="container">
            <h1>TD</h1>
            <script 
                src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
                integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
            </script>

            <!-- ================================================================================================================ -->
            <!-- ===== Exercice 1 : Squelette de la page avec modification du navbar -->
            <!-- ================================================================================================================ -->

            <nav class="navbar navbar-expand-lg bg-primary fixed-top">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Siebering-Hospitalier</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Banques</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="https://www.php.net/manual/en/langref.php">la doc</a></li>
                                    <li><a class="dropdown-item" href="https://www.php.net/manual/en/language.basic-syntax.phptags.php">tag</a></li>
                                    <li><a class="dropdown-item" href="https://www.php.net/manual/en/language.variables.basics.php">var</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Clients</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="https://www.php.net/manual/en/langref.php">la doc</a></li>
                                    <li><a class="dropdown-item" href="https://www.php.net/manual/en/language.basic-syntax.phptags.php">tag</a></li>
                                    <li><a class="dropdown-item" href="https://www.php.net/manual/en/language.variables.basics.php">var</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Innovations</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="https://www.php.net/manual/en/langref.php">la doc</a></li>
                                    <li><a class="dropdown-item" href="https://www.php.net/manual/en/language.basic-syntax.phptags.php">tag</a></li>
                                    <li><a class="dropdown-item" href="https://www.php.net/manual/en/language.variables.basics.php">var</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Se connecter</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="https://www.php.net/manual/en/langref.php">la doc</a></li>
                                    <li><a class="dropdown-item" href="https://www.php.net/manual/en/language.basic-syntax.phptags.php">tag</a></li>
                                    <li><a class="dropdown-item" href="https://www.php.net/manual/en/language.variables.basics.php">var</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav> 
        </div>


    </body>
</html>