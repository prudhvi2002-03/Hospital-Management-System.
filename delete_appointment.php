<?php
include('db.php');
$id = $_GET['id'];
$conn->query("DELETE FROM appointments WHERE id=$id");
header("Location: index.php#appointments");
?>
