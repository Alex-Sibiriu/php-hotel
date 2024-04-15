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

  $isParking = $_GET['isParking'] === 'either' ? 'either' : filter_var($_GET['isParking'], FILTER_VALIDATE_BOOLEAN);
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
<body>

  <div class="container py-5">
    <form action="index.php" method="GET">

      <div>
        <label for="isParking">Cerca per Parcehggio</label>
        <select name="isParking" id="isParking">
          <option value="either" selected>Disponibilità Parcheggio</option>
          <option value="true">Si</option>
          <option value="false">No</option>
        </select>
      </div>

      <button type="submit">Invia</button>
    </form>
  </div>
    
  <div class="container pt-5">
    <div class="row row-cols-4">

      <?php foreach ($hotels as $hotel): ?>
        <?php if ($isParking === $hotel['parking'] || !isset($isParking) || $isParking === 'either'): ?>
        <div class="col mb-3">
          <div class="card text-center">
            <div class="card-body">
              <h5 class="card-title"><?php echo $hotel['name'] ?></h5>
              <p class="card-text"><?php echo $hotel['description'] ?></p>
              <p>Pracheggio: <?php $parking = $hotel['parking'] ? 'Si' : 'No'; echo $parking ?></p>
              <p>Voto: <?php echo $hotel['vote'] ?></p>
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