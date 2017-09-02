<div class='wrapper' style="background:#F0F0F0;">
    <div class="featured-widget" style="color:#009CE6; margin-bottom: 24px;">
        <h1> Kommentarer </h1>
    </div>

    <div class='wrapper' style="color:black; width:50%; margin:auto; padding:15px; ">
        <?php foreach ($data["comments"] as $comment) : ?>
            <div class="comment">

                <!-- avatar image -->
                <div style="width:10%">
                    <img src="<?= $comment["img"] ?>" style="height:100px; width:100%;">
                </div>

                <!-- Information and comment -->
                <div style="width:80%; margin-left:2.5%; font-size:16px;">
                    <li><?= $comment["user_name"] ?>:</li>
                    <a href='<?=$app->link("comment/edit/$comment[id]")?>'> #<?= $comment["id"] ?> </a>
                    <?= $comment["markdown"] ?></li>

                    <!-- if user show delete -->
                    <?php if ($data["user"] == $comment["user_name"]) : ?>
                        <a href='<?=$app->link("comment/delete/$comment[id]")?>' class="popclose">X</a>
                    <?php endif; ?>
                </div>

            </div>
        <?php endforeach; ?>
    </div>
</div>
