<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <script src="js/script.js"></script>
    <link rel="stylesheet" href="css/styleDark.css">



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="css/all.css">

</head>

<body>
    <div id="header">
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand">Weather</a>
                <form class="d-flex" method="post" action="html/weatherAPI.php">
                    <input name="town" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </div>
    <div id="container">
        <?php if (!isset($_SESSION['loc'])) echo "Search for location" ?>
        <div class="weatherIcon">
            <?php echo "<img src=" . $_SESSION['conditionIcon'] . " alt='Weather Icon'>" ?>
        </div>
        <div id="city">
            <h1><?php echo $_SESSION['loc']; ?></h1>
        </div>
        <div id="currWeather"><?php echo $_SESSION['condition'] ?>
            <?php echo $_SESSION['temp'] . '&deg;C'; ?>
        </div>

    </div>
</body>

</html>