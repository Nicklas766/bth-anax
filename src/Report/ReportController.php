<?php

namespace Nicklas\Report;

use \Anax\DI\InjectionAwareInterface;
use \Anax\DI\InjectionAwareTrait;

/**
 * A sample class for routes dealing with error situations.
 */
class ReportController implements InjectionAwareInterface
{
    use InjectionAwareTrait;


    public function getMD($file)
    {
        $content = file_get_contents(ANAX_INSTALL_PATH . "/content/report/$file.md");
        return $this->di->get("textfilter")->parse($content, ["yamlfrontmatter", "shortcode", "markdown", "titlefromheader"])->text;
    }
    /**
     * Render all report pages or one, with header.
     *
     * @param array  $content    which contents to use [content => "hello", content2 => "hello2"]
     * @param string  $header  to display in the view.
     *
     * @return void
     */
    public function renderPage($content, $header = "Mina redovisningar")
    {
        $files = ["report/kmom01", "report/kmom02", "report/kmom03", "report/kmom04", "report/kmom05", "report/kmom06", "report/kmom10"]; # sidebar
        $this->di->get("pageRender")->renderPage([
            "views" => [
                ["sidebar", $this->di->get("pageRender")->setArray($files, "link"), "sidebar"],
                ["components/report", $content, "text"],
                ["reportWrapper", ["header" => "$header"], "main"]
            ],
            "title" => "Report"
        ]);
    }

    /**
     * Get content for all reports and send to renderPage
     *
     * @return void
     */
    public function allReports()
    {
        $files = ["kmom01", "kmom02", "kmom03", "kmom04", "kmom05", "kmom06", "kmom10"]; # all reports

        $content = array_map(function ($val) {
            return ["content" => $this->getMD("$val"), "background" => "#009CE6", "color" => "white"];
        }, $files);

        $this->renderPage($content);
    }

    /**
     * Get content for one report based on dataset and send to renderPage
     *
     * @return void
     */
    public function getReport($file)
    {
        $content = ["content" => $this->getMD("$file"), "background" => "none"];
        $header = "Redovisning för $file";
        $this->renderPage($content, $header);
    }
}
