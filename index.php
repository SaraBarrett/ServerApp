<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous" defer></script>
  <script src="js/script.js" defer></script>
  <!-- .JS -->
  <!-- CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <!-- .CSS -->

  <!-- PHP -->
  <?php
  include('php/phpCode.php');
  session_start();  ?>
  <!-- .PHP -->
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="pages/presentation.php">Apresentação</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Cursos
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="pages/test_form.php">Adicionar Curso</a></li>
              <li><a class="dropdown-item" href="pages/courses.php">Lista de Cursos</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Cursos
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="pages/test_form.php">Adicionar Curso</a></li>
              <li><a class="dropdown-item" href="pages/courses.php">Lista de Cursos</a></li>
            </ul>
          </li>
         
          <?php if(isset($_SESSION['user'])){?>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="">Logout</a>
            </li>
          <?php } else{ ?>
             <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="pages/auth/login.php">Login</a>
          </li>
          <?php }  ?>
        </ul>
      </div>
    </div>
  </nav>
    <?php if(isset($_SESSION['user'])){?>
        <h6>Olá <?=$_SESSION['user']['name'] ?></h6>
    <?php } ?>

  <h3>Apis</h3>


  <button type="button" class="btn btn-outline-success">Clica aqui</button>
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


  <h5>A minha primeira variável de php é <?= $helloVar ?></h5>
</body>

</html>