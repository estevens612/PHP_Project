<?php
include 'db_connect.php'; // Include database connection file
session_start(); // Start the session

echo "<h1>Search Results</h1>";

// Construct the query
$query = "SELECT * FROM products WHERE 1=1";
if (!empty($_SESSION['product_name'])) {
    $query .= " AND name LIKE '%" . $conn->real_escape_string($_SESSION['product_name']) . "%'";
}
if (!empty($_SESSION['city'])) {
    $query .= " AND city LIKE '%" . $conn->real_escape_string($_SESSION['city']) . "%'";
}
if (!empty($_SESSION['min_quantity'])) {
    $query .= " AND quantity >= " . intval($_SESSION['min_quantity']);
}
if (!empty($_SESSION['max_quantity'])) {
    $query .= " AND quantity <= " . intval($_SESSION['max_quantity']);
}
if (!empty($_SESSION['min_price'])) {
    $query .= " AND price >= " . floatval($_SESSION['min_price']);
}
if (!empty($_SESSION['max_price'])) {
    $query .= " AND price <= " . floatval($_SESSION['max_price']);
}

$result = $conn->query($query);
if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>ID</th><th>Name</th><th>City</th><th>Quantity</th><th>Price</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>{$row['pid']}</td><td>{$row['name']}</td><td>{$row['city']}</td><td>{$row['quantity']}</td><td>\${$row['price']}</td></tr>";
    }
    echo "</table>";
} else {
    echo "No results found.";
}

// Button to perform another search
echo "<form action='search.php' method='post'>";
echo "<button type='submit'>Perform Another Search</button>";
echo "</form>";

$conn->close();
?>
