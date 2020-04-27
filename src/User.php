<?php
declare(strict_types=1);

namespace App;
use App\Database;

class User
{
    public $name;
    private $password;
    private $db;
    public function __construct()
    {
        if (isset($_POST['name'])) {
            $this->name = $_POST['name'];
            $this->password = $_POST['password'];
        } 
        if (isset($_SESSION['name'])) {
            $this->name = $_SESSION['name'];
        }
        $this->db = new Database();
    }
    public function getUserId($name)
    {
        $user = $this->db->selectUserIdByName($name);
        return $user[0]['id'];
    }
    public function auth()
    {
        $_SESSION['name'] = $this->name;
        $_SESSION['auth'] = true;
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