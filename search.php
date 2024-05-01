<?php
session_start(); // Start the session to handle previous form data
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Initialize session variables to pre-fill the form with previous data if available
$_SESSION['product_name'] = $_POST['product_name'] ?? $_SESSION['product_name'] ?? '';
$_SESSION['city'] = $_POST['city'] ?? $_SESSION['city'] ?? '';
$_SESSION['min_quantity'] = $_POST['min_quantity'] ?? $_SESSION['min_quantity'] ?? '';
$_SESSION['max_quantity'] = $_POST['max_quantity'] ?? $_SESSION['max_quantity'] ?? '';
$_SESSION['min_price'] = $_POST['min_price'] ?? $_SESSION['min_price'] ?? '';
$_SESSION['max_price'] = $_POST['max_price'] ?? $_SESSION['max_price'] ?? '';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Search</title>
    <script>
        function clearForm() {
            document.getElementById("searchForm").reset();
        }
    </script>
</head>
<body>
    <h1>Product Search</h1>
    <form id="searchForm" action="search_results.php" method="post">
        Product Name (substring): <input type="text" name="product_name" value="<?php echo htmlspecialchars($_SESSION['product_name']); ?>"><br>
        City (substring): <input type="text" name="city" value="<?php echo htmlspecialchars($_SESSION['city']); ?>"><br>
        Minimum Quantity: <input type="number" name="min_quantity" value="<?php echo htmlspecialchars($_SESSION['min_quantity']); ?>"><br>
        Maximum Quantity: <input type="number" name="max_quantity" value="<?php echo htmlspecialchars($_SESSION['max_quantity']); ?>"><br>
        Minimum Price: <input type="number" step="0.01" name="min_price" value="<?php echo htmlspecialchars($_SESSION['min_price']); ?>"><br>
        Maximum Price: <input type="number" step="0.01" name="max_price" value="<?php echo htmlspecialchars($_SESSION['max_price']); ?>"><br>
        <input type="submit" value="Search Products">
        <input type="button" value="Clear Form" onclick="clearForm()">
    </form>
</body>
</html>
