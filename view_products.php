<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
        }
        .container {
            max-width: 1000px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .delete-btn {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>View All Products</h2>
        <?php
        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "product_database";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        // Check if delete button is clicked
        if(isset($_GET['delete_id'])){
            $id_to_delete = $_GET['delete_id'];
            $sql = "DELETE FROM products WHERE id = $id_to_delete";
            if(mysqli_query($conn, $sql)){
                echo "Product deleted successfully.";
            } else {
                echo "Error deleting product: " . mysqli_error($conn);
            }
        }
        // Fetch all products
        $sql = "SELECT * FROM products";
        $result = mysqli_query($conn, $sql);
        // Check if any products exist
        if (mysqli_num_rows($result) > 0) {
            // Products found, display them
            echo "<table>";
            echo "<tr><th>ID</th><th>Product Name</th><th>Category</th><th>Manufacturing date</th><th>Action</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['product_name'] . "</td>";
                echo "<td>" . $row['category'] . "</td>";
                echo "<td>" . $row['manufacturing_date'] . "</td>";
                echo "<td><button class='delete-btn' onclick='deleteProduct(" . $row['id'] . ")'>Delete</button></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            // No products found
            echo "No products found.";
        }
        
        mysqli_close($conn);
        ?>
        <p><a href="index.html">Add Another Product</a></p>
    </div>
    <script src="script2.js"></script>
</body>
</html>
