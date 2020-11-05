<?php

require_once 'parts/header.php';

if (isset($_SESSION['order'])) { ?>
    <h2 class="cart-title">Ваш заказ принят</h2>
    <a class="back" href="index.php">На главную</a>
<? } else if (count($_SESSION['card']) == 0) { ?>
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

<? }?>
    <hr>
    <form action="actions/mail.php" method="post" class="order">
        <input type="text" name="username" required placeholder="Ваше имя">
        <input type="text" name="phone" required placeholder="Ваш телефон">
        <input type="email" name="email" required placeholder="Ваш email">
        <input type="submit" name="order" value="Отправить заказ">
    </form>

 <?php } ?>
<hr>

</body>
</html>

