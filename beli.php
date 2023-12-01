<?php

session_start();
$id_produk = $_GET['idproduk'];

if(isset($_SESSION['keranjang_belanja'][$id_produk]))
{
   $_SESSION['keran jang_belanja'][$id_produk]+=1;
}
else
{
   $_SESSION['keranjang_belanja'][$id_produk]=1;
}
echo "<pre>";
print_r($_SESSION['keranjang_belanja']);
echo "</pre>";
?>