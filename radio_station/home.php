<?php include ('../includes/db_connection.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
         .container {
            padding: 2rem;
            max-width: 1300px;
            margin: auto;
        }
        .card-container {
            display: flex;
            flex-wrap: nowrap;
            overflow-x: hidden; 
            padding-bottom: 20px;
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-right: 10px;
            min-width: 200px;
        }

        .news-item {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px 0;
        }

        .news-item h3 {
            margin: 0;
            color: #333;
        }

        .news-item h4 {
            margin: 5px 0;
            color: #666;
        }
/* 
        .weather {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin: 10px 0;
            background-color: #f9f9f9;
        } */

        /* .weather h3 {
            margin: 0;
            color: #333;
        } */

        /* .forecast-container {
            display: flex;
            flex-wrap: nowrap; 
            overflow-x: auto; 
        } */

        /* .forecast {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
            min-width: 150px;
            text-align: center;
            flex: 0 0 auto; 
        }

        .weather-scroll-container {
            display: flex;
            overflow-x: auto;
           
        }
        .weather {
            display: inline-block;
            width: 200px;
            margin: 10px;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            white-space: normal;
        } */

        .weather-scroll-container {
            display: flex;
            overflow-x: auto;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .weather {
            display: inline-block;
            width: 250px;
            margin: 10px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            white-space: normal;
        }
        .weather h3 {
            margin-top: 0;
            font-size: 18px;
        }
        .forecast-container {
            margin-top: 10px;
        }
        .forecast h4 {
            margin: 5px 0;
            font-size: 16px;
        }
        .forecast p {
            margin: 5px 0;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <?php include ('user_header.php'); ?>
    <div class="container">
    <div class="card-container">
        <?php
        $currentDay = date('l');

        $stmt = $pdo->prepare("SELECT * FROM station_schedule WHERE program_day = :currentDay ORDER BY start_time");
        $stmt->execute(['currentDay' => $currentDay]);
        $station_schedule = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($station_schedule as $schedule_) {
            ?>
            <div class="card">
                <h2><?php echo $schedule_['presenter_name']; ?></h2>
                <p><?php echo $schedule_['program_name']; ?></p>
                <p><?php echo $schedule_['program_day']; ?></p>
                <p><?php echo $schedule_['start_time']; ?> - <?php echo $schedule_['end_time']; ?></p>
            </div>
            <?php
        }
        ?>
    </div>

    <h2>Today's News</h2>
    <?php
    $stmt_today = $pdo->query("SELECT * FROM news WHERE DATE(created_date) = CURDATE()");
    $today_news = $stmt_today->fetchAll(PDO::FETCH_ASSOC);

    if (count($today_news) > 0) {
        foreach ($today_news as $news_updates) {
            echo "<div class='news-item'>";
            echo "<h4>Posted on: {$news_updates['created_date']}</h4>";
            echo "<h3>{$news_updates['title']}</h3>";
            echo "<p>Location: {$news_updates['location']}</p>";
            echo "</div>";
        }
    } else {
        $stmt_yesterday = $pdo->query("SELECT * FROM news WHERE DATE(created_date) = CURDATE() - INTERVAL 1 DAY");
        $yesterday_news = $stmt_yesterday->fetchAll(PDO::FETCH_ASSOC);

        foreach ($yesterday_news as $news_updates) {
            echo "<div class='news-item'>";
            echo "<h4>Posted on: {$news_updates['created_date']}</h4>";
            echo "<h3>{$news_updates['title']}</h3>";
            echo "<p>Location: {$news_updates['location']}</p>";
            echo "</div>";
        }
    }
    ?>

    <h2>Recent Advertisements</h2>
    <?php
    $stmt_today = $pdo->query("SELECT * FROM advertisements WHERE DATE(created_date) = CURDATE()");
    $today_news = $stmt_today->fetchAll(PDO::FETCH_ASSOC);

    if (count($today_news) > 0) {
        foreach ($today_news as $news_updates) {
            echo "<div class='news-item'>";
            echo "<h4>Posted on: {$news_updates['created_date']}</h4>";
            echo "<h3>{$news_updates['name']}</h3>";
            echo "<p>Time: {$news_updates['product_name']}</p>";
            echo "<p>Price: {$news_updates['price']}</p>";
            echo "<p>Contacts: {$news_updates['contacts']}</p>";
            echo "</div>";
        }
    } else {
        $stmt_yesterday = $pdo->query("SELECT * FROM advertisements WHERE DATE(created_date) = CURDATE() - INTERVAL 1 DAY");
        $yesterday_news = $stmt_yesterday->fetchAll(PDO::FETCH_ASSOC);

        foreach ($yesterday_news as $news_updates) {
            echo "<div class='news-item'>";
            echo "<h4>Posted on: {$news_updates['created_date']}</h4>";
            echo "<h3>{$news_updates['name']}</h3>";
            echo "<p> Product name: {$news_updates['product_name']}</p>";
            echo "<p>Price: {$news_updates['price']}</p>";
            echo "<p>Contacts: {$news_updates['contacts']}</p>";
            echo "</div>";
        }
    }
    ?>

    <h2>Current Weather</h2>
    <?php
    $apiKey = "3b71435577d4efa117812a8ed8a512e5";
    $cities = [
        "Berea",
        "Butha-Buthe",
        "Leribe",
        "Mafeteng",
        "Maseru",
        "Mohale's Hoek",
        "Mokhotlong",
        "Qacha's Nek",
        "Quthing",
        "Thaba-Tseka"
    ];

    function getWeatherData($city, $apiKey) {
        $city = urlencode($city); // Make the city name URL-safe
        $apiUrl = "http://api.openweathermap.org/data/2.5/forecast?q={$city}&units=metric&appid={$apiKey}";
        $weatherData = file_get_contents($apiUrl);
        return json_decode($weatherData, true);
    }

    ?>
    <div class="weather-scroll-container">
    <?php
    foreach ($cities as $city) {
        $weatherArray = getWeatherData($city, $apiKey);
        if (isset($weatherArray['list'][0])) {
            $currentWeather = $weatherArray['list'][0];
            $temp = $currentWeather['main']['temp'];
            $description = $currentWeather['weather'][0]['description'];
            $date = date('D, d M', strtotime($currentWeather['dt_txt']));
            $time = date('H:i', strtotime($currentWeather['dt_txt']));
            ?>
            <div class="weather">
                <h3> <?php echo htmlspecialchars($city); ?></h3>
                <div class="forecast-container">
                    <div class="forecast">
                        <h4><?php echo htmlspecialchars($date); ?></h4>
                        <p><?php echo htmlspecialchars($time); ?></p>
                        <p>Temperature: <?php echo htmlspecialchars($temp); ?> °C</p>
                        <p>Condition: <?php echo htmlspecialchars(ucfirst($description)); ?></p>
                    </div>
                </div>
            </div>
            <?php
        } else {
            echo "<div class='weather'><h3>" . htmlspecialchars($city) . "</h3><p>Weather data not available.</p></div>";
        }
    }
    ?>
    </div>
</div>
<?php include ('../footer.php'); ?>
</body>

</html>

