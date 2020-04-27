<?php
declare(strict_types=1);

namespace App;

class Database
{
    private $db;
    public function __construct()
    {
        $this->db = new \PDO("pgsql:dbname=myblog;host=localhost", "", "" );
        $this->db->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION );
    }
    public function insertArticle(array $article)
    {
        $authorId = $this->selectUserIdByName($article['author'])[0]['id'];
        $sql = "INSERT INTO articles (title, body, author_id) VALUES 
        ({$this->db->quote($article['title'])}, {$this->db->quote($article['body'])}, {$authorId});";
        $this->db->exec($sql);
    }
    public function selectAll()
    {
        return $this->db->query("SELECT * FROM articles ORDER BY id DESC")->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function selectArticleById($id)
    {
        return $this->db->query("SELECT * FROM articles WHERE id={$id}")->fetchAll(\PDO::FETCH_ASSOC)[0];
    }
    public function updateArticle($id, $article)
    {
        $sql = "UPDATE articles SET title = {$this->db->quote($article['title'])}, body = {$this->db->quote($article['body'])} WHERE id = {$id};";
        $this->db->exec($sql);
    }
    public function deleteArticle($id)
    {
        $sql = "DELETE FROM articles WHERE id = {$this->db->quote($id)}";
        $this->db->exec($sql);
    }
    public function saveUser($name, $password)
    {
        $sql = "INSERT INTO users (name, password) VALUES ({$this->db->quote($name)}, {$this->db->quote($password)});";
        $this->db->exec($sql);
    }
    public function selectByUserName($name)
    {
        $sql = "SELECT password FROM users WHERE name={$this->db->quote($name)}"; 
        return $this->db->query($sql)->fetchAll(\PDO::FETCH_ASSOC);  
    }
    public function selectUserIdByName($name)
    {
        $sql = "SELECT id FROM users WHERE name={$this->db->quote($name)}"; 
        return $this->db->query($sql)->fetchAll(\PDO::FETCH_ASSOC);  
    }
    
}