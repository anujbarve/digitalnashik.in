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

// blog post query
$result = $post->read();

// get row count
$num = $result->rowCount();

// check if any posts
if ($num > 0) {
    // Posts array
    $post_arr = array();
    $post_arr['data'] = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $post_item = array(
           'id' => $id,
           'lang_id' => $lang_id,
           'title' => $title,
           'title_slug' => $title_slug,
           'title_hash' => $title_hash,
           'keywords' => $keywords,
           'summary' => $summary,
           'content' => $content,
           'category_id' => $category_id,
           'image_big' => $image_big,
           'image_default' => $image_default,
           'image_slider' => $image_slider,
           'image_mid' => $image_mid,
           'image_small' => $image_small,
           'image_mime' => $image_mime,
           'image_storage' => $image_storage,
           'optional_url' => $optional_url,
           'pageviews' => $pageviews,
           'need_auth' => $need_auth,
           'is_slider' => $is_slider,
           'slider_order' => $slider_order,
           'is_featured' => $is_featured,
           'featured_order' => $featured_order,
           'is_recommended' => $is_recommended,
           'is_breaking' => $is_breaking,
           'is_scheduled' => $is_scheduled,
           'visibility' => $visibility,
           'show_right_column' => $show_right_column,
           'post_type' => $post_type,
           'video_path' => $video_path,
           'video_storage' => $video_storage,
           'image_url' => $image_url,
           'video_url' => $video_url,
           'video_embed_code' => $video_embed_code,
           'user_id' => $user_id,
           'status' => $status,
           'feed_id' => $feed_id,
           'post_url' => $post_url,
           'show_post_url' => $show_post_url,
           'image_description' => $image_description,
           'show_item_numbers' => $show_item_numbers,
           'updated_at' => $updated_at,
           'created_at' => $created_at,
        );

        // Push to "data"
        array_push($post_arr['data'], $post_item);
    }

    echo json_encode($post_arr);
} else {
    echo json_encode(
        array('message' => 'No Posts Found')
    );
}
?>