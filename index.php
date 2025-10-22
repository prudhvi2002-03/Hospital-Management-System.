<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Hospital Management System</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f4f9;
      margin: 0;
      padding: 20px;
    }
    header {
      background: #007bff;
      color: white;
      padding: 15px;
      text-align: center;
      border-radius: 8px;
    }
    section {
      background: white;
      padding: 15px;
      margin-top: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    h2 {
      margin-bottom: 10px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 15px;
    }
    table, th, td {
      border: 1px solid #ddd;
      padding: 8px;
    }
    th {
      background: #007bff;
      color: white;
    }
    form {
      margin-top: 10px;
    }
    input, select {
      padding: 6px;
      margin-right: 10px;
    }
    button {
      background: #007bff;
      color: white;
      border: none;
      padding: 6px 10px;
      cursor: pointer;
      border-radius: 4px;
    }
    a {
      color: red;
      text-decoration: none;
    }
  </style>
</head>
<body>
<header><h1>🏥 Hospital Management System</h1></header>

<!-- Patients Section -->
<section id="patients">
  <h2>Patients</h2>
  <table>
    <tr><th>ID</th><th>Name</th><th>DOB</th><th>Actions</th></tr>
    <?php
      $res = $conn->query("SELECT * FROM patients");
      while ($r = $res->fetch_assoc()) {
        echo "<tr>
          <td>{$r['id']}</td>
          <td>{$r['name']}</td>
          <td>{$r['dob']}</td>
          <td>
            <a href='edit_patient.php?id={$r['id']}'>Edit</a> | 
            <a href='delete_patient.php?id={$r['id']}'>Delete</a>
          </td>
        </tr>";
      }
    ?>
  </table>
  <form action="add_patient.php" method="POST">
    <input type="text" name="name" placeholder="Patient Name" required>
    <input type="date" name="dob" required>
    <button>Add Patient</button>
  </form>
</section>

<!-- Doctors -->
<section id="doctors">
  <h2>Doctors</h2>
  <table>
    <tr><th>ID</th><th>Name</th><th>Specialty</th><th>Actions</th></tr>
    <?php
      $res = $conn->query("SELECT * FROM doctors");
      while ($r = $res->fetch_assoc()) {
        echo "<tr>
          <td>{$r['id']}</td>
          <td>{$r['name']}</td>
          <td>{$r['specialty']}</td>
          <td>
            <a href='edit_doctor.php?id={$r['id']}'>Edit</a> | 
            <a href='delete_doctor.php?id={$r['id']}'>Delete</a>
          </td>
        </tr>";
      }
    ?>
  </table>
  <form action="add_doctor.php" method="POST">
    <input type="text" name="name" placeholder="Doctor Name" required>
    <input type="text" name="specialty" placeholder="Specialty" required>
    <button>Add Doctor</button>
  </form>
</section>

<!-- Appointments -->
<section id="appointments">
  <h2>Appointments</h2>
  <table>
    <tr><th>ID</th><th>Patient</th><th>Doctor</th><th>Date</th><th>Actions</th></tr>
    <?php
      $res = $conn->query("SELECT a.id, p.name as patient, d.name as doctor, a.appointment_date 
                           FROM appointments a 
                           JOIN patients p ON a.patient_id=p.id 
                           JOIN doctors d ON a.doctor_id=d.id");
      while ($r = $res->fetch_assoc()) {
        echo "<tr>
          <td>{$r['id']}</td>
          <td>{$r['patient']}</td>
          <td>{$r['doctor']}</td>
          <td>{$r['appointment_date']}</td>
          <td>
            <a href='edit_appointment.php?id={$r['id']}'>Edit</a> | 
            <a href='delete_appointment.php?id={$r['id']}'>Delete</a>
          </td>
        </tr>";
      }
    ?>
  </table>
  <form action="add_appointment.php" method="POST">
    <select name="patient_id" required>
      <option value="">Select Patient</option>
      <?php
        $patients = $conn->query("SELECT * FROM patients");
        while ($p = $patients->fetch_assoc()) echo "<option value='{$p['id']}'>{$p['name']}</option>";
      ?>
    </select>
    <select name="doctor_id" required>
      <option value="">Select Doctor</option>
      <?php
        $doctors = $conn->query("SELECT * FROM doctors");
        while ($d = $doctors->fetch_assoc()) echo "<option value='{$d['id']}'>{$d['name']}</option>";
      ?>
    </select>
    <input type="datetime-local" name="appointment_date" required>
    <button>Add Appointment</button>
  </form>
</section>

<!-- Discharges -->
<section id="discharges">
  <h2>Discharges</h2>
  <table>
    <tr><th>ID</th><th>Patient</th><th>Date</th><th>Actions</th></tr>
    <?php
      $res = $conn->query("SELECT d.id, p.name as patient, d.discharge_date 
                           FROM discharges d JOIN patients p ON d.patient_id=p.id");
      while ($r = $res->fetch_assoc()) {
        echo "<tr>
          <td>{$r['id']}</td>
          <td>{$r['patient']}</td>
          <td>{$r['discharge_date']}</td>
          <td>
            <a href='edit_discharge.php?id={$r['id']}'>Edit</a> | 
            <a href='delete_discharge.php?id={$r['id']}'>Delete</a>
          </td>
        </tr>";
      }
    ?>
  </table>
  <form action="add_discharge.php" method="POST">
    <select name="patient_id" required>
      <option value="">Select Patient</option>
      <?php
        $patients = $conn->query("SELECT * FROM patients");
        while ($p = $patients->fetch_assoc()) echo "<option value='{$p['id']}'>{$p['name']}</option>";
      ?>
    </select>
    <input type="date" name="discharge_date" required>
    <button>Add Discharge</button>
  </form>
</section>

<!-- Billings -->
<section id="billings">
  <h2>Billings</h2>
  <table>
    <tr><th>ID</th><th>Patient</th><th>Amount</th><th>Date</th><th>Actions</th></tr>
    <?php
      $res = $conn->query("SELECT b.id, p.name as patient, b.amount, b.billing_date 
                           FROM billings b JOIN patients p ON b.patient_id=p.id");
      while ($r = $res->fetch_assoc()) {
        echo "<tr>
          <td>{$r['id']}</td>
          <td>{$r['patient']}</td>
          <td>{$r['amount']}</td>
          <td>{$r['billing_date']}</td>
          <td>
            <a href='edit_billing.php?id={$r['id']}'>Edit</a> | 
            <a href='delete_billing.php?id={$r['id']}'>Delete</a>
          </td>
        </tr>";
      }
    ?>
  </table>
  <form action="add_billing.php" method="POST">
    <select name="patient_id" required>
      <option value="">Select Patient</option>
      <?php
        $patients = $conn->query("SELECT * FROM patients");
        while ($p = $patients->fetch_assoc()) echo "<option value='{$p['id']}'>{$p['name']}</option>";
      ?>
    </select>
    <input type="number" step="0.01" name="amount" placeholder="Amount" required>
    <input type="date" name="billing_date" required>
    <button>Add Billing</button>
  </form>
</section>

</body>
</html>
