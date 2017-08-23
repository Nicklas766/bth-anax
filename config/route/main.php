<?php

$app->router->add("", function () use ($app) {
    $app->renderPage([
        "views" => [
            [["page/home/greeting", "page/home/content", "page/home/content2"], [], "main"],
        ],
        "title" => "Home"
    ]);
});


$app->router->add("comment/edit/{id:digit}", function ($id) use ($app) {
    $app->renderPage([
        "views" => [
            ["comment/editComment", ["comment" => $app->comment->getComment($id)], "main"]
        ],
        "title" => "Edit Comment #$id"
    ]);
});

$app->router->add("comments", function () use ($app) {
    $app->renderPage([
        "views" => [
            ["comment/commentField", ["comments" => $app->comment->getComments()], "main"],
            ["comment/makeComment", [], "main"],
        ],
        "title" => "Comments"
    ]);
});

$app->router->post("comment", [$app->commentController, "postComment"]);
$app->router->post("comment/update", [$app->commentController, "updateComment"]);
$app->router->get("comment/delete", [$app->commentController, "deleteComment"]);

// $app->router->add("comments", [$app->comment, "anyPrepare"]);

// $app->router->get("remserver/api/init", [$app->remController, "anyInit"]);
//
// /** Destroy the session. */
// $app->router->get("remserver/api/destroy", [$app->remController, "anyDestroy"]);
//
// /** Get the dataset or parts of it. */
// $app->router->get("remserver/api/{dataset:alphanum}", [$app->remController, "getDataset"]);
//
// /** Get one item from the dataset. */
// $app->router->get("remserver/api/{dataset:alphanum}/{id:digit}", [$app->remController, "getItem"]);



$app->router->add("test", function () use ($app) {
    $app->renderPage([
        "title" => "Info",
        "pages" => "page/home/greeting, page/home/content, page/home/content2",
    ]);
});
