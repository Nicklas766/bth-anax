<div class='profile-wrapper'>

    <div class="avatar-widget">
        <div class="avatar-header">
            <i class="material-icons">person</i> <?= $user["authority"] ?>
        </div>
        
        <div class="avatar">
            <img src="<?= $user["img"] ?>">
        </div>

        <div class="avatar-info">
            <form class="login-widget" action="<?=$app->link("user/profile/edit")?>" method="post">
                <input type="text" placeholder="email" value="<?= $user["email"] ?>" name="email">
                <button type="submit">Save</button>
                <button href="<?= $app->link("user/profile") ?>">Back</button>
            </form>
        </div>
    </div>
</div>
