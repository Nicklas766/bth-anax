


<div class='wrapper' style="background:#F0F0F0;">
    <div class="featured-widget" style="color:#009CE6; margin-bottom: 24px">
        <h1> <?= $header ?> </h1>
    </div>

    <?php if ($this->regionHasContent("sidebar")) : ?>

            <div style="width:15%; margin-left: 5%; margin-right:5%;">
                <?php $this->renderRegion("sidebar") ?>
            </div>
            <div class="wrapper" style="width:50%; margin:0 0 24px;">
                <?php $this->renderRegion("text") ?>
            </div>

    <?php endif; ?>

    <?php if (!$this->regionHasContent("sidebar")) : ?>
        <div class="wrapper" style="width:50%; margin:0 auto 24px;">
            <?php $this->renderRegion("text") ?>
        </div>
    <?php endif; ?>


        <div style="width:100%; margin-bottom:400px;" />
    </div>
</div>
