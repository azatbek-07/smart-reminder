<?php
session_start();

if (!isset($_SESSION['registered']) || $_SESSION['registered'] !== true) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'] ?? null;

$data = json_decode(file_get_contents('../data/reminders.json'), true);

foreach ($data as $i => $reminder) {
    if( $reminder['id'] == $id) {
        unset($data[$i]);
        file_put_contents('../data/reminders.json', json_encode(array_values($data)));
        header("Location: index.php");
        exit;
    }
}