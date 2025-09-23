<?php
$hello= 'is working';

//ler o ficheiro JSON de cesaeCourses
$cesaeData = file_get_contents('../data/cesaeCourses.json');

//decode do json: como o json é linguagem universal, temos que dizer para ele tranformar numa sintaxe que o php entenda
$cesaeData = json_decode($cesaeData, true);


?>