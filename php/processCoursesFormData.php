<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $formData = [
        "course" => $_POST["course"],
        "year" => intval($_POST["year"]),
        "nrOfStudents" => intval($_POST["nrOfStudents"]),
        "responsible" => $_POST["responsible"],
        "city" => $_POST["city"]
    ];

    // Caminho do ficheiro
    $filename = '../data/cesaeCourses.json';

    // Estrutura inicial
    $existingData = ['data' => []];

    if (file_exists($filename)) {
        $jsonContent = file_get_contents($filename);
        $decoded = json_decode($jsonContent, true);
        if ($decoded && isset($decoded['data']) && is_array($decoded['data'])) {
            $existingData = $decoded;
        }
    }

    // Calcular próximo id
    $maxId = 0;
    foreach ($existingData['data'] as $item) {
        if (isset($item['id']) && $item['id'] > $maxId) {
            $maxId = $item['id'];
        }
    }
    $formData['id'] = $maxId + 1;

    // Adicionar novo registo
    $existingData['data'][] = $formData;

    // Converter para JSON
    $jsonData = json_encode($existingData, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    // Gravar
    $result = file_put_contents($filename, $jsonData);

    if ($result !== false) {
        header('Location: ../pages/courses.php?msg=inserted');
    } else {
        //página para onde reencaminha depois de adicionar
        http_response_code(500);
        echo "Error writing data to file.";
    }
} else {
    http_response_code(405);
    echo "Invalid request method.";
}

?>