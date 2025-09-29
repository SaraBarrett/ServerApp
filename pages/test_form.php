<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h5>Olá, aqui tens um formulário</h5>
    <form action="../php/processCoursesFormData.php" method="POST">
        <label for="">Nome do Curso:</label>
        <input type="text" placeholder="Insira o nome do Curso" name="course" required> <br>
        <label for="">Ano do Curso:</label>
        <input type="number" placeholder="Insira o ano do Curso" name="year" required> <br>
          <label for="">Número de Estudantes:</label>
        <input type="number" placeholder="Número de estudantes do Curso" name="nrOfStudents" required> <br>
        <label for="">Nome do Responsável:</label>
        <input type="text" placeholder="Indique o nome do responsável" name="responsible" required> <br>
              <label for="">Cidade:</label>
        <input type="text" placeholder="Indique a cidade" name="city" required> <br>
        <input type="file">
        <button type="submit">Guardar</button>
    </form>
</body>
</html>