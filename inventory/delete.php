<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "inventory");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the item ID from the URL parameter
$item_id = $_GET["id"];

// Delete the item from the database
$sql = "DELETE FROM inventory WHERE id = $item_id";

if (mysqli_query($conn, $sql)) {
    echo "Item deleted successfully";
} else {
    echo "Error deleting item: " . mysqli_error($conn);
}

mysqli_close($conn);
?>