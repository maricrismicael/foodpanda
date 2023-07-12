<?php
include '_dbconnect.php';

$sql = "DELETE FROM viewcart";
$result = mysqli_query($conn, $sql);

$userId = $_POST['addUser'];
$itemId = $_POST['addFood'];

$sql = "INSERT INTO `viewcart` (`FK_ITEM_ID`, `ITEM_QUANTITY`, `FK_CUSTOMER_ID`) VALUES ('$itemId', '1', '$userId')";
$result = mysqli_query($conn, $sql);

echo "<script>
window.history.back(1);
</script>";

?>