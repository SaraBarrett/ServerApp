<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <script src="js/script.js" defer></script>
    <link rel="stylesheet" href="css/style.css">

    <?php
      include('php/phpCode.php')
    ?>
  </head>
  <body>
    <h3>Apis</h3>

    <button id="cat-fact">Cat Fact</button>
    <button id="dog-image">Dog Image</button>
    <button id="weather-btn">☁️</button>
    <h4>Sistema de navegação na minha app</h4>
    <ul>
      <li><a href="pages/presentation.php">Página de Apresentação</a></li>
        <li><a href="pages/test_form.php">Página de Formulário</a></li>
        <li><a href="pages/courses.php">Página de Cursos do Cesae</a></li>
         <li><a href="pages/superglobais_form.php">Formulário de SuperGlobais</a></li>

    </ul>


    <h5>A minha primeira variável de php é <?=$helloVar?></h5>
  </body>
</html>
