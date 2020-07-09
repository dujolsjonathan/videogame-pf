<?php include(__DIR__ . "/../layout/header.php"); ?>

        <h1>Créer mon compte</h1>

        <div class="row">
            <form method="post">
                <div class="form-group">
                    <label for="email">Email</label>                      
                    <input type="email" name="email" id="email" placeholder="yo@gmail.com">
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" placeholder="Mot de passe">
                </div>
                
                <div class="form-group">
                    <label for="password_confirm">Mot de passe encore</label>
                    <input type="password" name="password_confirm" id="password_confirm" placeholder="Mot de passe">
                </div>  

                <?php if (!empty($errors)): ?>
                <ul class="text-danger">
                    <?php foreach($errors as $error): ?>
                    <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>

                <div>
                    <button class="btn btn-default">M'inscrire !</button>
                </div>
            </form>
        </div>
    
<?php include(__DIR__ . "/../layout/footer.php"); ?>
