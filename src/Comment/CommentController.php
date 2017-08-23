<?php

namespace Nicklas\Comment;

use \Anax\Common\AppInjectableInterface;
use \Anax\Common\AppInjectableTrait;

/**
 * A controller for the REM Server.
 *
 * @SuppressWarnings(PHPMD.ExitExpression)
 */
class CommentController implements AppInjectableInterface
{
    use AppInjectableTrait;
    public $posts;
    public $gets;

    public function __construct()
    {
        $this->posts = array_map(function ($val) {
            return isset($_POST[$val]) ? htmlentities($_POST[$val]) : "";
        }, ["email", "comment"]);
    }

    // Insert post into comments
    public function postComment()
    {
        $this->app->comment->postComment($this->posts);
        $this->app->redirect("comments");
    }

    // delete comment based on id
    public function deleteComment()
    {
        $id = $_GET["id"];
        $this->app->comment->deleteComment($id);
        $this->app->redirect("comments");
    }

    // update based on id
    public function updateComment()
    {
        $this->posts[] = $_GET["id"];
        $this->app->comment->updateComment($this->posts);
        $this->app->redirect("comment/edit/$_GET[id]");
    }
}
