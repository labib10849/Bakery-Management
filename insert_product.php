<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connection checking</title>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "product_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST['product_name'];
    $category = $_POST['category'];
    $manufacturing_date = $_POST['manufacturing_date'];
    // Assuming you're uploading images, you should handle them differently using move_uploaded_file()
    // Example: $image = $_FILES['image']['name'];
    $image = ''; // Change this according to how you handle image uploads

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO Products (product_name, category, manufacturing_date, image) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $product_name, $category, $manufacturing_date, $image);

    if ($stmt->execute()) {
        echo "Product added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
<h1 align="center">Yes!</h1>
<h2 align="center">Successful connection is established</h2>
</body>
</html>
