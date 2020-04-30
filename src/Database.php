<?php
declare(strict_types=1);

namespace App;

class Database
{
    private $db;
    private $table;
    public function __construct($table)
    {
        $this->db = new \PDO("pgsql:dbname=myblog;host=localhost", "", "" );
        $this->db->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION );
        $this->table = $table;
    }
    public function insert($params)
    {
        $columns = array_keys($params);
        $values = array_values($params);
        var_dump($values);
        // $sql = "INSERT INTO articles (title, body, author_id) VALUES 
        // ({$this->db->quote($article['title'])}, {$this->db->quote($article['body'])}, {$authorId});";
        // $this->db->exec($sql);
    }
    public function selectAll()
    {
        return $this->db->query("SELECT * FROM {$this->table} ORDER BY id DESC")->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function selectBy($column, $value)
    {
        return $this->db->query("SELECT * FROM {$this->table} WHERE {$column}='{$value}'")->fetchAll(\PDO::FETCH_ASSOC);
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
    
}