
<div class='wrapper' style="background:#F0F0F0;">
    <div class="featured-widget" style="color:#009CE6; margin-bottom: 24px">

        <h1> Skapa en kommentar </h1>
        <div class='login-widget'>
            <form action="<?=$app->link('comment/create')?>" method="post">
                 <textarea style="border:1px solid;" type="text" placeholder="comment" name="comment"></textarea>
                 <button type="submit">Skicka</button>
            </form>
        </div>

        <div style="width:100%; margin-bottom:200px;" />
    </div>
</div>
