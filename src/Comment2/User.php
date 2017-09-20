<?php

namespace Nicklas\Comment2;

/**
 * A database driven model.
 */
class User extends ActiveRecordModelExtender
{

        /**
     * @var string $tableName name of the database table.
     */
    protected $tableName = "ramverk1_users";

    /**
     * Columns in the table.
     *
     * @var integer $id primary key auto incremented.
     */
    public $id;
    public $name;
    public $email;
    public $pass;
    public $authority = "user";


    /**
     * Check if user exists
     *
     * @param string $name
     *
     * @return boolean true if user exists in database else false
     */
    public function userExists($name)
    {
        $user = $this->find("name", $name);
        return !$user ? false : true;
    }
    /**
     * Returns gravatar link
     *
     * @param string $email
     *
     * @return string as gravatar link
     */
    public function setGravatar()
    {
        $this->img = $this->gravatar($this->email);
    }


    /**
     * Set the pass.
     *
     * @param string $pass the pass to use.
     *
     * @return void
     */
    public function setPassword($pass)
    {
        $this->pass = password_hash($pass, PASSWORD_DEFAULT);
    }

    /**
     * Verify the name and the pass, if successful the object contains
     * all details from the database row.
     *
     * @param string $name  name to check.
     * @param string $pass the pass to use.
     *
     * @return boolean true if name and pass matches, else false.
     */
    public function verifyPassword($name, $pass)
    {
        $this->find("name", $name);
        return password_verify($pass, $this->pass);
    }
}
