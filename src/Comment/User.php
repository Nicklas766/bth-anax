<?php

namespace Nicklas\Comment;

use \PDO;

/**
 * User module
 */
class User extends Connect
{


    public $table = "ramverk1_users"; # user table here



    /**
     * Control if user exists, then add user or nothing
     *
     * @param array $posts
     *
     * @return void
     */
    public function createUser($posts, $authority = "user")
    {
        $cryptPass = password_hash($posts["pass"], PASSWORD_DEFAULT); # hash password
        $name = $posts["name"];
        // $user_pass != $re_user_pass; # control pass here

        if (strpos($name, '%') !== false) {
            return;
        }

        // if user doesnt exists continue
        if (!$this->userExists($name)) {
            $validPosts = [$name, $posts["email"], $cryptPass, $authority];
            $this->execute("INSERT INTO $this->table (name, email, pass, authority) VALUES (?, ?, ?, ?)", $validPosts);
        }
    }



    /**
     * Updates users e-mail
     *
     * @param string $email
     *
     * @return void
     */
    public function editProfile($email)
    {
        $name = $this->di->get('session')->get("user");
        $this->execute("UPDATE $this->table SET email = ? WHERE name = ?", [$email, $name]);
    }



    /**
     * Updates user as admin
     *
     * @param array $posts
     *
     * @return void
     */
    public function updateProfile($posts)
    {
        $this->execute("UPDATE $this->table SET email = ?, authority = ? WHERE name = ?", $posts);
    }



    /**
     * DELETES the user based on name
     *
     * @param string $name
     *
     * @return void
     */
    public function deleteProfile($name)
    {
        $this->execute("DELETE FROM $this->table WHERE name = :name", ["name" => $name]);
    }



    /**
     * Login user by setting user in session.
     *
     * @param array $posts
     *
     * @return void
     */
    public function login($posts)
    {
        $pass = $posts["pass"];
        $name = $posts["name"];

        // Check if username exists
        if ($this->userExists($name)) {
            $hash = $this->fetch("SELECT pass FROM $this->table WHERE name = :name", ["name" => $name])["pass"];

            if (password_verify($pass, $hash)) {
                $this->di->get('session')->set("user", $name);
                return;
            }
        }
        $this->di->get('session')->set("user", null);
    }


    /**
     * Check if user exists
     *
     * @param string $email
     *
     * @return boolean true if user exists in database else false
     */
    public function userExists($name)
    {
        $user = $this->fetch("SELECT name FROM $this->table WHERE name = :name", ["name" => $name]);
        return !$user ? false : true;
    }



    /**
     * Check if user is admin
     *
     * @param string $name
     *
     * @return boolean true if user is admin else false
     */
    public function isUserAdmin($name)
    {
        $authority = $this->fetch("SELECT * FROM $this->table WHERE name = :name", ["name" => $name])["authority"];
        return $authority == "admin" ? true : false;
    }



    /**
     * Get all the users
     *
     * @return Multidimensional Array with the users
     */
    public function getUsers()
    {
        $users = $this->fetchAll("SELECT * FROM $this->table");
        foreach ($users as $k => $user) {
            $users[$k]["img"] = $this->gravatar($user["email"]);
        }
        return $users;
    }



    /**
     * Get certain user based on username
     *
     * @param string $userName
     *
     * @return array with the user
     */
    public function getUser($userName = null)
    {
        !$userName && $userName = $this->di->get('session')->get("user");
        $user = $this->fetch("SELECT * FROM $this->table WHERE name = :name", ["name" => $userName]);
        $user["img"] = $this->gravatar($user["email"]);
        return $user;
    }
}
