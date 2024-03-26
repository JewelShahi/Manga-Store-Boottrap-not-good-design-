<!-- <?php
include "connection.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Display</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    
<?php
$select = $conn->prepare("SELECT product_id, images FROM products");
$select->execute();
$products = $select->fetchAll(PDO::FETCH_ASSOC); // Fixed this line
foreach ($products as $product) {
    // Decode the JSON array of images
    $images = json_decode($product['images'], true);
    
    // Output product ID
    echo "<div>Product ID: " . $product['product_id'] . "</div>";
    
    // Output each image in a separate div
    foreach ($images as $index => $image) {
        echo "<div>";
        echo "<img src='". $image . "' alt='Product Image " . ($index + 1) . "'>";
        echo "</div>";
    }
}
?>

</body>
</html> -->
