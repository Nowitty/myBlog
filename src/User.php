<?php
declare(strict_types=1);

namespace App;
use App\Database;

class User
{
    private $db;
    public function __construct()
    {
        $this->db = new Database('users');
    }
    public function login($name, $psw)
    {
        $user = $this->getByName($name);
        if (empty($user)) {
            return false;
        }
        if ($user[0]['password'] !== $psw) {
            return false;
        } else {
            $_SESSION['user'] = [
                'name' => $name,
                'id' => $user[0]['id']
            ];
            return true;
        }
    }
    public function getByName($name)
    {
        $user = $this->db->selectBy('name', $name);
        return $user;
    }
}

?>