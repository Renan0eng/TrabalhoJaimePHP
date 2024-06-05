<?php
// Inclui o arquivo de configuração do banco de dados
include 'config.php';

// Obtém o ID do produto da URL
$id = $_GET['id'];

// Consulta o banco de dados para buscar as informações do produto com o ID fornecido
$sql = "SELECT * FROM products WHERE id=$id";
$result = $conn->query($sql);
$product = $result->fetch_assoc(); // Armazena as informações do produto em um array associativo

// Verifica se o formulário foi submetido (método POST)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtém os dados do formulário
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    // Atualiza o produto no banco de dados com os novos valores
    $sql = "UPDATE products SET name='$name', description='$description', price='$price', stock='$stock' WHERE id=$id";
    
    // Executa a consulta e redireciona para a página principal se bem-sucedido
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        // Exibe uma mensagem de erro se houver um problema com a atualização
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Product</h1>
        <a href="index.php">Back</a>
        <form method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $product['name']; ?>">
            <label for="description">Description:</label>
            <textarea id="description" name="description"><?php echo $product['description']; ?></textarea>
            <label for="price">Price:</label>
            <input type="text" id="price" name="price" value="<?php echo $product['price']; ?>">
            <label for="stock">Stock:</label>
            <input type="text" id="stock" name="stock" value="<?php echo $product['stock']; ?>">
            <input type="submit" value="Update">
        </form>
    </div>
</body>
</html>
