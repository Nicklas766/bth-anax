<?php

namespace Nicklas\Comment2\User;

use \Anax\Database\ActiveRecordModel;
use \Nicklas\Comment2\User\User;

/**
 * A database driven model.
 */
class Comment extends ActiveRecordModel
{
    use ParserTrait;

    /**
     * Constructor injects with DI container.
     *
     */
    public function __construct($di = null)
    {
        $this->di = $di;
    }

        /**
     * @var string $tableName name of the database table.
     */
    protected $tableName = "ramverk1_comments";

    /**
     * Columns in the table.
     *
     * @var integer $id primary key auto incremented.
     */
    public $id;
    public $user;
    public $comment;



    /**
     * Get all comments
     *
     *
     * @return array
     */
    public function getAll()
    {
        $comments = $this->findAll();

        return array_map(function ($comment) {
            $user = new User();
            $user->setDb($this->di->get("db"));
            $user->find("name", $comment->user);

            $comment->img = $this->gravatar($user->email);
            $comment->markdown = $this->di->get("textfilter")->parse($comment->comment, ["yamlfrontmatter", "shortcode", "markdown", "titlefromheader"])->text;

            return $comment;
        }, $comments);
    }

    /**
     * Get comment
     *
     *
     * @return array
     */
    public function get($id)
    {
        $comment = $this->find("id", $id);
        $comment->markdown = $this->di->get("textfilter")->parse($comment->comment, ["yamlfrontmatter", "shortcode", "markdown", "titlefromheader"])->text;
        return $comment;
    }

    /**
     * Check if a comment belongs to user
     *
     *
     * @return array
     */
    public function controlAuthority($name)
    {
        $user = new User();
        $user->setDb($this->di->get("db"));
        $user->find("name", $name);

        // IF AUTHORITY == admin, then continue
        if ($user->authority != "admin") {
            return ($user->name == $this->user);
        }
        return true;
    }
}
