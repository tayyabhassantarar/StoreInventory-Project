<!DOCTYPE html>
<html>

<head>
    <title>Sell Item</title>
</head>
<style>
    <style>body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        font-size: 16px;
        line-height: 1.5;
        color: #333;
        background-color: #f5f5f5;
    }

    .container {
        max-width: 960px;
        margin: 0 auto;
        padding: 20px;
    }

    .header {
        background-color: #333;
        color: #fff;
        padding: 10px;
    }

    .header h1 {
        margin: 0;
        padding: 0;
        font-size: 32px;
        line-height: 1;
        text-align: center;
        text-transform: uppercase;
    }

    .footer {
        background-color: #333;
        color: #fff;
        padding: 10px;
        text-align: center;
        margin-top: 50px;
    }

    /* Transition effect for header and footer */
    header,
    footer {
        transition: background-color 0.5s ease;
    }

    header:hover,
    footer:hover {
        background-color: gray;
    }

    form {
        background-color: #fff;
        padding: 20px;
        border-radius: 4px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
    }

    input[type="number"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: #fff;
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #3e8e41;
    }

    .sell-button {
        background-color: orange;
        margin-top: 5px;
        color: #fff;
        padding: 8px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        text-align: center;
    }
</style>
</style>

<body>
    <header class="header">
        <div class="container">
            <h1>Sell Item</h1>
        </div>
    </header>
    <?php
    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "inventory");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $item_id = $_POST["id"];
        $quantity = $_POST["quantity"];

        // Update the item quantity in the database
        $sql = "UPDATE inventory SET quantity = quantity - $quantity WHERE id = $item_id";

        if (mysqli_query($conn, $sql)) {
            echo "Item sold successfully";
        } else {
            echo "Error selling item: " . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
    ?>
    <form method="post" class="container">
        <label for="id">Item Name:</label>
        <select id="id" name="id">
            <?php
            // Connect to the database
            $conn = mysqli_connect("localhost", "root", "", "inventory");

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Retrieve the inventory items from the database
            $sql = "SELECT id, name, quantity FROM inventory";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // Output each item as an option in the select element
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row["id"] . "'>" . $row["name"] . " (Quantity: " . $row["quantity"] . ")</option>";
                }
            } else {
                echo "0 results";
            }

            mysqli_close($conn);
            ?>
        </select><br>

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity"><br>

        <input type="submit" value="Sell">
    </form>
    <form class="sell-button">
        <a href="index.php"> Back to Inventory</a>
    </form>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2023 Tayyab Hassan Tarar</p>
        </div>
    </footer>
</body>

</html>