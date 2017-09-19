<?php

namespace Nicklas\Comment2\User;

use \Nicklas\Comment2\User\HTMLForm\CreateCommentForm;
use \Nicklas\Comment2\User\HTMLForm\EditCommentForm;

/**
 * Extends the UserController, for comments
 */
class CommentController extends UserController
{




    /**
     * Show all items.
     *
     * @return void
     */
    public function getIndex()
    {
        $comment = new Comment($this->di);
        $comment->setDb($this->di->get("db"));

        $form       = new CreateCommentForm($this->di);
        $form->check();

        $views = [
            ["comment/view-all", ["comments" => $comment->getAll()], "main"],
            ["comment/makeComment", ["form" => $form->getHTML()], "main"]
        ];

        // If not logged in, render other views
        if (!$this->di->get("session")->has("user")) {
            $views = [
                ["comment/view-all", ["comments" => $comment->getAll()], "main"],
                ["comment/loginComment", [], "main"]
            ];
        }

        $this->renderPage($views, "A collection of comments");
    }

    /**
     * @param integer $id.
     *
     * @return void
     */
    public function getPostEditComment($id)
    {

        $comment = new Comment($this->di);
        $comment->setDb($this->di->get("db"));
        $comment = $comment->get($id);

        $form       = new EditCommentForm($this->di, $id);
        $form->check();


        $views = [
            ["comment/editComment", ["form" => $form->getHTML(), "comment" => $comment], "main"],
        ];

        // if it belongs to user, or user is admin ignore
        $userName = $this->di->get("session")->get("user");
        if (!$comment->controlAuthority($userName)) {
            $views = [
                ["comment/fail", [], "main"],
            ];
        }


        $this->renderPage($views, "A collection of comments");
    }
}
