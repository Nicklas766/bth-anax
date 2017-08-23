<div class='wrapper' style="background:rgba(0, 0, 0, 0) linear-gradient(to right, #667db6, #0082c8, #0082c8, #667db6) repeat scroll 0 0; min-height:900px;">

    <div class="login-widget">
        <p> Redigera kommentaren </p>
            <div style="background:white; font-size:16px; border-radius:0.2em; color:black;">
                <?= $comment["markdown"] ?>
            </div>

            <form action="<?=$app->link("comment/update?id=$comment[id]")?>" method="post">
                <input type="text" placeholder="email" value="<?= $comment["email"] ?>" name="email"><br>
                <textarea type="text" placeholder="comment" name="comment"><?= $comment["comment"] ?></textarea>
                <button type="submit">Ändra</button>
            </form>
            <a href='<?=$app->link("comment/delete?id=$comment[id]")?>'> Radera #<?= $comment["id"] ?> </a>
    </div>
</div>
