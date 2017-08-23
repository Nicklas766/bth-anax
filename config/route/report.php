<?php

/** Renderpage for report. */
$report = function ($content, $header = "Mina redovisningar") use ($app) {
    $files = ["report/kmom01", "report/kmom02", "report/kmom03", "report/kmom04", "report/kmom05", "report/kmom06", "report/kmom10"]; # sidebar
    $app->renderPage([
        "views" => [
            ["sidebar", $app->viewify->setArray($files, "link"), "sidebar"],
            ["components/report", $content, "text"],
            ["reportWrapper", ["header" => "$header"], "main"]
        ],
        "title" => "Report"
    ]);
};
/** Get get all markdown files */
$app->router->add("report", function () use ($app, $report) {
    $files = ["kmom01", "kmom02", "kmom03", "kmom04", "kmom05", "kmom06", "kmom10"]; # default .md files to read

    $content = array_map(function ($v) use ($app) {
        return ["content" => $app->getMD("report/$v"), "background" => "#009CE6", "color" => "white"];
    }, $files);

    $report($content);
});
/** Get one markdown file from the dataset. */
$app->router->add("report/{dataset:alphanum}", function ($dataset) use ($app, $report) {
    $content = ["content" => $app->getMD("report/$dataset"), "background" => "none"];
    $header = "Redovisning för $dataset";
    $report($content, $header);
});
