<?php

class Post
{
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=db;dbname=appdb', 'root', 'rootpassword');
            // Set PDO to throw exceptions on error
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
            die;
        }
    }

    public function create($title, $content)
    {
        try {
            $sql = "INSERT INTO posts (title, text, created_at, updated_at) VALUES (:title, :text, :created_at, :updated_at)";
            $stmt = $this->pdo->prepare($sql);
            $result = $stmt->execute([
                'title' => $title,
                'text' => $content,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            die;
        }
    }

    public function find($id)
    {
        try {
            $sql = "SELECT * FROM posts WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['id' => $id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            die;
        }
    }

    public function findAll()
    {
        try {
            $sql = "SELECT * FROM posts";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            die;
        }
    }
}
