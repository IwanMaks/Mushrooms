<?php

require_once 'parts/header.php';

if (isset($_GET['cat'])) {
    $currentCat = $_GET['cat'];
    $products = $connect->query("SELECT * FROM products WHERE cat='$currentCat'");
    $products = $products->fetchAll(PDO::FETCH_ASSOC);
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
            <form action="actions/add.php" method="post">
                <input type="hidden" name="id" value="<?=$product['id']?>">
                <input type="submit" value="Добавить в корзину">
            </form>
        </div>
        <?}?>
    </div>

</body>
</html>

