<?php
declare(strict_types=1);

namespace App;
use App\Database;

class Article
{
    private $article = [];
    private $db;
    public function __construct(array $article = [])
    {  
        $this->article = $article;
        $this->db = new Database();
    }
    public function save()
    {
        $this->db->insertArticle($this->article);
    }
    public function getArticleById($id)
    {
        return $this->db->selectArticleById($id);
    }
    public function update($id)
    {
        return $this->db->updateArticle($id, $this->article);
    }
    public function check()
    {
        $user = $this->db->selectByUserName($this->name);
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