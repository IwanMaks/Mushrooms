<?php
session_start();

if (isset($_POST['delete'])) {
    $id = $_POST['delete'];

    $_SESSION['totalQuantity'] -= $_SESSION['card'][$id]['quantity'];
    $_SESSION['totalPrice'] -= $_SESSION['card'][$id]['price'] * $_SESSION['card'][$id]['quantity'];

    unset($_SESSION['card'][$id]);
}

header("Location: {$_SERVER['HTTP_REFERER']}");