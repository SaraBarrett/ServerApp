<?php
session_start();

// Path to the JSON file with users
$file = '../data/users.json';

// Make sure the file exists
if (!file_exists($file)) {
    file_put_contents($file, json_encode([]));
}

// Read all users
$content = file_get_contents($file);
$users = json_decode($content, true);
if (!is_array($users)) $users = [];

// Determine action
$action = $_POST['action'] ?? $_GET['action'] ?? '';

/* ================ LOGIN ================ */
if ($action === 'login') {

    $email = strtolower(trim($_POST['email'] ?? ''));
    $password = $_POST['password'] ?? '';
    $found = null;
   

    // find user by email
 // find user by email
    foreach ($users['data'] as $u) {
        if (strtolower($u['email']) === $email && $u['password'] === $password) {
            $found = $u;
            break;
        }
    }

    if ($found) {
        // save into session
        $_SESSION['user'] = [
            'id'    => $found['id'],
            'name'  => $found['name'],
            'email' => $found['email'],
            'type'  => $found['type']
        ];
        // redirect after successful login
        header("Location: ../index.php");
        exit;
    } else {
        echo "<p style='color:red;'>Invalid email or password!</p>";
        echo "<p><a href='../pages/auth/login.php'>Back to login</a></p>";
        exit;
    }
            
}

/* ================ LOGOUT (GET) ================ */
if ($action === 'logout') {
    $_SESSION = [];
    session_destroy();
    header('Location: ../index.php');
    exit;
}