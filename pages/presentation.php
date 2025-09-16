<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
       <?php
      include('../php/phpCode.php')
    ?>
</head>
<body>
    <h6>
        Página de Apresentação
    </h6>

     <h5>A minha primeira variável de php é <?=$helloVar?></h5>

     <h5>Somas</h5>
    <p>A soma de 200 com 56 é  <?= plus(200, 56) ?></p>
    <p> <?= plus(6,9) ?></p>

    <?php
    if($grade <10){
        echo '<h6>Chumbaste com a nota '.$grade.'</h6>';
    }else{
        echo '<h6>Parabéns, passaste com a nota '.$grade.'</h6>';
    }
    ?>

    <h6><?= $names[0] ?></h6>
    
    <h6><?= $product->name ?></h6>
</body>
</html>