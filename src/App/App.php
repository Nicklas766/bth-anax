<?php

namespace Anax\App;

/**
 * An App class to wrap the resources of the framework.
 *
 * @SuppressWarnings(PHPMD.ExitExpression)
 */
class App
{
    public function redirect($url)
    {
        $this->response->redirect($this->url->create($url));
        exit;
    }

    public function link($url)
    {
        return $this->url->create($url);
    }

    public function renderMarkdown($files)
    {
        // read and add files
        foreach ($files as $file) {
            // Get content from markdown file
            $content = file_get_contents(ANAX_INSTALL_PATH . "/$file");
            $content = $this->textfilter->parse($content, ["yamlfrontmatter", "shortcode", "markdown", "titlefromheader"]);

            $this->view->add("components/report", ["content" => $content->text], "markdown");
        }
    }
    /**
     * Render a standard web page using a specific layout.
     */
    public function renderPage($data, $status = 200)
    {
        $data["stylesheets"] = ["css/style.css"];
        $data["javascripts"] = ["js/index.js"];

        // Make an array of the comma separated string $page
        if (!is_array($data["pages"])) {
            $pages = strtolower($data["pages"]);
            $pages = preg_replace('/\s/', '', explode(',', $pages));
        }
        $this->view->add("components/header", [], "header");
        $this->view->add("components/footer", [], "footer");

        // the pages sent in
        foreach ($pages as $value) {
            $this->view->add("$value", [], "main");
        }

        // Add layout, render it, add to response and send.
        $this->view->add("wrappedApp", $data, "wrappedApp");
        $body = $this->view->renderBuffered("wrappedApp");
        $this->response->setBody($body)
                       ->send($status);
        exit;
    }
}
