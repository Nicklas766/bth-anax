<div class="login-wrapper" style="background-image: url('<?= $app->link("img/typing.jpg")?>');">
    <div class="login-widget">
        <h3> Skapa ditt konto </h3>
        <form action="<?= $app->link('user/create') ?>" method="POST">
            <input placeholder="Användarnamn" type="text" name="name" required>
            <input placeholder="Mejladress" type="text" name="email">
            <input placeholder="Lösenord" type="password" name="pass" required>
            <!-- <input placeholder="Repeat password" type="password" name="repeat-pass"> -->

            <button type="submit">Skapa konto</button>
        </form>
        <a href="<?= $app->link('user/login')?>"> Logga in </a>
    </div>
</div>
