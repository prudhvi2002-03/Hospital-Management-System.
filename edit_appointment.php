<?php
include('db.php');
$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $pid = $_POST['patient_id'];
  $did = $_POST['doctor_id'];
  $date = $_POST['appointment_date'];
  $conn->query("UPDATE appointments SET patient_id=$pid, doctor_id=$did, appointment_date='$date' WHERE id=$id");
  header("Location: index.php#appointments");
  exit();
}
$res = $conn->query("SELECT * FROM appointments WHERE id=$id");
$a = $res->fetch_assoc();
?>
<form method="POST">
  <label>Patient ID</label><input type="number" name="patient_id" value="<?= $a['patient_id'] ?>" required>
  <label>Doctor ID</label><input type="number" name="doctor_id" value="<?= $a['doctor_id'] ?>" required>
  <label>Date</label><input type="datetime-local" name="appointment_date" required>
  <button>Update</button>
</form>
