<?php

namespace Nicklas\Comment;

use \PDO;

/**
 * Comment  module
 */
class Comment extends User
{

    public $cTable = "ramverk1_comments"; # comment cTable here


    /**
     * Insert new comment based on session user
     *
     * @param array $posts
     *
     * @return void
     */
    public function postComment($posts)
    {
        if ($this->di->get('session')->has("user")) {
            $posts[] = $this->di->get('session')->get("user");
            $this->execute("INSERT INTO $this->cTable (comment, user_name) VALUES (?, ?)", $posts);
        }
    }



    /**
     * Deletes comment
     *
     * @param int $id
     *
     * @return void
     */
    public function deleteComment($id)
    {
        $this->execute("DELETE FROM $this->cTable WHERE id = :id", ["id" => $id]);
    }



    /**
     * Updates comment with certain order
     *
     * @param array $posts
     *
     * @return void
     */
    public function updateComment($posts)
    {
        $this->execute("UPDATE $this->cTable SET comment = ? WHERE id = ?", $posts);
    }



    /**
     * Check if comment belongs to user
     *
     * @param int $id
     *
     * @return boolean true if comment made by user, else false
     */
    public function isUsersComment($id)
    {
        $userName = $this->di->get('session')->get("user");

        if ($this->isUserAdmin($userName)) {
            return true;
        }

        $comment = $this->fetch("SELECT * FROM $this->cTable WHERE user_name = :name AND id = :id", ["name" => $userName, "id" => $id]);
        return !$comment ? false : true;
    }



    /**
     * Get all comments from Database
     *
     * @return array with all comments
     */
    public function getComments()
    {
        $data = $this->fetchAll("SELECT * FROM $this->cTable");
        foreach ($data as $k => $comment) {
            $user = $this->getUser($comment["user_name"]);
            $data[$k]["img"] = $this->gravatar($user["email"]);
            $data[$k]["markdown"] = $this->getMD($comment["comment"]);
        }
        $user = $this->di->get('session')->get("user");
        return ["comments" => $data, "user" => $user];
    }



    /**
     * Get one comment from the database
     *
     * @param int $id for which comment
     *
     * @return array with the comment
     */
    public function getComment($id)
    {
        $comment = $this->fetch("SELECT * FROM $this->cTable WHERE id = :id", ["id" => $id]);
        $comment["markdown"] = $this->getMD($comment["comment"]);
        return $comment;
    }
}
