<?php include("layout/header.php"); ?>

        <h1>Les jeux</h1>

        <div class="row">
            <div class="col-12">
                <a href="?order=name" class="btn btn-primary">Trier par nom</a>&nbsp;
                <a href="?order=editor" class="btn btn-info">Trier par éditeur</a>&nbsp;
                <a href="<?= route('home'); ?>" class="btn btn-dark">Annuler le tri</a><br>
                <br>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">&Eacute;diteur</th>
                            <th scope="col">Date de sortie</th>
                            <th scope="col">Console / Support</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($videogames as $videogame): ?>
                            <tr>
                                <td><?= $videogame->id ?></td>
                                <td><?= $videogame->name ?></td>
                                <td><?= $videogame->editor ?></td>
                                <td><?= $videogame->release_date ?></td>
                                <td><?= $videogame->platform->name ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    
<?php include("layout/footer.php"); ?>
