<div class='wrapper' style="background:#F0F0F0; min-height:900px;">
    <div class="featured-widget" style="color:#009CE6; margin-bottom: -50px;">
        <h1> Redigera din kommentar #<?= $comment["id"] ?> </h1>
    </div>

    <div class="comment">
        <div>
            <?= $comment["markdown"] ?>
        </div>
    </div>

    <div class='login-widget'>
        <form action="<?=$app->link("comment/update/$comment[id]")?>" method="post">
            <textarea type="text" placeholder="comment" name="comment"><?= $comment["comment"] ?></textarea>
            <button type="submit">Ändra</button>
        </form>
        <a href='<?=$app->link("comment/delete/$comment[id]")?>'> Radera #<?= $comment["id"] ?> </a>
    </div>
</div>
