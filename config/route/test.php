<?php

$app->router->add("", function () use ($app) {
    $app->renderPage([
        "views" => [
            [["page/home/greeting", "page/home/content", "page/home/content2"], [], "main"],
        ],
        "title" => "Home"
    ]);
});

$app->router->add("about", function () use ($app) {
    $app->renderPage([
        "views" => [
            ["components/report", ["content" => $app->getMD("about")], "text"],
            ["reportWrapper", ["title" => "Om mig"], "main"],
        ],
        "title" => "Om mig"
    ]);
});

$app->router->add("aboutPage", function () use ($app) {
    $app->renderPage([
        "views" => [
            ["components/report", ["content" => $app->getMD("aboutPage")], "text"],
            ["reportWrapper", ["title" => "Hur är denna hemsida skapad?"], "main"]
        ],
        "title" => "Om sidan"
    ]);
});

$app->router->add("report/**", function () use ($app) {
    // Get all after report/
    $path = substr($app->request->getRoute(), 7);
    $filenames = ["kmom01", "kmom02", "kmom03", "kmom04", "kmom05", "kmom06", "kmom10"];
    $title = "Mina redovisningar";
    if ($path != "") {
        $files = ["content" => $app->getMD("report/$path"), "background" => "none"];
        $title = "Redovisning för $path";
    }

    if ($path == "") {
        // These filenames will be rendered as markdown as default
        $files = array_map(function ($v) use ($app) {
            return ["content" => $app->getMD("report/$v"), "background" => "#009CE6", "color" => "white"];
        }, $filenames);
    }
    $link = array_map(function ($v) use ($app) {
        return ["link" => "report/$v"];
    }, $filenames);

    $app->renderPage([
        "views" => [
            ["sidebar", $link, "sidebar"],
            ["components/report", $files, "text"],
            ["reportWrapper", ["title" => "$title"], "main"]
        ],
        "title" => "Report"
    ]);
});


$app->router->add("test", function () use ($app) {

    $app->renderPage([
        "title" => "Info",
        "pages" => "page/home/greeting, page/home/content, page/home/content2",
    ]);
});
