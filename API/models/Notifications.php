<?php

class Notifications
{
    // DB STUFF
    private $conn;
    private $table = 'posts';

    // Category Props
    public $id;
    public $title;
    public $subtitle;
    public $link;

    // Contructor
    public function __construct($db)
    {
        $this->conn = $db;
    }

        // Get Posts
        public function read()
        {
            // Create query
    
            $query = 'SELECT * FROM `notifications` ORDER BY `notifications`.`id` DESC';
            // Prepare statement
            $stmt = $this->conn->prepare($query);
    
            $stmt->execute();
    
            return $stmt;
        }
}
