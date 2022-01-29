<?php

session_start();

function getWeather($town, $aqi = "no")
{

    $SECRET_KEY = "d079fe28bf734c65a24131138222801";

    $url = "http://api.weatherapi.com/v1/current.json?";


    $url .= "key=$SECRET_KEY&q=$town&aqi=$aqi";
    echo $url;
    $json = file_get_contents($url);
    $data = json_decode($json, true);

    // $json = '{
    //     "location": {
    //         "name": "London",
    //         "region": "City of London, Greater London",
    //         "country": "United Kingdom",
    //         "lat": 51.52,
    //         "lon": -0.11,
    //         "tz_id": "Europe/London",
    //         "localtime_epoch": 1643375597,
    //         "localtime": "2022-01-28 13:13"
    //     },
    //     "current": {
    //         "last_updated_epoch": 1643371200,
    //         "last_updated": "2022-01-28 12:00",
    //         "temp_c": 9.0,
    //         "temp_f": 48.2,
    //         "is_day": 1,
    //         "condition": {
    //             "text": "Sunny",
    //             "icon": "//cdn.weatherapi.com/weather/64x64/day/113.png",
    //             "code": 1000
    //         },
    //         "wind_mph": 15.0,
    //         "wind_kph": 24.1,
    //         "wind_degree": 240,
    //         "wind_dir": "WSW",
    //         "pressure_mb": 1035.0,
    //         "pressure_in": 30.56,
    //         "precip_mm": 0.0,
    //         "precip_in": 0.0,
    //         "humidity": 71,
    //         "cloud": 0,
    //         "feelslike_c": 7.1,
    //         "feelslike_f": 44.7,
    //         "vis_km": 10.0,
    //         "vis_miles": 6.0,
    //         "uv": 2.0,
    //         "gust_mph": 9.8,
    //         "gust_kph": 15.8
    //     }
    // }';
    $data = json_decode($json, true);
    $locationName = $data['location']['name'];
    $temp = $data['current']['temp_c'];
    $condition = $data['current']['condition']['text'];
    $conditionIcon = $data['current']['condition']['icon'];

    $_SESSION['loc'] = $locationName;
    $_SESSION['temp'] = $temp;
    $_SESSION['condition'] = $condition;
    $_SESSION['conditionIcon'] = $conditionIcon;
}



// Get values from form
$town = $_POST['town'];

$data = getWeather($town);

header("Location: ../index.php");