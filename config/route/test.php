<?php

$app->router->add("", function () use ($app) {
    // Add views to a specific region
    $app->renderPage([
        "title" => "Home",
        "pages" => "page/home/greeting, page/home/content, page/home/content2",
    ]);
});

$app->router->add("about", function () use ($app) {
    // Add views to a specific region
    $app->renderMarkdown(["view/page/about/text.md"]);
    $app->renderPage([
        "title" => "Om mig",
        "pages" => "",
        "markdownTitle" => "Om mig",
    ]);
});

$app->router->add("aboutPage", function () use ($app) {
    // Add views to a specific region
    $app->renderMarkdown(["view/page/aboutPage/text.md"]);
    $app->renderPage([
        "title" => "Om sidan",
        "pages" => "",
        "markdownTitle" => "Hur är denna hemsida skapad?",
    ]);
});

$app->router->add("report", function () use ($app) {
    // Add views to a specific region

    // These filenames will be rendered as markdown
    $filenames = ["kmom01.md", "kmom02.md", "kmom03.md", "kmom04.md", "kmom05.md", "kmom06.md", "kmom10.md"];

    $files = array_map(function ($v) {
        return "view/page/report/" . $v;
    }, $filenames);

    $app->renderMarkdown($files);
    $app->renderPage([
        "title" => "Report",
        "pages" => "",
        "markdownTitle" => "Mina redovisningar",
    ]);
});


$app->router->add("test", function () use ($app) {
    // Add views to a specific region
    $app->renderPage([
        "title" => "Info",
        "pages" => "page/home/greeting, page/home/content, page/home/content2",
    ]);
});
