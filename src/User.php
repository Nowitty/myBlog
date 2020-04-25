<?php
declare(strict_types=1);

namespace App;
use App\Database;

class User
{
    private $name;
    private $password;
    private $id;
    public function __construct($name, $password)
    {
        
        $this->name = $name;
        $this->password = $password;
    }
    public function getName()
    {
        return $this->name;
    }
    public function check()
    {
        $db = new Database();
        $user = $db->selectByUserName($this->name);
        if (empty($user)) {
            return false;
        }
        if ($this->password == $user[0]['password']) {
            return true;
        } else {
            return false;
        }
    }
}

?>