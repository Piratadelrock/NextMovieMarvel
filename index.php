<?php

# llamadas a api 
#https://picocss.com css framework

// la forma mas basica para hacer llamado es curl url 

const API_URL = "https://whenisthenextmcufilm.com/api";
# inicializar una nueva sesion de cURL; ch = cURL handle

$ch = curl_init(API_URL);

// indicar que queremos recibier el resultado de la peticion y no mostrarla en pantalla 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
/* ejecutar la peticion 
y guardamos el resultado 
*/

$result = curl_exec($ch);
// una alternativa seria utilizar file_get_contents
// $result = file_get_contents(API_URL); #SI SOLO QUIERE HACER UN GET DE UNA API 

$data = json_decode($result, true);


curl_close($ch);

// var_dump($result);
// var_dump($data);
?>
<!-- <pre style="font-size: 14px;height: 250px;">
    < ?= var_dump($data); ?>
</pre> -->

<!-- https://whenisthenextmcufilm.com/api -->

<head>
    <meta charset="utf-8" />
    <title>Next Film Marvel</title>
    <meta name="description" content="La proxima pelicula de Marvel" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Centered viewport -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">

</head>

<main>
    <section>
        <img src="<?= $data["poster_url"] ?>"
            width="300" alt="poster de <?= $data["title"] ?>"
            style="border-radius: 10px;">

    </section>

    <hgroup>
        <h3><?= $data["title"] ?> se estrena en <?= $data["days_until"] ?> días</h3>
        <p>Fecha de estreno: <?= $data["release_date"] ?></p>
        <p>Sipnosis: <?= $data["overview"] ?></p>

        <p>La siguiente pelicula es >>> <?= $data["following_production"]["title"] ?></p>
    </hgroup>


    <h5S>
        API UTILIZADA https://whenisthenextmcufilm.com/api
    </h5S>

    <pre>
        {
            "days_until":23,
            "following_production":{
                "days_until":43,
                "id":202555,
                "overview":"Matt Murdock, a blind lawyer with heightened abilities, is fighting for justice through his bustling law firm, while former mob boss Wilson Fisk pursues his own political endeavors in New York. When their past identities begin to emerge, both men find themselves on an inevitable collision course.",
                "poster_url":"https://image.tmdb.org/t/p/w500/qRimM5WYO4ZAkM3OudhGTqzZXJW.jpg",
                "release_date":"2025-03-04",
                "title":"Daredevil: Born Again",
                "type":"TV Show"
            },
            "id":822119,
            "overview":"After meeting with newly elected U.S. President Thaddeus Ross, Sam finds himself in the middle of an international incident. He must discover the reason behind a nefarious global plot before the true mastermind has the entire world seeing red.",
            "poster_url":"https://image.tmdb.org/t/p/w500/z0ujnXounP4yq637zyLBiZThF7Y.jpg",
            "release_date":"2025-02-12",
            "title":"Captain America: Brave New World",
            "type":"Movie"
        }
    </pre>
</main>

<style>
    :root {
        color-scheme: light dark;

    }

    body {
        display: grid;
        place-content: center;
    }

    section {
        display: flex;
        justify-content: center;
        text-align: center;
    }

    hgroup {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }

    img {
        margin: 0 auto;
    }
</style>