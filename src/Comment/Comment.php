<?php

namespace Nicklas\Comment;

use \Anax\Configure\ConfigureInterface;
use \Anax\Configure\ConfigureTrait;
use \PDO;

/**
 * Comment data.
 */
class Comment implements ConfigureInterface
{
    use ConfigureTrait;

    protected $db;

    public $table = "ramverk1_comment"; # table name goes here
    // public $tableRows; # table columns

    /**
    * Constructor
    */
    public function __construct()
    {

        // Studentserver
        $databaseConfig = [
            "dsn"      => "mysql:host=xxx;dbname=xxx",
            "login"    => "xxx",
            "password" => "xxx",
            "options"  => [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"],
        ];
        // // local development
        // $databaseConfig = [
        //     "dsn"      => "mysql:host=localhost;dbname=commentify",
        //     "login"    => "user",
        //     "password" => "pass",
        //     "options"  => [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"],
        // ];
        try {
            $db = new PDO(...array_values($databaseConfig));
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db = $db;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            throw new PDOException("Could not connect to database, hiding details.");
        }
        // $this->tableRows = $this->fetchArray("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='$this->table'");
        // get POSTs based on tablerow names
    }

    // Insert post into comments
    public function postComment($posts)
    {
        $this->execute("INSERT INTO $this->table (email, comment) VALUES (?, ?)", $posts);
    }

    // delete comment based on id
    public function deleteComment($id)
    {
        $this->execute("DELETE FROM $this->table WHERE id = :id", ["id" => $id]);
    }

    // update based on id
    public function updateComment($posts)
    {
        $this->execute("UPDATE $this->table SET email = ?, comment = ? WHERE id = ?", $posts);
    }

    public function execute($sql, $sqlParams = null)
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($sqlParams);
    }

    // returns all comments
    public function getComments()
    {
        $stmt = $this->db->prepare("SELECT * FROM $this->table");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $k => $comment) {
            $data[$k]["img"] = "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment["email"]))) . "&s=" . 40;
            $data[$k]["markdown"] = $this->textfilter->parse($comment["comment"], ["yamlfrontmatter", "shortcode", "markdown", "titlefromheader"])->text;
        }
        return $data;
    }

    // update based on id
    public function getComment($id)
    {
        //fetch
        $stmt = $this->db->prepare("SELECT * FROM $this->table WHERE id = :id");
        $stmt->execute(["id" => $id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        // parse
        $data["markdown"] = $this->textfilter->parse($data["comment"], ["yamlfrontmatter", "shortcode", "markdown", "titlefromheader"])->text;
        return $data;
    }

    // get res with one fetch
    public function fetchArray($sql)
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
}
