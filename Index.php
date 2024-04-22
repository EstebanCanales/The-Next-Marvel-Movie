<?php 

const API_KEY = "https://whenisthenextmcufilm.com/api";
# this is the api of MCU movie (DONT TOUCH THIS)
$ch = curl_init(API_KEY);
# initialize the curl session
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);

# other alternative is to use file_get_contents
# $result = file_get_contents(API_KEY);
$data = json_decode($result, true);
curl_close($ch);

?>
<head>
  <meta charset="UTF-8">
  <meta name="icon" href="./Marvel.png">
  <meta name="description" content="The next movie of Marvel">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    The next movie of Marvel
  </title>
  <!-- Centered viewport --> 
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"/>
</head>
<main>
  <section>
  <img src="<?= $data["poster_url"]?>" width="400" alt="poster of <?= $data["title"]?>"/>
  </section>

<hgroup>
      <h2>
        Name of the movie: <?= $data["title"] ?> and will be <?= $data["days_until"] ?> days until the release
        <br>
      </h2> 
      <p> 
       Date of release: <?= $data["release_date"] ?>
      </p>
      <p>
        The next movie is <?= $data["following_production"]['title'] ?> 
      </p>
</hgroup>
</main>

<style>

  :root {
    color-scheme: light dark;
  }

  body {
    font-family: sans-serif;
    display: grid;
    place-items: center;
  }

  section {
    display: flex;
    justify-content: center;
  }

  hgroup {
    color: white;
    flex-direction: column;
    text-align: center;
  }

  img {
    border-radius: 30px;
    box-shadow: 0 0 20px #fff;
  }

</style>