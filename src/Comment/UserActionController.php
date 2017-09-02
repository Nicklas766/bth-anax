<?php

namespace Nicklas\Comment;

/**
 * A controller for the actions of user
 *
 */
class UserActionController extends UserController
{

    public function createUser()
    {
        $this->di->get("user")->createUser($this->posts);
        $this->login();
    }



    public function editProfile()
    {
        $this->di->get("user")->editProfile($this->posts["email"]);
        $this->redirect("user/profile");
    }



    public function checkLogin()
    {
        if (!$this->di->get("session")->has("user")) {
            $this->renderFail();
        }
    }



    public function login()
    {
        $this->di->get("user")->login($this->posts);

        if ($this->di->get("session")->has("user")) {
            $this->redirect("user/profile");
        }
        $this->redirect("user/fail");
    }



    public function logout()
    {
        $this->di->get("user")->logout();
        $this->redirect("user/login");
    }
}
