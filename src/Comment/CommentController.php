<?php

namespace Nicklas\Comment;

use \Anax\DI\InjectionAwareInterface;
use \Anax\DI\InjectionAwareTrait;

/**
 * A controller for the Comment
 *
 */
class CommentController implements InjectionAwareInterface
{
    use InjectionAwareTrait;
    public $posts;

    public function __construct()
    {
        $this->posts = array_map(function ($val) {
            return isset($_POST[$val]) ? htmlentities($_POST[$val]) : "";
        }, ["comment"]);
    }



    /**
     * use response and url dependencies to create rediret
     *
     * @return void
     */
    private function redirect($url)
    {
        $this->di->get("response")->redirect($this->di->get("url")->create($url));
    }



    /**
     * Control if user is allowed to edit comment
     *
     * @return void
     */
    public function controlUser($id)
    {
        if (!$this->di->get("comment")->isUsersComment($id)) {
            $this->di->get("pageRender")->renderPage([
                "views" => [
                    ["user/authorityFail", [], "main"]
                ],
                "title" => "Fail comment #$id"
            ]);
        }
    }



    // Insert post into comments
    public function postComment()
    {
        $this->di->get("comment")->postComment($this->posts);
        $this->redirect("comment");
    }



    // delete comment based on id
    public function deleteComment($id)
    {
        $this->di->get("comment")->deleteComment($id);
        $this->redirect("comment");
    }



    // update based on id
    public function updateComment($id)
    {
        $this->posts[] = $id;
        $this->di->get("comment")->updateComment($this->posts);
        $this->redirect("comment/edit/$id");
    }



    /**
     * Render all comments, submit form if logged in
     *
     * @return void
     */
    public function renderComments()
    {
        $view = "comment/makeComment";
        !$this->di->get("session")->has("user") && $view = "comment/loginComment";

        $this->di->get("pageRender")->renderPage([
            "views" => [
                ["comment/commentField", ["data" => $this->di->get("comment")->getComments()], "main"],
                ["$view", [], "main"]
            ],
            "title" => "Comments"
        ]);
    }



    /**
     * Render one comment
     *
     * @return void
     */
    public function renderComment($id)
    {
        $this->di->get("pageRender")->renderPage([
            "views" => [
                ["comment/editComment", ["comment" => $this->di->get("comment")->getComment($id)], "main"]
            ],
            "title" => "Edit Comment #$id"
        ]);
    }
}
