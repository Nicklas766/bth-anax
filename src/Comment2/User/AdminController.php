<?php

namespace Nicklas\Comment2\User;

/**
 * A controller class.
 */
class AdminController extends UserController
{


    /**
     * check if user is logged in
     *
     * @return void
     */
    public function checkIsAdmin()
    {
        if (!$this->di->get("session")->has("user")) {
            $views = [
                ["user/fail", [], "main"]
            ];
            $this->renderPage($views, "Not logged in");
        }
    }


    /**
     * Description.
     *
     * @param datatype $variable Description
     *
     * @throws Exception
     *
     * @return void
     */
    public function getPostCreateUser()
    {
        $form       = new CreateUserForm($this->di);
        $form->check();

        $views = [
            ["user/create", ["form" => $form->getHTML()], "main"]
        ];

        $this->renderPage($views, "Create a user");
    }
}
