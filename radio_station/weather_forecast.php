<?php
    $apiKey = "3b71435577d4efa117812a8ed8a512e5";
    $cities =[
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
    $apiUrl = "http://api.openweathermap.org/data/2.5/forecast?q={$city}&units=metric&appid={$apiKey}";
    $weatherData = file_get_contents($apiUrl);
    return json_decode($weatherData, true);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Forecast</title>
    <style>
         .container {
            padding: 2rem;
            max-width: 1300px;
            margin: auto;
        }
        .weather {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin: 10px 0;
            background-color: #f9f9f9;
        }

        .weather h3 {
            margin: 0;
            color: #333;
        }

        .forecast-container {
            display: flex;
            flex-wrap: wrap;
        }

        .forecast {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
            min-width: 150px;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php include ('user_header.php'); ?>
    <div class="container">
    <h1>Weather Forecast</h1>

    <?php
    foreach ($cities as $city) {
        $weatherArray = getWeatherData($city, $apiKey);
        ?>

        <div class="weather">
            <h3>Weather Forecast in <?php echo $city; ?></h3>
            <div class="forecast-container">
                <?php
                foreach ($weatherArray['list'] as $forecast) {
                    $date = date('D, d M', strtotime($forecast['dt_txt']));
                    $time = date('H:i', strtotime($forecast['dt_txt']));
                    $temp = $forecast['main']['temp'];
                    $description = $forecast['weather'][0]['description'];
                    ?>
                    <div class="forecast">
                        <h4><?php echo $date; ?></h4>
                        <p><?php echo $time; ?></p>
                        <p><?php echo $temp; ?> °C</p>
                        <p><?php echo ucfirst($description); ?></p>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

        <?php
    }
    ?>
    </div>
</body>

</html>
