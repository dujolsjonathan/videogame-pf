<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact</title>
</head>
<body>

    <div id="top"></div>

    <!-- la fonction route() génère les urls en fonction du "name" des routes -->
    <a href="<?= route('toto-page', ['id' => 333]) ?>">Lien vers toto</a>
    <a href="<?= route('contact') ?>#top">Contact</a>
    <h1>Contact !</h1>
    <!-- lien externe : on fait comme d'habitude -->
    <a href="https://google.fr">Google</a>
</body>
</html>