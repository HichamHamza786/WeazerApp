<?php
    $url = "https://api.openweathermap.org/data/2.5/weather?q=Strasbourg,France&lang=fr&units=metric&appid=c0e6107d02ca25b9ca742a3713a5b662";

    $raw = file_get_contents($url);

    $json = json_decode($raw);

    $name = $json->name;
    
    // Météo
    $weather = $json->weather[0]->main;
    $desc = $json->weather[0]->description;
    
    // Températures
    $temp = $json->main->temp;
    $feel_like = $json->main->feels_like;
    
    // Vent
    $speed = $json->wind->speed;
    $deg = $json->wind->deg;
    
?>

<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!--Bootstrap-->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <!--Style-->
            <link rel="stylesheet" href="style.css">
            <title>Document</title>
        </head>
        <body>
            <div class="container text-center py-5">
                <h1>Météo du jour à <strong><?php echo $name;?></strong></h1>

                <div class="row justify-content-center align-items-center">
                    <?php
                        switch($weather)
                        {
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
        </body>
    </html>