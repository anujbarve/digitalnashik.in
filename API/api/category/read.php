<?php 
// headers
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Category.php';

// instantiate db and connect
$database = new Database();
$db = $database->connect();

// instantiate blog post object
$cat = new Category($db);

// blog post query
$result = $cat->read();

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
           'name' => $name,
           'name_slug' => $name_slug,
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