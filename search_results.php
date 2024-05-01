<?php
include 'db_connect.php'; // Ensure this path is correct

echo "<h1>Search Results</h1>";

// Check for POST data and sanitize it
$product_name = isset($_POST['product_name']) ? $conn->real_escape_string($_POST['product_name']) : '';
$city = isset($_POST['city']) ? $conn->real_escape_string($_POST['city']) : '';
$min_quantity = isset($_POST['min_quantity']) ? (int) $_POST['min_quantity'] : 0;
$max_quantity = isset($_POST['max_quantity']) ? (int) $_POST['max_quantity'] : PHP_INT_MAX;
$min_price = isset($_POST['min_price']) ? (float) $_POST['min_price'] : 0.0;
$max_price = isset($_POST['max_price']) ? (float) $_POST['max_price'] : PHP_INT_MAX;

$query = "SELECT * FROM products WHERE 1=1";

// Append conditions based on the user input
if (!empty($product_name)) {
    $query .= " AND name LIKE '%" . $product_name . "%'";
}
if (!empty($city)) {
    $query .= " AND city = '" . $city . "'";
}
if ($min_quantity > 0) {
    $query .= " AND quantity >= " . $min_quantity;
}
if ($max_quantity < PHP_INT_MAX) {
    $query .= " AND quantity <= " . $max_quantity;
}
if ($min_price > 0.0) {
    $query .= " AND price >= " . $min_price;
}
if ($max_price < PHP_INT_MAX) {
    $query .= " AND price <= " . $max_price;
}

$result = $conn->query($query);

if (!$result) {
    echo "Error executing query: " . $conn->error;
} else {
    if ($result->num_rows > 0) {
        echo "<table border='1'><tr><th>ID</th><th>Name</th><th>City</th><th>Quantity</th><th>Price</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>{$row['pid']}</td><td>{$row['name']}</td><td>{$row['city']}</td><td>{$row['quantity']}</td><td>\${$row['price']}</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No results found.";
    }
}

$conn->close();
?>
