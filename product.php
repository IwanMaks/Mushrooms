<?php

require_once 'parts/header.php';

if (isset($_GET['product'])) {
    $currentTitle = $_GET['product'];
    $product = $connect->query("SELECT * FROM products WHERE title='$currentTitle'");
    $product = $product->fetch(PDO::FETCH_ASSOC);
}

?>


<div class="product-card">
    <a href="index.php">Вернуться на главную</a>

    <h2><?=$product['russian']?> (<?=$product['price']?> рублей)</h2>
    <div class="descr"><?=$product['desc']?></div>
    <img width="300" src="img/<?=$product['img']?>" alt="Фото">
    <form action="actions/add.php" method="post">
        <input type="hidden" name="id" value="<?=$product['id']?>">
        <input type="submit" value="Добавить в корзину">
    </form>
</div>
