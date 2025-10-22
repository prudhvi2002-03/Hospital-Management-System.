<?php
include('db.php');
$pid = $_POST['patient_id'];
$amount = $_POST['amount'];
$date = $_POST['billing_date'];
$conn->query("INSERT INTO billings (patient_id, amount, billing_date)
VALUES ($pid, '$amount', '$date')");
header("Location: index.php#billings");
?>
