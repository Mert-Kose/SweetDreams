<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $form_username = $_POST['username'];
    $form_password = $_POST['password'];


    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $form_username, $form_password);

    $stmt->execute();


    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

        $_SESSION["loggedin"] = true;
        header("Location: admin.php");
        exit;
    }

    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Giriş Sayfası</title>
    <style>
        body {
            overflow: hidden;
            font-family: Arial, Helvetica, sans-serif;
            background-image: url("img/background.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 300px;
            padding: 16px;
            background-color: #f8f9fa;

            border: none;

            border-radius: 8px;

            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);

            transition: all 0.3s ease-out;

        }

        .logo {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }

        .container h2 {
            text-align: center;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .button-container {
            display: flex;
            justify-content: space-between;

        }

        .btn-login {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 12px;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            transition: opacity 0.5s ease;
        }

        .btn1 {
            background-color: #cb310c;
            color: white;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 12px;
            transition: opacity 0.5s ease;
        }

        button:hover {
            opacity: 0.8;
        }
    </style>
</head>

<body>

    <div class="container">
        <form action="login.php" method="post">
            <img src="img/biglogo.png" alt="Logo" class="logo" />
            <h2>Giriş Sayfası</h2>
            <label>Kullanıcı Adı: <input type="text" name="username"></label>
            <label>Şifre: <input type="password" name="password"></label>
            <div class="button-container">
                <input type="submit" value="Giriş" class="btn-login">
                <button class="btn1" type="reset">İptal</button>
            </div>
        </form>
        <?php if (!empty($error))
            echo $error; ?>
    </div>
</body>

</html>