<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

    function sendNotif($to, $notif)
    {

        $fields = array('to' => $to, 'notification' => $notif);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        $headers = array();
        $headers[] = 'Authorization: Key= AAAAq-HTN0E:APA91bG3bjxyzSYv9fCwLWjtYhFt3ClWwkv_3iAjz1WsIaw0iSawrP7IIDYO0TqlfvoMME5HfhJ2-0rclcBShMMeeR3gfEBLU286bZ1RALhNMq2STJMwa7P2ndBzjnvZ255ByPd-OXua';
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
    }

    $servername = "localhost";
    $username = "cms_digitalnashik";
    $password = "digitalnashik";
    $dbname = "cms_digitalnashik";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    

    if(isset($_POST['submit'])){
        $name = '';
        $subtitle = '';
        $link = '';

        $name = mysqli_real_escape_string($conn,$_POST['title']);
        $subtitle = mysqli_real_escape_string($conn,$_POST['subtitle']);
        $link = mysqli_real_escape_string($conn,$_POST['link']);

        mysqli_set_charset($conn,'utf8');

        $sql = "INSERT INTO notifications(`title`, `subtitle`, `link`) VALUES ('$name','$subtitle','$link')";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='container'>New record created successfully</div>";
            $to = "/topics/news";

            $notification = array(
                'title' => $name,
                'body' => $subtitle
            );

            sendNotif($to, $notification);
            header("Location: http://digitalnashik.in/notification.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    


    $conn->close();
?>

</body>
</html>