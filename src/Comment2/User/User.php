<?php

namespace Nicklas\Comment2\User;

use \Anax\Database\ActiveRecordModel;

/**
 * A database driven model.
 */
class User extends ActiveRecordModel
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
    public $authority;

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
