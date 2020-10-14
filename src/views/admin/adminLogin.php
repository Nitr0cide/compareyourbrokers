<div class="login-box">
    <h2>Login</h2>
    <form method="POST" action="<?= $router->generate("adminLogin")?>">
        <div class="user-box">
            <input type="text" name="login" required="">
            <label name="login">Utilisateur</label>
        </div>
        <div class="user-box">
            <input type="password" name="password" required="">
            <label name="password">Mot de passe</label>
        </div>
        <a href="">
            <input type="submit" value="Se connecter">
        </a>
    </form>
</div>

