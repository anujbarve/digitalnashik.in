<?php 
// headers
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Posts.php';

// instantiate db and connect
$database = new Database();
$db = $database->connect();

// instantiate blog post object
$post = new Post($db);

// get ID
$post->id = isset($_GET['id']) ? $_GET['id'] : die();

// blog post query
$post->read_single();

// create array
$post_arr = array(
    'id' => $post->id,
    'lang_id' => $post->lang_id,
    'title' => $post->title,
    'title_slug' => $post->title_slug,
    'title_hash' => $post->title_hash,
    'keywords' => $post->keywords,
    'summary' => $post->summary,
    'content' => htmlspecialchars(strip_tags($post->content)),
    'category_id' => $post->category_id,
    'image_big' => $post->image_big,
    'image_default' => $post->image_default,
    'image_slider' => $post->image_slider,
    'image_mid' => $post->image_mid,
    'image_small' => $post->image_small,
    'image_mime' => $post->image_mime,
    'image_storage' => $post->image_storage,
    'optional_url' => $post->optional_url,
    'pageviews' => $post->pageviews,
    'need_auth' => $post->need_auth,
    'is_slider' => $post->is_slider,
    'slider_order' => $post->slider_order,
    'is_featured' => $post->is_featured,
    'featured_order' => $post->featured_order,
    'is_recommended' => $post->is_recommended,
    'is_breaking' => $post->is_breaking,
    'is_scheduled' => $post->is_scheduled,
    'visibility' => $post->visibility,
    'show_right_column' => $post->show_right_column,
    'post_type' => $post->post_type,
    'video_path' => $post->video_path,
    'video_storage' => $post->video_storage,
    'image_url' => $post->image_url,
    'video_url' => $post->video_url,
    'video_embed_code' => $post->video_embed_code,
    'user_id' => $post->user_id,
    'status' => $post->status,
    'feed_id' => $post->feed_id,
    'post_url' => $post->post_url,
    'show_post_url' => $post->show_post_url,
    'image_description' => $post->image_description,
    'show_item_numbers' => $post->show_item_numbers,
    'updated_at' => $post->updated_at,
    'created_at' => $post->created_at,
);

print_r(json_encode($post_arr));
?>