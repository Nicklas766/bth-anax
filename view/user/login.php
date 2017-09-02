<div class="login-wrapper" style="background-image: url('<?= $app->link("img/typing.jpg")?>');">
    <div class="login-widget">
        <h3> Välkommen! </h3>
        <form action="" method="POST">
            <input placeholder="Användarnamn" type="text" name="name" required>
            <input placeholder="Lösenord" type="password" name="pass" required>

            <button type="submit" name="submitForm">Login</button>
        </form>
        <a href="<?= $app->link('user/create')?>"> Skapa konto </a>
    </div>
</div>
