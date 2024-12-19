<?php
    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $dbname = "employee_db";
    // Create connection
    $conn = new mysqli("localhost", "root", "", "employee_db");
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    // Create table if not exists
    $sql = "CREATE TABLE IF NOT EXISTS employees (
    emp_id VARCHAR(10) PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    department VARCHAR(50) NOT NULL,
    designation VARCHAR(50) NOT NULL
    )";
    if (!$conn->query($sql)) {
    echo "Error creating table: " . $conn->error;
    }
?>