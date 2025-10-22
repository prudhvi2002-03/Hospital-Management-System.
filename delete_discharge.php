<?php
include('db.php');
$id = $_GET['id'];
$conn->query("DELETE FROM discharges WHERE id=$id");
header("Location: index.php#discharges");
?>
