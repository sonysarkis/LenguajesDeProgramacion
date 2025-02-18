<?php 
    require_once 'functions.php';

    const API_URL = "https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/Valencia,Venezuela?key=KNDF6J7LKLJUY74CP2VSADU4J";

    $data = get_data(API_URL);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Clima en los proximos diez dias en Valencia, Carabobo, Venezuela"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clima Valencia,Carabobo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f7f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin: 0;
        }

        .fecha {
            font-size: 14px;
            color: gray;
        }

        .info-principal {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 15px 0;
        }

        .info-principal h1 {
            font-size: 50px;
            margin: 0;
        }

        .detalles {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            color: #555;
        }

        img {
            width: 100px;
            height: 100px;
        }

        p {
            word-wrap: break-word; /* O puedes usar overflow-wrap: break-word; */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Pronóstico para 10 días - <?= $data["address"]; ?></h2>
            <p class="fecha">A partir de las <?= date("H:i A"); ?></p>
        </div>
        <hr>
        <?php 
            for ($i=0; $i < 10; $i++) { 
                if(!isset($data["days"][$i])) {
                    break;
                }
                // Crear un objeto DateTime a partir de la fecha
                $date = new DateTime($data["days"][$i]["datetime"]);

                $diaSemana = $date->format('l'); // 'l' devuelve el nombre completo del día de la semana
                echo '<h5>'. $diaSemana .' ' .$data["days"][$i]["datetime"] . '</h5>';
                echo '<div class="info-principal">';
                echo '<div>';
                echo '<h1>' . $data["days"][$i]["temp"] . '°' .'</h1>';
                echo '</div>';
                echo '<p>'.$data["days"][$i]["description"].'</p>';
                echo '<img src="icons/' . $data["days"][$i]["icon"] . '.png" alt="' . $data["days"][$i]["icon"] . '">';
                echo '</div>';
                echo '<div class="detalles">';
                echo '<div> 🌡 Mínima:' . $data["days"][$i]["tempmin"] . '°'.'</div>';
                echo '<div>💨 Viento:'. $data["days"][$i]["windspeed"] . 'mph' .'</div>';
                echo '<div>💧 Humedad:'. $data["days"][$i]["humidity"] . '%' .'</div>';
                echo '</div>';
            }
        ?>
    </div>
</body>
</html>