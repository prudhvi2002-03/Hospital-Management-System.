<?php
include('db.php');
$pid = $_POST['patient_id'];
$did = $_POST['doctor_id'];
$date = $_POST['appointment_date'];
$conn->query("INSERT INTO appointments (patient_id, doctor_id, appointment_date)
VALUES ($pid, $did, '$date')");
header("Location: index.php#appointments");
?>
