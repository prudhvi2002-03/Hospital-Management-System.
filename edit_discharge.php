<?php
include('db.php');
$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $pid = $_POST['patient_id'];
  $date = $_POST['discharge_date'];
  $conn->query("UPDATE discharges SET patient_id=$pid, discharge_date='$date' WHERE id=$id");
  header("Location: index.php#discharges");
  exit();
}
$res = $conn->query("SELECT * FROM discharges WHERE id=$id");
$d = $res->fetch_assoc();
?>
<form method="POST">
  <label>Patient ID</label><input type="number" name="patient_id" value="<?= $d['patient_id'] ?>" required>
  <label>Date</label><input type="date" name="discharge_date" value="<?= $d['discharge_date'] ?>" required>
  <button>Update</button>
</form>
