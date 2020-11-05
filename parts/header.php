<?php
session_start();
require_once 'db/db.php';

$cats = $connect->query("SELECT * FROM category");
$cats = $cats->fetchAll(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<nav>
    <ul>
        <li><a href="../index.php">Главная</a></li>
        <? foreach ($cats as $cat) { ?>
        <li><a href="../index.php?cat=<?=$cat['name']?>"><?=$cat['russian']?></a></li>
        <? } ?>
        <li><a href="../cart.php">Корзина (Товаров: <?=$_SESSION['totalQuantity'] ? $_SESSION['totalQuantity'] : 0?> на сумму <?=$_SESSION['totalPrice'] ? $_SESSION['totalPrice'] : 0?> руб)</a></li>
    </ul>
</nav>
<hr>
