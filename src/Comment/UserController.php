<?php

namespace Nicklas\Comment;

use \Anax\DI\InjectionAwareInterface;
use \Anax\DI\InjectionAwareTrait;

/**
 * A controller for the User
 *
 */
class UserController implements InjectionAwareInterface
{
    use InjectionAwareTrait;
    public $posts;

    public function __construct()
    {
        $this->posts = array_combine(["name", "email", "pass"], array_map(function ($val) {
            return isset($_POST[$val]) ? htmlentities($_POST[$val]) : "";
        }, ["name", "email", "pass"]));
    }



    /**
     * use response and url dependencies to create rediret
     *
     * @return void
     */
    public function redirect($url)
    {
        $this->di->get("response")->redirect($this->di->get("url")->create($url));
    }



    /**
     * Render page for users
     *
     * @return void
     */
    private function renderPage($views, $title)
    {
        $this->di->get("pageRender")->renderPage([
            "views" => $views,
            "title" => "$title"
        ]);
    }



    /**
     * Render login page
     *
     * @return void
     */
    public function renderLogin()
    {
        if ($this->di->get("session")->has("user")) {
            $this->redirect("user/profile");
        }
        $views = [
            ["user/login", [], "main"]
        ];
        $this->renderPage($views, "Login");
    }



    /**
     * Render create page
     *
     * @return void
     */
    public function renderCreateUser()
    {
        $views = [
            ["user/create", [], "main"]
        ];
        $this->renderPage($views, "createUser");
    }



    /**
     * Render profile page
     *
     * @return void
     */
    public function renderProfile()
    {
        $user = $this->di->get("user")->getUser();

        $views = [
            ["user/profile/profile", ["user" => $user], "main"]
        ];

        if ($this->di->get("user")->isUserAdmin($user["name"])) {
            $views = [
                ["user/admin/navbar", [], "main"],
                ["user/profile/profile", ["user" => $user], "main"]
            ];
        }
        $this->renderPage($views, "Profile-$user[name]");
    }



    /**
     * Render edit profile page
     *
     * @return void
     */
    public function renderEditProfile()
    {
        $user = $this->di->get("user")->getUser();
        $views = [
            ["user/profile/edit", ["user" => $user], "main"]
        ];
        $this->renderPage($views, "Profile-$user[name]");
    }



    /**
     * Render fail page
     *
     * @return void
     */
    public function renderFail()
    {
        $views = [
            ["user/fail", [], "main"]
        ];
        $this->renderPage($views, "fail");
    }
}
