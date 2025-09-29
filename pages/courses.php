<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos Cesae</title>
    <link rel="stylesheet" href="../css/style.css">
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
        <form action="../php/updateAndDeleteCourses.php" method="POST">
            <input type="hidden" name="action" value="delete">
            <input type="hidden" name="id" value="<?=$item['id']?>">
           <button type="submit">Apagar</button>
    </form>
    <?php }?>
    </ul>
    
</body>
</html>