<?php

namespace Anax\View;

/**
 * View to display all books.
 */
// Show all incoming variables/functions
//var_dump(get_defined_functions());
//echo showEnvironment(get_defined_vars());

// Gather incoming variables and use default values if not set
$items = isset($items) ? $items : null;

// Create urls for navigation
$urlToCreate = url("book/create");
$urlToDelete = url("book/delete");
?>
<div class='wrapper' style="background:#F0F0F0; min-height:900px;">
    <div class='featured-widget' style="color:black;">

    <h1>View all items</h1>

    <p>
        <a href="<?= $urlToCreate ?>">Create</a> |
        <a href="<?= $urlToDelete ?>">Delete</a>
    </p>

    <?php if (!$items) : ?>
        <p>There are no items to show.</p>
    </div>
</div>
<?php
    return;
endif;
?>

    <table style="margin:auto;">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Author</th>
            <th>Img</th>
        </tr>
        <?php foreach ($items as $item) : ?>
        <tr>
            <td>
                <a href="<?= url("book/update/{$item->id}"); ?>"><?= $item->id ?></a>
            </td>
            <td><?= $item->title ?></td>
            <td><?= $item->author ?></td>
            <td><img src="<?= $item->img ?>" style="height:100px"></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</div>
