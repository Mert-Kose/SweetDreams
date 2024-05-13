<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Order Details</title>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="5">
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

        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #333;
            color: #fff;
            padding: 10px;
            padding-top: 30px;
            display: flex;
            flex-direction: column;
            transition: width 0.3s ease;
        }

        .sidebar {
            width: 200px;
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

        .order {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            margin: 20px;
            padding: 20px;
        }

        .order-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            font-family: Arial, sans-serif;
            color: #333;
        }

        .order-item-img {
            width: 20px;
            height: 20px;
            margin-right: 10px;
            border-radius: 50%;
        }

        .order-total {
            font-family: Arial, sans-serif;
            font-size: 1.2em;
            font-weight: bold;
            color: #333;
        }

        .order-complete {
            font-family: Arial, sans-serif;
            font-size: 1em;
            color: #fff;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .order-complete:hover {
            background-color: #0056b3;
        }

        h2,
        h3 {
            color: #333;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        #tables {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .table {
            width: 200px;
            height: 250px;
            border: 1px solid #000;
            text-align: center;
            margin: 10px;
            color: #000;
            position: relative;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            border-radius: 5px;
            padding: 20px;
            overflow: auto;
            flex: 0 0 calc(20% - 20px);
        }

        .table.ordered {
            background-color: #4CAF50;
        }

        .table.not-ordered {
            background-color: #ddd;
            height: 200px;
        }

        button {
            background-color: #f44336;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 10px 2px;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <a href="admin.php" class="active">Siparişler</a>
        <a href="edit.php">Fiyatlar</a>
    </div>
    <div class="content">
        <div id="tables">
            <div class="table" id="table1">Masa 1</div>
            <div class="table" id="table2">Masa 2</div>
            <div class="table" id="table3">Masa 3</div>
            <div class="table" id="table4">Masa 4</div>
            <div class="table" id="table5">Masa 5</div>
            <div class="table" id="table6">Masa 6</div>
            <div class="table" id="table7">Masa 7</div>
            <div class="table" id="table8">Masa 8</div>
            <div class="table" id="table9">Masa 9</div>
            <div class="table" id="table10">Masa 10</div>
        </div>
    </div>
    <div id="order-details">
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function () {
            let ordersJson = localStorage.getItem('orders');
            let orders = JSON.parse(ordersJson) || [];

            $('.table').addClass('not-ordered');

            orders.forEach((order, index) => {
                let table = $('#table' + order.masa);
                table.removeClass('not-ordered').addClass('ordered');

                let orderNumber = $('<h2>').text('Sipariş ' + (index + 1));
                let itemsList = $('<ul>');

                let total = 0;

                order.items.forEach(item => {
                    let listItem = $('<li>').addClass('order-item').text(item.name + ' - ₺' + item.price + ' x ' + item.quantity);
                    let image = $('<img>').addClass('order-item-img').attr('src', item.img).attr('alt', item.name);
                    let totalParagraph = $('<p>').addClass('order-total').text('Toplam: ₺' + total);
                    let completeButton = $('<button>').addClass('order-complete').text('Siparişi Tamamla');
                    listItem.prepend(image);
                    itemsList.append(listItem);

                    total += item.price * item.quantity;
                });

                let totalParagraph = $('<p>').text('Toplam: ₺' + total);

                let completeButton = $('<button>').text('Siparişi Tamamla');
                completeButton.on('click', function () {
                    let orderIndex = orders.findIndex(o => o.id === order.id);

                    if (orderIndex !== -1) {
                        orders.splice(orderIndex, 1);
                    }

                    localStorage.setItem('orders', JSON.stringify(orders));

                    location.reload();
                });

                table.append(orderNumber, itemsList, totalParagraph, completeButton);
            });
        });
    </script>
</body>

</html>