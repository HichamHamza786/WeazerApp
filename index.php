<?php
    require_once('./config/config.php');
    
    // Vérification API + input
    if (isset($_GET['city'])) {
        $city = $_GET['city'];

        // Construction de l'URL de l'API
        $apiUrl = "https://api.openweathermap.org/data/2.5/weather?q=" . urlencode($city) . "&appid=" . urlencode(API_KEY);
        
        // Requête API + obtenrion des données météo
        $raw = file_get_contents($apiUrl);
        $json = json_decode($raw);
        
        
        // Vérification aboutissement requête
        if ($json && $json->cod === 200) {
            $name = $json->name;
            //* Météo
            $weather = $json->weather[0]->main;
            $desc = $json->weather[0]->description;
            //* Températures
            $temp = $json->main->temp;
            $feel_like = $json->main->feels_like;
            //* Vent
            $speed = $json->wind->speed;
            $deg = $json->wind->deg;
        } else {
            $name = "Ville non trouvée";
            $weather = "";
            $desc = "";
            $temp = "";
            $feel_like = "";
            $speed = "";
            $deg = "";
        }
    } else {
        
    }


        
    
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" integrity="sha512-t4GWSVZO1eC8BM339Xd7Uphw5s17a86tIZIj8qRxhnKub6WoyhnrxeCIMeAqBPgdZGlCcG2PrZjMc+Wr78+5Xg==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <!--Style-->
    <link rel="stylesheet" href="./css/style.css">
    <!--Favicon-->
    <link rel="shortcut icon" href="/img/icons8-sun-cloud-16.png"/>
    <link rel="apple-touch-icon" href="/img/icons8-sun-cloud-16.png"/>
    <title>Weazer</title>
</head>
<body>
    <div class="container text-center py-5">
        <form action="" method="GET">
            <input type="text" name="city" placeholder="Entrez une ville">
            <button type="submit">Afficher la météo</button>
        </form>
        <h1>Météo du jour à <strong><?php echo $name;?></strong></h1>

        <div class="row justify-content-center align-items-center">
            <?php
                switch($weather) {
                    case "Clear":
                    ?>
                        <div class="icon sunny">
                            <div class="sun">
                                <div class="rays">
                        </div>
                            </div>
                        </div>
                    <?php 
                    break;

                    case 'Drizzle':
                    ?>
                    <div class="icon sun-shower">
                        <div class="cloud">
                            <div class="sun">
                                <div class="rays"></div>
                            </div>
                        </div>
                            <div class="rain"></div>
                    </div>
                    <?php 
                    break;

                    case 'Rain':
                    ?>
                        <div class="icon rainy">
                            <div class="cloud"></div>
                            <div class="rain"></div>
                        </div>
                    <?php 
                    break;

                    case 'Clouds':
                    ?>
                    <div class="icon cloudy">
                        <div class="cloud"></div>
                        <div class="cloud"></div>
                    </div>
                    <?php
                    break;

                    case 'Thunderstorm':
                    ?>
                    <div class="icon thunder-storm">
                        <div class="cloud"></div>
                            <div class="lightning">
                                <div class="bolt"></div>
                                <div class="bolt"></div>
                            </div>
                    </div>
                    <?php
                    break;

                    case 'Snow':
                    ?>
                    <div class="icon flurries">
                        <div class="cloud"></div>
                            <div class="snow">
                                <div class="flake"></div>
                                <div class="flake"></div>
                            </div>
                    </div>

                    <?php
                    break;
                }
            ?>

            <div class="meteo_desc text-left">
                <h2>
                    <?php echo $temp; ?> °C / Ressenti <?php echo $feel_like; ?> °C <br />
                    <?php echo $speed; ?> Km/h - <?php echo $deg; ?> ° <br />
                </h2>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js" integrity="sha512-3dZ9wIrMMij8rOH7X3kLfXAzwtcHpuYpEgQg1OA4QAob1e81H8ntUQmQm3pBudqIoySO5j0tHN4ENzA6+n2r4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>