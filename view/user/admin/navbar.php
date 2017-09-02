<!-- Navbar for header -->
<div class="wrapper" style="background: #29b942 none repeat scroll 0 0;
    border-bottom: 1px solid;
    color: white;">
    <h1>
        <span class="material-icons">build</span>
        Admin tools
        <span class="material-icons">build</span>
    </h1>
    <div class="navbar-header">
        <li class="dropdown">
          <a href="<?= $app->link('admin/users') ?>"><span class="material-icons">person</span>Users</a>
              <div class="dropdown-choices">
                <a href="<?= $app->link('admin/users') ?>"><span class="material-icons">people</span>All</a>
                <a href="<?= $app->link('admin/create') ?>"><span class="material-icons">person_add</span>Add</a>
            </div>
        </li>
        <a href="<?= $app->link('comment') ?>"><span class="material-icons">comment</span> Comments</a>
    </div>
</div>
