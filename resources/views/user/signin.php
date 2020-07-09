<?php include(__DIR__ . "/../layout/header.php"); ?>

        <h1>Me connecter</h1>

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

                <?php if(isset($isValid) && $isValid === false): ?>
                <div class="text-danger">Mauvais identifiants</div>
                <?php endif; ?>

                <div>
                    <button class="btn btn-default">Me connecter !</button>
                </div>
            </form>
        </div>
    
<?php include(__DIR__ . "/../layout/footer.php"); ?>
