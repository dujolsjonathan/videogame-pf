 <?php include("layout/header.php"); ?>

        <h1>Ajouter un jeu</h1>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Ajout</div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="editor">&Eacute;diteur</label>
                                <input type="text" class="form-control" name="editor" id="editor" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="release_date">Date de sortie</label>
                                <input type="text" class="form-control" name="release_date" id="release_date"
                                    placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="platform">Console / Support</label>
                                <select class="custom-select" id="platform" name="platform">
                                    <option>-</option>
                                    <?php foreach($platforms as $platform): ?>
                                        <option value="<?= $platform->id ?>"><?= $platform->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <?php // si on a des erreurs de validation... ?>
                            <?php if (!empty($errorsList)): ?>
                                <ul class="text-danger">
                                <?php foreach($errorsList as $error): ?>
                                    <li><?= $error; ?></li>
                                <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>

                            <button type="submit" class="btn btn-success btn-block">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<?php include("layout/footer.php"); ?>
