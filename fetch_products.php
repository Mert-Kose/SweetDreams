<?php
mb_internal_encoding("UTF-8");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sweetdreams";

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM Products";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="col-lg-3 col-md-4 col-sm-6 mix ' . $row["Category"] . '">
            <div class="featured__item">
                <div class="featured__item__pic set-bg" data-setbg="' . $row["ImageURL"] . '">
                    <ul class="featured__item__pic__hover">
                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                </div>
                <div class="featured__item__text">
                    <h6><a href="#">' . $row["Name"] . '</a></h6>
                    <h5>' . $row["Price"] . '₺</h5>
                </div>
            </div>
        </div>';
    }
} else {
    echo "No products found";
}

$conn->close();
?>