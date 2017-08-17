<?php

namespace Nicklas\Viewify;

class Viewify
{
    public function add($data)
    {
        // if multiple views create indexes for them
        if (is_array($data[0])) {
            return array_map(function ($value) use ($data) {
                return ["view" => $value, "content" => $data[1], "region" => $data[2]];
            }, $data[0]);
        }
        // if multiple content create indexes for them
        if (is_array($data[1]) && count($data[1]) > 2) {
            return array_map(function ($value) use ($data) {
                return ["view" => $data[0], "content" => $value, "region" => $data[2]];
            }, $data[1]);
        }
        return [["view" => $data[0], "content" => $data[1], "region" => $data[2]]];
    }

    /**
     * Render a standard web page using a specific layout.
     */
    public function render($views, $app)
    {
        foreach ($views as $views) {
            foreach ($this->add($views) as $view) {
                $app->view->add($view["view"], $view["content"], $view["region"]);
            }
        }
    }
}
