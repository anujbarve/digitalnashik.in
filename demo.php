
                            <?php


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

                            $sql = "SELECT * FROM `posts`";

                            $select = $conn->query($sql);



                            while ($row = mysqli_fetch_array($select)) {
                                        $link = 'http://digitalnashik.in/' . $row['title_slug'];
                            echo $link."<br>";
                                
                            }
                            
                            echo "संपले वाक्य ";

                                    ?>