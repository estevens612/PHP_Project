<?php

session_start(); // Start the session to handle previous form data
<input type="text" name="product_name" value="<?php echo isset($_SESSION['product_name']) ? htmlspecialchars($_SESSION['product_name']) : ''; ?>">

// Check if form was submitted to update session variables
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['product_name'] = $_POST['product_name'] ?? '';
    $_SESSION['city'] = $_POST['city'] ?? '';
    $_SESSION['min_quantity'] = $_POST['min_quantity'] ?? '';
    $_SESSION['max_quantity'] = $_POST['max_quantity'] ?? '';
    $_SESSION['min_price'] = $_POST['min_price'] ?? '';
    $_SESSION['max_price'] = $_POST['max_price'] ?? '';
}

// Function to clear session variables when the clear form button is pressed
function clearSession() {
    $_SESSION['product_name'] = '';
    $_SESSION['city'] = '';
    $_SESSION['min_quantity'] = '';
    $_SESSION['max_quantity'] = '';
    $_SESSION['min_price'] = '';
    $_SESSION['max_price'] = '';
}

if (isset($_POST['clear_form'])) {
    clearSession();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Search</title>
    <script>
        function clearForm() {
            document.getElementById("searchForm").reset();
            // Clear session variables on the server side after clearing the form
            window.location = "search.php?clear_form=true";
        }
    </script>
</head>
<body>
    <h1>Product Search</h1>
    <form id="searchForm" action="search_results.php" method="post">
        Product Name (substring): <input type="text" name="product_name" value="<?php echo htmlspecialchars($_SESSION['product_name'] ?? ''); ?>"><br>
        City (substring): <input type="text" name="city" value="<?php echo htmlspecialchars($_SESSION['city'] ?? ''); ?>"><br>
        Minimum Quantity: <input type="number" name="min_quantity" value="<?php echo htmlspecialchars($_SESSION['min_quantity'] ?? ''); ?>"><br>
        Maximum Quantity: <input type="number" name="max_quantity" value="<?php echo htmlspecialchars($_SESSION['max_quantity'] ?? ''); ?>"><br>
        Minimum Price: <input type="number" step="0.01" name="min_price" value="<?php echo htmlspecialchars($_SESSION['min_price'] ?? ''); ?>"><br>
        Maximum Price: <input type="number" step="0.01" name="max_price" value="<?php echo htmlspecialchars($_SESSION['max_price'] ?? ''); ?>"><br>
        <input type="submit" value="Search Products">
        <input type="button" value="Clear Form" onclick="clearForm()">
    </form>
</body>
</html>
