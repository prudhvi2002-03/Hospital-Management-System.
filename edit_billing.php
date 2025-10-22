<?php
include('db.php');
$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $pid = $_POST['patient_id'];
  $amount = $_POST['amount'];
  $date = $_POST['billing_date'];
  $conn->query("UPDATE billings SET patient_id=$pid, amount='$amount', billing_date='$date' WHERE id=$id");
  header("Location: index.php#billings");
  exit();
}
$res = $conn->query("SELECT * FROM billings WHERE id=$id");
$b = $res->fetch_assoc();
?>
<form method="POST">
  <label>Patient ID</label><input type="number" name="patient_id" value="<?= $b['patient_id'] ?>" required>
  <label>Amount</label><input type="number" step="0.01" name="amount" value="<?= $b['amount'] ?>" required>
  <label>Date</label><input type="date" name="billing_date" value="<?= $b['billing_date'] ?>" required>
  <button>Update</button>
</form>
