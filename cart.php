<?php
session_start();
require_once 'parts/header.php';

foreach ($_SESSION['card'] as $product) {

?>

<div class="cart">
    <a href="product.php?product=<?=$product['title']?>"><img src="img/<?=$product['img']?>" alt="<?=$product['russian']?>"></a>
    <div class="cart-descr">
        <?=$product['russian']?> в количестве <?=$product['quantity']?> шт на сумму <?=$product['quantity'] * $product['price']?> рублей
    </div>
    <button type="submit">Удалить</button>
</div>
<? } ?>
<hr>

</body>
</html>

