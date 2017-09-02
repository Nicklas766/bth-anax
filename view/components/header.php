<div class='header-default'>
        <div class="header wrapper" id="wrap-header">
            <div class='logo-header'>
                 <a href="<?= $app->url->create('') ?>">Nicklas Envall</a>
            </div>

             <!-- Navbar for header -->
            <div class='navbar-header'>
                <a href="<?= $app->link('') ?>">Home</a>
                <a href="<?= $app->link('about') ?>">Om mig</a>
                <a href="<?= $app->link('report') ?>">Report</a>

                <!-- logic only for being able to show correct -->
                <?php if ($app->session->has('user')) : ?>
                    <a class="login-button" href="<?= $app->link('user/profile') ?>">Profil</a>
                <?php endif; ?>
                <?php if (!$app->session->has('user')) : ?>
                    <a class="login-button" href="<?= $app->link('user/login') ?>">Login</a>
                <?php endif; ?>

            </div>

             <!-- Hamburger for header -->
            <div class="hamburger-header">
                <!-- hamburger -->
              <div class="hamburgerbtn" id="burger">
                  <div class="bar1"></div>
                  <div class="bar2"></div>
                  <div class="bar3"></div>
              </div>
          </div>

        </div>
    </div>
