<?php
session_start();

if (!isset($_SESSION['registered']) || $_SESSION['registered'] !== true) {
    header("Location: login.php");
    exit;
}

$reminders = json_decode($_SESSION["../data/reminders.json"], true);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach($reminders as $i => $reminder) {
        if($reminder["id"] == $_POST["id"]) {
            unset($reminders[$i]);
            file_put_contents("../data/reminders.json", json_encode(array_values($reminders)));
            header("Location: index.php");
            exit;
        }
    }
}