<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sweetdreams";

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("UPDATE products SET Name = ?, Price = ? WHERE ProductID = ?");

    $stmt->bind_param("ssd", $_POST['Name'], $_POST['Price'], $_POST['ProductID']);
    if ($stmt->execute()) {
        header("location: edit.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

$product_info = "";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $product_info .= "<form method='POST' action='edit.php'>";
        $product_info .= "<div class='product-box'>";
        $product_info .= "<img src='" . $row["ImageURL"] . "' alt='" . $row["Name"] . "'>";
        $product_info .= "<input type='text' name='Name' value='" . $row["Name"] . "'>";
        $product_info .= "<input type='text' name='Price' value='" . $row["Price"] . "'>";
        $product_info .= "<input type='hidden' name='ProductID' value='" . $row["ProductID"] . "'>";
        $product_info .= "<input type='submit' value='Güncelle'>";
        $product_info .= "</div>";
        $product_info .= "</form>";
    }
} else {
    $product_info = "0 results";
}
$conn->close();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Order Details</title>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
        }

        html {
            margin: 0;
            overflow: hidden;
        }

        .content {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-gap: 10px;
        }


        .product-box {
            border: 1px solid #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .product-box img {
            width: 30%;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        .sidebar {
            width: 155px;
            height: 100vh;
            background-color: #333;
            color: #fff;
            padding: 20px;
            padding-top: 100px;
            display: flex;
            flex-direction: column;
        }

        .content {
            flex-grow: 1;
            padding: 50px;
        }

        input[type='text'],
        input[type='submit'] {
            width: 80%;
        }

        input[type='text'] {
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: none;
            border-bottom: 2px solid #4CAF50;
        }

        input[type='submit'] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type='submit']:hover {
            background-color: #45a049;
        }

        .sidebar a {
            display: block;
            color: #fff;
            text-decoration: none;
            margin-bottom: 10px;
            padding: 10px 40px;
            border: 1px solid #fff;
            border-radius: 5px;
            text-align: center;
        }

        .sidebar a.active {
            font-weight: bold;
            background-color: #fff;
            color: #333;
        }

        .sidebar a:hover {
            background-color: #fff;
            color: #333;
        }

        ::-webkit-scrollbar {
            display: none;
        }

        html {
            scrollbar-width: none;
            -ms-overflow-style: none;
        }
    </style>

<body>
    <div class="sidebar"><a href="admin.php">Siparişler</a>
        <a href="edit.php" class="active">Fiyatlar</a>
    </div>
    <div class="content">
        <?php echo $product_info; ?>
    </div>

</body>

</html>