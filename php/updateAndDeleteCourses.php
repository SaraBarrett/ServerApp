<?php
// Caminho do JSON (usando caminho absoluto relativo a este ficheiro)
const CESAE_JSON ='../data/cesaeCourses.json';


if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["action"] =='delete') {
    // valida e converte id
    $id = (int) $_POST['id'];

    // Lê o ficheiro JSON 
    $json = file_get_contents(CESAE_JSON);
    if ($json === false) {
        http_response_code(500);
        exit('Erro ao ler o ficheiro JSON.');
    }
    $db = json_decode($json, true);

    $items = $db['data'];

    // Filtra removendo o item com o id recebido
    $before = count($items);
    $items = array_values(array_filter($items, fn($it) => ((int)($it['id'] ?? -1)) !== $id));

    if (count($items) === $before) {
        http_response_code(404);
        exit('Registo não encontrado.');
    }

    // Atualiza $db e grava com lock
    $db['data'] = $items;
    $jsonToWrite = json_encode($db, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    if ($jsonToWrite === false) {
        http_response_code(500);
        exit('Erro ao codificar JSON.');
    }

    // abre ficheiro e bloqueia exclusivamente
    $fp = fopen(CESAE_JSON, 'c+'); // cria se não existir
    if (!$fp) {
        http_response_code(500);
        exit('Erro ao abrir o ficheiro JSON para escrita.');
    }

    if (!flock($fp, LOCK_EX)) {
        fclose($fp);
        http_response_code(500);
        exit('Erro ao bloquear o ficheiro JSON.');
    }

    // escreve - truncar antes de escrever
    ftruncate($fp, 0);
    rewind($fp);

    $bytes = fwrite($fp, $jsonToWrite);
    fflush($fp);
    flock($fp, LOCK_UN);
    fclose($fp);

    if ($bytes === false) {
        http_response_code(500);
        exit('Erro ao gravar o ficheiro JSON.');
    }


    //reencaminha para o ficheiro onde temos a lista de cursos
    header('Location: ../pages/courses.php?msg=deleted');
    exit;
}elseif($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["action"] =='update'){
 
   // Lê ficheiro
    $json = file_get_contents(CESAE_JSON);
    $data = json_decode($json, true);
  
    // Verifica se o ficheiro é válido
    if (!isset($data['data'])) {
        die("JSON inválido");
    }

    // faz update 
    $id     = (int)$_POST['id'];
    $course = trim($_POST['course']);
    $nrOfStudents = (int)$_POST['nrOfStudents'];
    $responsible = trim($_POST['responsible']);
    $city = trim($_POST['city']);
    $year   = (int)$_POST['year'];

   $found = false;

    // iterar por referência para alterar o array original
    foreach ($data['data'] as &$item) {
        if ((int)$item['id'] === (int)$id) {
            $item['course'] = $course;
            $item['nrOfStudents'] = $nrOfStudents;
            $item['responsible'] = $responsible;
            $item['city'] = $city;
            $item['year']   = (int)$year;
            $found = true;
            break;
        }
    }
    unset($item); // importante depois de usar referência

    if ($found) {
        file_put_contents(CESAE_JSON, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        header('Location: ../pages/courses.php?msg=update');
        exit;
    };
  
    if (!$curso) {
        die("Curso não encontrado");
    }
}
