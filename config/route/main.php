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
    $files = ["report/kmom01", "report/kmom02", "report/kmom03", "report/kmom04", "report/kmom05", "report/kmom06", "report/kmom10"]; # default .md files to read
    $title = "Mina redovisningar";

    // These filenames will be rendered as markdown as default
    $content = array_map(function ($v) use ($app) {
        return ["content" => $app->getMD("$v"), "background" => "#009CE6", "color" => "white"];
    }, $files);

    if ($path != "") {
        $content = ["content" => $app->getMD("report/$path"), "background" => "none"];
        $title = "Redovisning för $path";
    }

    $app->renderPage([
        "views" => [
            ["sidebar", $app->viewify->setArray($files, "link"), "sidebar"],
            ["components/report", $content, "text"],
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
