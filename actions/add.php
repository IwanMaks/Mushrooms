<?php
session_start();

require_once '../db/db.php';

if (isset($_POST['id'])) {
//    unset($_SESSION['totalQuantity']);
//    unset($_SESSION['totalPrice']);
//    unset($_SESSION['card']);

    if (isset($_SESSION['order'])) {
        unset($_SESSION['order']);
    }

    $id = $_POST['id'];
    $product = $connect->query("SELECT * FROM products WHERE id='$id'");
    $product = $product->fetch(PDO::FETCH_ASSOC);

    if(isset($_SESSION['card'][$id])) {
        $_SESSION['card'][$id]['quantity'] += 1;
    } else {
        $_SESSION['card'][$id] = [
            'title' => $product['title'],
            'price' => $product['price'],
            'russian' => $product['russian'],
            'img' => $product['img'],
            'quantity' => 1
        ];
    }

    $_SESSION['totalQuantity'] = $_SESSION['totalQuantity'] ? $_SESSION['totalQuantity'] += 1 : 1;
    $_SESSION['totalPrice'] = $_SESSION['totalPrice'] ? $_SESSION['totalPrice'] += $product['price'] : $product['price'];

}

header("Location: {$_SERVER['HTTP_REFERER']}");