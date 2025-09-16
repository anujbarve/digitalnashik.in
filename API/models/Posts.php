<?php

class Post
{
    // DB STUFF
    private $conn;
    private $table = 'posts';

    // Post Properties
    public $id;
    public $lang_id;
    public $title;
    public $title_slug;
    public $title_hash;
    public $keywords;
    public $summary;
    public $content;
    public $category_id;
    public $image_big;
    public $image_default;
    public $image_slider;
    public $image_mid;
    public $image_small;
    public $image_mime;
    public $image_storage;
    public $optional_url;
    public $pageviews;
    public $need_auth;
    public $is_slider;
    public $slider_order;
    public $is_featured;
    public $featured_order;
    public $is_recommended;
    public $is_breaking;
    public $is_scheduled;
    public $visibility;
    public $show_right_column;
    public $post_type;
    public $video_path;
    public $video_storage;
    public $image_url;
    public $video_url;
    public $video_embed_code;
    public $user_id;
    public $status;
    public $feed_id;
    public $post_url;
    public $show_post_url;
    public $image_description;
    public $show_item_numbers;
    public $updated_at;
    public $created_at;

    // Contructor
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Get Posts
    public function read()
    {
        // Create query

        $query = 'SELECT * FROM posts;';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    // get single post
    public function read_single()
    {
        // Create query
        $query = 'SELECT * FROM posts WHERE id = :id';

        //  prepare statement
        $stmt = $this->conn->prepare($query);

        // bind id
        $stmt->bindParam(':id', $this->id);

        // execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set properties
        $this->id = $row['id'];
        $this->lang_id = $row['lang_id'];
        $this->title = $row['title'];
        $this->title_slug = $row['title_slug'];
        $this->title_hash = $row['title_hash'];
        $this->keywords = $row['keywords'];
        $this->summary = $row['summary'];
        $this->content = $row['content'];
        $this->category_id = $row['category_id'];
        $this->image_big = $row['image_big'];
        $this->image_default = $row['image_default'];
        $this->image_slider = $row['image_slider'];
        $this->image_mid = $row['image_mid'];
        $this->image_small = $row['image_small'];
        $this->image_mime = $row['image_mime'];
        $this->image_storage = $row['image_storage'];
        $this->optional_url = $row['optional_url'];
        $this->pageviews = $row['pageviews'];
        $this->need_auth = $row['need_auth'];
        $this->is_slider = $row['is_slider'];
        $this->slider_order = $row['slider_order'];
        $this->is_featured = $row['is_featured'];
        $this->featured_order = $row['featured_order'];
        $this->is_recommended = $row['is_recommended'];
        $this->is_breaking = $row['is_breaking'];
        $this->is_scheduled = $row['is_scheduled'];
        $this->visibility = $row['visibility'];
        $this->show_right_column = $row['show_right_column'];
        $this->post_type = $row['post_type'];
        $this->video_path = $row['video_path'];
        $this->video_storage = $row['video_storage'];
        $this->image_url = $row['image_url'];
        $this->video_url = $row['video_url'];
        $this->video_embed_code = $row['video_embed_code'];
        $this->user_id = $row['user_id'];
        $this->status = $row['status'];
        $this->feed_id = $row['feed_id'];
        $this->post_url = $row['post_url'];
        $this->show_post_url = $row['show_post_url'];
        $this->image_description = $row['image_description'];
        $this->show_item_numbers = $row['show_item_numbers'];
        $this->updated_at = $row['updated_at'];
        $this->created_at = $row['created_at'];
    }

    // Create Post
    public function create()
    {
        // Create Query

        $query = 'INSERT INTO ' . $this->table . ' 
         SET 
        title = :title,
        body = :body,
        author = :author,
        category_id = :category_id';

        // prepare statement
        $stmt = $this->conn->prepare($query);

        // clean data
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->body = htmlspecialchars(strip_tags($this->body));
        $this->author = htmlspecialchars(strip_tags($this->author));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));

        // bind data
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':body', $this->body);
        $stmt->bindParam(':author', $this->author);
        $stmt->bindParam(':category_id', $this->category_id);

        // execute query
        if ($stmt->execute()) {
            return true;
        }

        // print error if something goes wrong

        printf("ERROR : %s.\n", $stmt->error);

        return false;
    }

    // Create Post
    public function update()
    {
        // Create Query

        $query = 'UPDATE ' . $this->table . ' 
         SET 
        title = :title,
        body = :body,
        author = :author,
        category_id = :category_id WHERE id = :id';

        // prepare statement
        $stmt = $this->conn->prepare($query);

        // clean data
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->body = htmlspecialchars(strip_tags($this->body));
        $this->author = htmlspecialchars(strip_tags($this->author));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind data
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':body', $this->body);
        $stmt->bindParam(':author', $this->author);
        $stmt->bindParam(':category_id', $this->category_id);
        $stmt->bindParam(':id', $this->id);

        // execute query
        if ($stmt->execute()) {
            return true;
        }

        // print error if something goes wrong

        printf("ERROR : %s.\n", $stmt->error);

        return false;
    }

    // Delete Post
    public function delete()
    {
        // Create Query
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

        // prepare statement
        $stmt = $this->conn->prepare($query);

        // clean data
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind data
        $stmt->bindParam(':id', $this->id);

        // execute query
        if ($stmt->execute()) {
            return true;
        }

        // print error if something goes wrong

        printf("ERROR : %s.\n", $stmt->error);

        return false;
    }
}

