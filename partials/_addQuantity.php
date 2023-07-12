
<?php
include '_dbconnect.php';
session_start();
$cartId = $_POST['cartIdChange'];
$newQuant = $_POST['newQuant'];

$sql = "UPDATE viewcart SET ITEM_QUANTITY = '$newQuant' WHERE CARTITEMID = $cartId";
$result = mysqli_query($conn, $sql);
header('Location: /viewCart.php');

?>