<div class="container d-flex">
        <div class="container text-center py-5">
            <form action="" method="GET">
                <input type="text" name="city" placeholder="Entrez une ville">
                <button type="submit">Afficher la météo</button>
            </form>
            <h2>Météo du jour à <strong><?php echo $name;?></strong></h2>

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
                        <?php echo round($temp); ?> °C / Ressenti <?php echo round($feel_like); ?> °C <br />
                        <?php echo round($speed); ?> Km/h <br />
                    </h2>
                </div>
            </div>
        </div>
        <div class="container w-50">
            <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?= $mainController->getCityPhoto($city);?>" class="d-block w-100" alt="Photos de la ville">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js" integrity="sha512-3dZ9wIrMMij8rOH7X3kLfXAzwtcHpuYpEgQg1OA4QAob1e81H8ntUQmQm3pBudqIoySO5j0tHN4ENzA6+n2r4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>