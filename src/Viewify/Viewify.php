<?php

namespace Nicklas\Viewify;

class Viewify
{
    public function add($data)
    {
        // if multiple views create indexes for them
        if (is_array($data[0])) {
            return array_map(function ($val) use ($data) {
                return ["view" => $val, "content" => $data[1], "region" => $data[2]];
            }, $data[0]);
        }
        // if multiple content (multideminsional) create indexes for them
        if (array_key_exists(0, $data[1])) {
            return array_map(function ($val) use ($data) {
                return ["view" => $data[0], "content" => $val, "region" => $data[2]];
            }, $data[1]);
        }
        return [["view" => $data[0], "content" => $data[1], "region" => $data[2]]];
    }

    public function setArray($array, $key)
    {
        return array_map(function ($val) use ($key) {
            return ["$key" => "$val"];
        }, $array);
    }

    /**
     * Render a standard web page using a specific layout.
     */
    public function render($views, $app)
    {
        foreach ($views as $views) {
            foreach ($this->add($views) as $view) {
                // print_r($view["content"]);
                $app->view->add($view["view"], $view["content"], $view["region"]);
            }
        }
    }
}
