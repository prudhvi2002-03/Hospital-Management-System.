<?php
include('db.php');
$id = $_GET['id'];
$conn->query("DELETE FROM patients WHERE id=$id");
header("Location: index.php#patients");
?>
