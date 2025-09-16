<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>AVS TECH | Notification System</title>
</head>

<body>
    <header class="text-gray-600 body-font">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-yellow-500 rounded-full" viewBox="0 0 24 24">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                </svg>
                <span class="ml-3 text-xl">Notification System</span>
            </a>
            <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
            </nav>
            <a href="http://digitalnashik.in/admin">
                <button class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">Back to Admin Panel
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                    </svg>
                </button>
            </a>
        </div>
    </header>

    <section class="text-gray-600 body-font relative">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-12">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Notification System</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Enter the proper information, to send the notification</p>
            </div>

            <form action="notifier.php" method="post">
                <div class="lg:w-1/2 md:w-2/3 mx-auto">
                    <div class="flex flex-wrap -m-2">
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-600">Notification Title (only 200 characters allowed)</label>
                                <input type="text" name="title" id="name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" maxlength = "200" required>
                            </div>
                        </div>
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="email" class="leading-7 text-sm text-gray-600">Notification Subtitle (only 200 characters allowed)</label>
                                <input type="text" name="subtitle" id="email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" maxlength = "200" required>
                            </div>
                        </div>
                        <!-- <div class="p-2 w-full">
                        <div class="relative">
                        <label for="email" class="leading-7 text-sm text-gray-600">Post Link</label>
                        <input type="link" name="link" id="email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        </div> -->
                        <div class="p-2 w-full">

                            <?php
                            header('Content-Type: text/html; charset=utf-8');


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
                            
                            mysqli_set_charset($conn,'utf8');

                            $sql = "SELECT * FROM `posts`";

                            $select = $conn->query($sql);



                            ?>
                            <div class="relative">
                                <label for="email" class="leading-7 text-sm text-gray-600">Post Link</label>
                                <select class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" name="link" id="" required>
                                    <?php

                                    while ($row = mysqli_fetch_array($select)) {
                                        $link = 'http://digitalnashik.in/' . $row['title_slug'];
                                        echo "<option value=" . $link . " class='w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out'>" . $row['title_slug'] . "</option>";
                                    }

                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="p-2 w-full">
                            <button type="submit" name="submit" class="flex mx-auto text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg">Submit</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </section>

</body>

</html>