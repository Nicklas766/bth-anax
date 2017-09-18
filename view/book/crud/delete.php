<?php

namespace Anax\View;

/**
 * View to create a new book.
 */
// Show all incoming variables/functions
//var_dump(get_defined_functions());
//echo showEnvironment(get_defined_vars());

// Create urls for navigation
$urlToView = url("book");



?>

<div class='wrapper' style="background:#F0F0F0; min-height:900px;">
    <div class='login-widget' style="color:black; font-size:1em;">

        <h1>Delete an item</h1>

        <?= $form ?>

        <p>
            <a href="<?= $urlToView ?>">View all</a>
        </p>
    </div>
</div>
