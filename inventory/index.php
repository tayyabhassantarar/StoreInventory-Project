<!DOCTYPE html>
<html>

<head>
    <title>Store Inventory</title>
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
            padding: 2px;
            text-align: center;
            margin-top: 220px;
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

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .add-button,
        .sell-button,
        .delete-button {
            background-color: #4CAF50;
            margin-top: 5px;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .add-button:hover,
        .sell-button:hover,
        .delete-button:hover {
            margin-top: 2px;
            background-color: #3e8e41;
        }

        form {
            display: inline-block;
            margin-right: 5px;
        }

        .delete-button {
            background-color: #f44336;
        }

        .sell-button {
            background-color: #008CBA;
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="container">
            <h1>Store Inventory</h1>
        </div>
    </header>
    <main class="container">
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
            <?php
            // Connect to the database
            $conn = mysqli_connect("localhost", "root", "", "inventory");

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Retrieve the inventory items from the database
            $sql = "SELECT * FROM inventory";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // Output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["price"] . "</td>";
                    echo "<td>" . $row["quantity"] . "</td>";
                    echo "<td ><a href='edit.php?id=" . $row["id"] . "'>Edit</a> | <a href='delete.php?id=" . $row["id"] . "'>Remove</a> | <a href='sell.php?id=" . $row["id"] . "'>Sell</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "0 results";
            }

            mysqli_close($conn);
            ?>
        </table>
        <form class="add-button">
            <a href="add.php"> Add item</a>
        </form>
    </main>
    <footer class="footer">
        <div class="container">
            <p>&copy; 2023 Tayyab Hassan Tarar</p>
        </div>
    </footer>
</body>

</html>