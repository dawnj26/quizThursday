<?php

$host = "localhost";
$user = "root";
$pwd = "";
$db = "quiz";

$conn = new mysqli($host, $user, $pwd, $db);

if ($conn->connect_errno) {
    die("Connection error");
}