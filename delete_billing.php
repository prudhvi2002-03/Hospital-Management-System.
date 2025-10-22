<?php
include('db.php');
$id = $_GET['id'];
$conn->query("DELETE FROM billings WHERE id=$id");
header("Location: index.php#billings");
?>
