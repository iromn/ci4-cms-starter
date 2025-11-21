<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";

$port = 3307;

// Create connection
$conn = new mysqli($servername, $username, $password, "", $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully\n";

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS ci4_cms";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully or already exists\n";
} else {
    echo "Error creating database: " . $conn->error . "\n";
}

$conn->close();
