<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    $sql = "INSERT INTO products (name, description, price, stock) VALUES ('$name', '$description', '$price', '$stock')";
    
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Add Product</h1>
        <a href="index.php">Back</a>
        <form method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name">
            <label for="description">Description:</label>
            <textarea id="description" name="description"></textarea>
            <label for="price">Price:</label>
            <input type="number" id="price" name="price">
            <label for="stock">Stock:</label>
            <input type="number" id="stock" name="stock">
            <input type="submit" value="Add">
        </form>
    </div>
</body>
</html>
