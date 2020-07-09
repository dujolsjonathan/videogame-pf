<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">

    <title>Jeux vidéo</title>
</head>

<body>
    <main class="container">
        <div class="jumbotron">
            <h1 class="display-4">Mes jeux vidéo</h1>
            <p class="lead">Voici une petite interface toute simple (grâce à bootstrap) permettant de visualiser les
                jeux vidéo de ma base de données, mais aussi de les ajouter !</p>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="nav-link" href="<?= route('home') ?>" title="Retour à l'accueil">Accueil</a>
            <a class="nav-link" href="<?= route('admin') ?>" title="Ajouter un jeu">Admin</a>

            <?php if($connectedUser): ?>
                <a class="nav-link" href="<?= route('signout') ?>" title="Déconnexion">Déconnexion (<?= $connectedUser->email ?>)</a>
            <?php else: ?>
                <a class="nav-link" href="<?= route('signup') ?>" title="Créer mon compte">Inscription</a>
                <a class="nav-link" href="<?= route('signin') ?>" title="Me connecter à mon compte">Connexion</a>
            <?php endif; ?>
        </nav>