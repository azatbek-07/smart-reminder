<?php
session_start();

if (!isset($_SESSION['registered']) || $_SESSION['registered'] !== true) {
    header("Location: login.php");
    exit;
}

$id = $_POST['id'] ?? null;

$file = '../data/reminders.json';

$data = json_decode(file_get_contents($file), true);

if (!is_array($data)) {
    $data = [];
}

foreach ($data as $i => $reminder) {
    if (isset($reminder['id']) && $reminder['id'] == $id) {
        unset($data[$i]);
        break;
    }
}

$data = array_values($data);

file_put_contents($file, json_encode($data));

header("Location: index.php");
exit;