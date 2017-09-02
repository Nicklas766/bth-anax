<?php

namespace Nicklas\Comment;

/**
 * A controller for the Admin actions
 *
 */
class AdminController extends UserController
{

    /**
     * Control if user is admin
     *
     * @return void
     */
    public function controlAdmin()
    {
        $user = $this->di->get("session")->get("user");
        if (!$this->di->get("user")->isUserAdmin($user)) {
            $this->di->get("pageRender")->renderPage([
                "views" => [
                    ["user/authorityFail", [], "main"]
                ],
                "title" => "Authority Declined"
            ]);
        }
    }



    public function updateProfile($name)
    {
        $authority = htmlentities($_POST["authority"]);
        $this->di->get("user")->updateProfile([$this->posts["email"], $authority, $name]);
        $this->redirect("admin/users/$name");
    }



    public function createUser()
    {
        $authority = htmlentities($_POST["authority"]);
        $this->di->get("user")->createUser($this->posts, $authority);
        $this->redirect("admin/users/" . $this->posts["name"]);
    }



    public function deleteUser($name)
    {
        $this->di->get("user")->deleteProfile($name);
        $this->redirect("admin/users");
    }



    /**
     * Render page for users
     *
     * @return void
     */
    public function renderPage($view, $title)
    {
        $this->di->get("pageRender")->renderPage([
            "views" => [
                ["user/admin/navbar", [], "main"],
                $view
            ],
            "title" => "$title"
        ]);
    }



    /**
     * Render edit users page
     *
     * @return void
     */
    public function renderUsersPage()
    {
        $users = $this->di->get("user")->getUsers();
        $view = ["user/admin/users", ["users" => $users], "main"];

        $this->renderPage($view, "Admin | Users");
    }



    /**
     * Render user for edit page
     *
     * @return void
     */
    public function renderUserPage($name)
    {
        $user = $this->di->get("user")->getUser($name);
        $view = ["user/admin/user", ["user" => $user], "main"];
        $this->renderPage($view, "Admin | Users");
    }



    /**
     * Render user for edit page
     *
     * @return void
     */
    public function renderCreatePage()
    {
        $view = ["user/admin/create", [], "main"];
        $this->renderPage($view, "Admin | UserCreate");
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
