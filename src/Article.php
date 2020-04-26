<?php
declare(strict_types=1);

namespace App;
use App\Database;

class Article
{
    private $article = [];
    public function __construct(array $article)
    {  
        $this->article = $article;
    }
    public function save()
    {
        $db = new Database();
        $db->insertArticle($this->article);
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