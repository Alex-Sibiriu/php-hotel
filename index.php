<?php

  $hotels = [
    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],
  ];

  $isParking = isset($_GET['isParking']) ? $_GET['isParking'] : '';

  $rating = isset($_GET['rating']) ? $_GET['rating'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Hotels</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body class="bg-info">

  <div class="container py-5">
    <h1 class="text-center text-white mb-5">PHP Hotels</h1>
    <form action="index.php" method="GET" class="d-flex justify-content-around fw-bold">

      <div>
        <label for="isParking" class="me-2">Cerca per Parcheggio</label>
        <select name="isParking" id="isParking">
          <option value="" selected>Disponibilità Parcheggio</option>
          <option value="1">Si</option>
          <option value="0">No</option>
        </select>
      </div>

      <div>
        <label for="rating" class="me-2">Cerca per Voto</label>  
        <select name="rating" id="rating">
          <option value="" selected>Qualsiasi Voto</option>
          <option value="1">>1 &starf;</option>
          <option value="2">>2 &starf;</option>
          <option value="3">>3 &starf;</option>
          <option value="4">>4 &starf;</option>
          <option value="5">=5 &starf;</option>
        </select>
      </div>

      <button type="submit" class="btn btn-light btn-outline-danger">Invia</button>
    </form>
  </div>
    
  <div class="container pt-5">
    <div class="row row-cols-4">

      <?php foreach ($hotels as $hotel): ?>
        <?php
            $selectedParking = filter_var($isParking, FILTER_VALIDATE_BOOLEAN);
            if (($selectedParking === $hotel['parking'] || $isParking === '') && ($rating <= $hotel['vote'] || $rating === '')): ?>
        <div class="col mb-3">
          <div class="card text-center rounded-4 bg-info-subtle">
            <div class="card-body">
              <h5 class="card-title"><?php echo $hotel['name'] ?></h5>
              <p class="card-text"><?php echo $hotel['description'] ?></p>
              <p>Parcheggio: <?php $parking = $hotel['parking'] ? 'Si' : 'No'; echo $parking ?></p>
              <p>Voto: <?php echo $hotel['vote'] ?> &starf;</p>
              <p>Distanza dal centro: <?php echo $hotel['distance_to_center'] ?></p>
            </div>
          </div>
        </div>
        <?php endif ?>
      <?php endforeach ?>

    </div>
  </div>

</body>
</html>