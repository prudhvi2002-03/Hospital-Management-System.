<?php
include('db.php');
$name = $_POST['name'];
$dob = $_POST['dob'];
$conn->query("INSERT INTO patients (name, dob) VALUES ('$name','$dob')");
header("Location: index.php#patients");
?>
