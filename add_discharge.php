<?php
include('db.php');
$pid = $_POST['patient_id'];
$date = $_POST['discharge_date'];
$conn->query("INSERT INTO discharges (patient_id, discharge_date) VALUES ($pid, '$date')");
header("Location: index.php#discharges");
?>
