<!DOCTYPE html>
<html>

<head>
    <title>Add Item</title>
</head>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        font-size: 16px;
        line-height: 1.5;
        color: #333;
        background-color: #f5f5f5;
    }

    .edit-button {
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

    input[type="text"],
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
</style>

<body>
    <header class="header">
        <div class="container">
            <h1>Add Item</h1>
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
        $name = $_POST["name"];
        $price = $_POST["price"];
        $quantity = $_POST["quantity"];

        // Insert the new item into the database
        $sql = "INSERT INTO inventory (name, price, quantity) VALUES ('$name', $price, $quantity)";

        if (mysqli_query($conn, $sql)) {
            echo "Item added successfully";
        } else {
            echo "Error adding item: " . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
    ?>
    <form method="post" class="container">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name"><br>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price"><br>

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity"><br>

        <input type="submit" value="Add">
    </form>
    <form class="edit-button">
        <a href="index.php"> Back to Inventory</a>
    </form>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2023 Tayyab Hassan Tarar</p>
        </div>
    </footer>

</body>

</html>