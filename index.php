<?php

require_once 'parts/header.php';

if (isset($_GET['cat'])) {
    $currentCat = $_GET['cat'];
    $products = $connect->query("SELECT * FROM products WHERE cat='$currentCat'");
    $products = $products->fetchAll(PDO::FETCH_ASSOC);
    if (!$products) {
        die("Такой категории не найдено");
    }
} else {
    $products = $connect->query("SELECT * FROM products");
    $products = $products->fetchAll(PDO::FETCH_ASSOC);
}

?>

    <div class="main">
        <?foreach ($products as $product) {?>
        <div class="card">
            <a href="product.php?product=<?=$product['title']?>">
                <img src="img/<?=$product['img']?>" alt="<?=$product['russian']?>">
            </a>
            <div class="label"><?=$product['russian']?> (<?=$product['price']?> рублей)</div>
            <? require 'parts/addForm.php' ?>
        </div>
        <?}?>
    </div>

</body>
</html>

