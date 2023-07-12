<?php 

namespace App\Controllers;

class MainController {
    public function getWeather($city) {
        if (isset($_GET['city'])) {
            $city = $_GET['city'];
    
            // Construction de l'URL des clés API
            $apiWeatherUrl = "https://api.openweathermap.org/data/2.5/weather?q=" . urlencode($city) . "&appid=" . urlencode(WEATHER_API_KEY);
            œ
            // Requête API + obtention des données météo
            $raw = file_get_contents($apiWeatherUrl);
            $json = json_decode($raw);
            
            
            // Vérification aboutissement requête météo
            if ($json && $json->cod === 200) {
                $name = $json->name;
                //* Météo
                $weather = $json->weather[0]->main;
                $desc = $json->weather[0]->description;
                //* Températures
                $temp = $json->main->temp - 273.15;
                $feel_like = $json->main->feels_like - 273.15;
                //* Vent
                $speed = $json->wind->speed;
                $deg = $json->wind->deg;

                $weatherData = [
                    'name' => $name,
                    'weather' => $weather,
                    'desc' => $desc,
                    'temp' => $temp,
                    'feel_like' => $feel_like,
                    'speed' => $speed,
                    'deg' => $deg
                ];

                return $weatherData;
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
            $name = "Erreur de connexion à l'API";
            $weather = "";
            $desc = "";
            $temp = "";
            $feel_like = "";
            $speed = "";
            $deg = "";
        }
        
    }

    public function getCityPhoto($city)
    {
        $city = $_GET['city'];
        $apiPlacesUrl = "https://api.unsplash.com/photos/random?query=" . urlencode($city) . "&client_id=" . urlencode(PLACES_API_KEY);

        $response = file_get_contents($apiPlacesUrl);
        $data = json_decode($response, true);

        // Vérifier si la réponse contient une image
        if (isset($data['urls']['regular'])) {
            $photoUrl = $data['urls']['regular'];

            // Afficher la photo
            echo "<img src='$photoUrl' alt='Photo de la ville'>";
        } else {
            echo 'Aucune photo disponible pour cette ville.';
        }

        return $photoUrl;
    }
}