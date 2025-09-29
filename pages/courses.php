<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos Cesae</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/functions.js" defer></script>
    <?php 
        include('../php/processCesaeCoursesData.php');
    ?>
</head>
<body>
    <div class="align-center">
        <h5>Aqui estão todos os cursos do Cesae</h5>
    </div>

    <p>Descrição: cursos do cesae em vigor</p>
    <p><?=$hello?></p>
    <ul>
    <?php foreach($cesaeData['data'] as $item){ ?>
        <li><?=$item['course']?>,   <?=$item['year']?> em <?=$item['city']?></li>
        <form action="../php/updateAndDeleteCourses.php" method="POST" onsubmit="return confirm('tens a certeza que queres apagar?')">
            <input type="hidden" name="action" value="delete">
            <input type="hidden" name="id" value="<?=$item['id']?>">
           <button type="submit">Apagar</button>
        </form>

        <button type="button" onclick="toggleForm(<?=$item['id']?>)">Actualizar Dados</button>
        <form id="form-<?=$item['id']?>" action="../php/updateAndDeleteCourses.php" method="POST" style="display: none;">
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="id" value="<?=$item['id']?>">
            <input type="text" name="course" value="<?=$item['course']?>">
            <input type="number" name="year" value="<?=$item['year']?>">
            <input type="number" name="nrOfStudents" value="<?=$item['nrOfStudents']?>">
            <input type="text" name="responsible" value="<?=$item['responsible']?>">
            <input type="text" name="city" value="<?=$item['city']?>">
           <button type="submit">Editar</button>
        </form>
    <?php }?>
    </ul>
    
</body>
</html>