<?php
include('db.php');
$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $specialty = $_POST['specialty'];
  $conn->query("UPDATE doctors SET name='$name', specialty='$specialty' WHERE id=$id");
  header("Location: index.php#doctors");
  exit();
}
$res = $conn->query("SELECT * FROM doctors WHERE id=$id");
$d = $res->fetch_assoc();
?>
<form method="POST">
  <input type="text" name="name" value="<?= $d['name'] ?>" required>
  <input type="text" name="specialty" value="<?= $d['specialty'] ?>" required>
  <button>Update</button>
</form>
