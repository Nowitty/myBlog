<?php
declare(strict_types=1);

namespace App;
use App\Database;

class Article
{
    private $db;
    public function __construct()
    {  
        $this->db = new Database('articles');
    }
    public function getAll()
    {
        $articles = $this->db->selectAll();
        return $articles;
    }
    public function add($article)
    {
        $this->db->insert($article);
    }
    public function getById($id)
    {
        
        return $this->db->selectBy('id', $id)[0];
    }
    public function update($id)
    {
        return $this->db->updateArticle($id, $this->article);
    }
}

?>