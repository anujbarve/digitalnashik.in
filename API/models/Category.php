<?php

class Category
{
    // DB STUFF
    private $conn;
    private $table = 'posts';

    // Category Props
    public $id;
    public $lang_id;
    public $name;
    public $name_slug;

    // Contructor
    public function __construct($db)
    {
        $this->conn = $db;
    }

        // Get Posts
        public function read()
        {
            // Create query
    
            $query = 'SELECT * FROM `categories`';
    
            // Prepare statement
            $stmt = $this->conn->prepare($query);
    
            $stmt->execute();
    
            return $stmt;
        }
}
