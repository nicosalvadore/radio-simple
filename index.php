<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Radio</title>
        <!-- Bootstrap -->
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
  <body>
<div class="container-fluid" id="radio">
    <div class="row radio-stations">
        <?php
          function getRadios() {
              $radios = array();
              if (($handle = fopen('database.csv', 'r')) !== FALSE) {
                  while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
                      $radio = array(
                          'pkid' => $data[0],
                          'name' => $data[1],
                          'stream' => $data[2],
                          'image' => $data[3],
                      );
                      $radios[] = $radio;
                  }
                  fclose($handle);
              }
              return $radios;
          }


          $radios = getRadios();
        
        foreach($radios as $radio){
            echo '<div class="col-6 col-sm-4 col-md-2 radio-station">';
            echo    '<img id="'.$radio['pkid'].'" class="img-fluid d-block mx-auto" src="/images/'.$radio['image'].'" data-name="'.$radio['name'].'" data-stream="'.$radio['stream'].'" alt="'.$radio['name'].'">';
            echo '</div>';
        }
        ?>
    </div> 
    <div class="radio-player">
        <audio id="player">
            <source src="" type="audio/mpeg">
        </audio>
        <div class="p-command row align-items-center">
            <div class="col-6">
                <span id="loader"></span> 
                <span id="label"></span>
            </div>
            <div class="col-1">
                <i class="bi bi-pause-fill" id="player-command"></i>
            </div>
            <div class="volume col-5">
                <input id="vol-control" type="range" min="0" max="100" step="1" oninput="SetVolume(this.value)" onchange="SetVolume(this.value)">
            </div>
        </div>
    </div>       
</div>

    <!-- jQuery is no longer needed -->
    <!-- Bootstrap 5.3 Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="/js/radio.js" type="text/javascript"></script>
  </body>
</html>
