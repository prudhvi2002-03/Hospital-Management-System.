<?php
include('db.php');
$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $dob = $_POST['dob'];
  $conn->query("UPDATE patients SET name='$name', dob='$dob' WHERE id=$id");
  header("Location: index.php#patients");
  exit();
}
$res = $conn->query("SELECT * FROM patients WHERE id=$id");
$p = $res->fetch_assoc();
?>
<form method="POST">
  <input type="text" name="name" value="<?= $p['name'] ?>" required>
  <input type="date" name="dob" value="<?= $p['dob'] ?>" required>
  <button>Update</button>
</form>
