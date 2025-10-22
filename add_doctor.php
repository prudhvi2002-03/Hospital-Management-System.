<?php
include('db.php');
$name = $_POST['name'];
$specialty = $_POST['specialty'];
$conn->query("INSERT INTO doctors (name, specialty) VALUES ('$name','$specialty')");
header("Location: index.php#doctors");
?>
