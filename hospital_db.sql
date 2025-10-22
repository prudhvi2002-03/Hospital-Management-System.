CREATE DATABASE hospital_db;
USE hospital_db;

CREATE TABLE patients (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  dob DATE
);

CREATE TABLE doctors (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  specialty VARCHAR(100)
);

CREATE TABLE appointments (
  id INT AUTO_INCREMENT PRIMARY KEY,
  patient_id INT,
  doctor_id INT,
  appointment_date DATETIME,
  FOREIGN KEY (patient_id) REFERENCES patients(id),
  FOREIGN KEY (doctor_id) REFERENCES doctors(id)
);

CREATE TABLE discharges (
  id INT AUTO_INCREMENT PRIMARY KEY,
  patient_id INT,
  discharge_date DATE,
  FOREIGN KEY (patient_id) REFERENCES patients(id)
);

CREATE TABLE billings (
  id INT AUTO_INCREMENT PRIMARY KEY,
  patient_id INT,
  amount DECIMAL(10,2),
  billing_date DATE,
  FOREIGN KEY (patient_id) REFERENCES patients(id)
);
