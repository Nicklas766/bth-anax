<?php

namespace Nicklas\Comment;

use \Anax\DI\InjectionAwareInterface;
use \Anax\DI\InjectionAwareTrait;
use \PDO;

/**
 * Comment data.
 */
class Connect implements InjectionAwareInterface
{
    use InjectionAwareTrait;

    protected $db;



    /**
    * Constructor
    */
    public function __construct()
    {
        // local development
        $databaseConfig = [
            "dsn"      => "mysql:host=blu-ray.student.bth.se;dbname=nien16",
            "login"    => "nien16",
            "password" => "J9c84xWzsF5o",
            "options"  => [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"],
        ];
        try {
            $db = new PDO(...array_values($databaseConfig));
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db = $db;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            throw new PDOException("Could not connect to database, hiding details.");
        }
    }



    /**
     * Execute sql-statement
     *
     * @param string $sql, sql-statement
     * @param array $sqlParams
     *
     * @return void
     */
    public function execute($sql, $sqlParams = null)
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($sqlParams);
    }



    /**
     * Fetch based on sql-statement
     *
     * @param string $sql, sql-statement
     * @param array $sqlParams
     *
     * @return array with fetch
     */
    public function fetch($sql, $sqlParams = null)
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($sqlParams);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * FetchAll based on sql-statement
     *
     * @param string $sql, sql-statement
     * @param array $sqlParams
     *
     * @return array with fetch
     */
    public function fetchAll($sql, $sqlParams = null)
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($sqlParams);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Returns gravatar link
     *
     * @param string $email
     *
     * @return string as gravatar link
     */
    public function gravatar($email)
    {
        return "https://www.gravatar.com/avatar/" . md5(strtolower(trim($email))) . "&s=" . 40;
    }

    /**
     * Return markdown based on string
     *
     * @param string $content unparsed markdown
     *
     * @return string as parsed markdown
     */
    public function getMD($content)
    {
        return $this->di->get('textfilter')->parse($content, ["yamlfrontmatter", "shortcode", "markdown", "titlefromheader"])->text;
    }
}
