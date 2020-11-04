<?php

require_once 'parts/header.php';

if (count($_SESSION['card']) == 0) { ?>
    <h2 class="cart-title">Ваша корзина пуста</h2>
    <a class="back" href="index.php">На главную</a>
<?php } else {

foreach ($_SESSION['card'] as $key=>$product) {

?>

<div class="cart">
    <a href="product.php?product=<?=$product['title']?>"><img src="img/<?=$product['img']?>" alt="<?=$product['russian']?>"></a>
    <div class="cart-descr">
        <?=$product['russian']?> в количестве <?=$product['quantity']?> шт на сумму <?=$product['quantity'] * $product['price']?> рублей
    </div>
    <form action="actions/delete.php" method="post">
        <input type="hidden" name="delete" value="<?=$key?>">
        <input type="submit" value="Удалить">
    </form>
</div>
<hr>

    <form action="actions/mail.php"></form>

<? }} ?>
<hr>

</body>
</html>

