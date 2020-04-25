<?php
declare(strict_types=1);

namespace App;
use App\Database;

class Registration
{
    private $userName;
    private $userPassword;
    public function __construct($name = null, $password = null)
    {
        $this->userName = $name;
        $this->userPassword = $password;
    }
    public function isEmpty()
    {
        return 0;
    }
    public function save()
    {
        $db = new Database();
        $db->saveUser($this->userName, $this->userPassword);
    }
}

?>