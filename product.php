<?php

require_once 'db/db.php';

if (isset($_GET['product'])) {
    $currentTitle = $_GET['product'];
    $product = $connect->query("SELECT * FROM products WHERE title='$currentTitle'");
    $product = $product->fetch(PDO::FETCH_ASSOC);

    if (!$product) {
        header("Location: index.php");
    }

    require_once 'parts/header.php';
}

?>


<div class="product-card">
    <a href="index.php">Вернуться на главную</a>

    <h2><?=$product['russian']?> (<?=$product['price']?> рублей)</h2>
    <div class="descr"><?=$product['desc']?></div>
    <img width="300" src="img/<?=$product['img']?>" alt="Фото">
    <? require_once 'parts/addForm.php' ?>
</div>
