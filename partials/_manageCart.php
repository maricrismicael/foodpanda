<?php
include '_dbconnect.php';
session_start();



if($_SERVER["REQUEST_METHOD"] == "POST") {
   $userId = $_SESSION['userId'];

    if(isset($_POST['addToCart'])) {
 
    $itemId = $_POST["itemId"];
        function goAdd() {
            include '_dbconnect.php';
            $userId = $_SESSION['userId'];
            $itemId = $_POST["itemId"];
            // Check whether this item exists
            $existSql = "SELECT * FROM `viewcart` WHERE FK_ITEM_ID = '$itemId' AND `FK_CUSTOMER_ID`='$userId'";
            $result = mysqli_query($conn, $existSql);
            $numExistRows = mysqli_num_rows($result);
            if($numExistRows > 0){
                echo "<script>alert('Item Already Added.');
                        window.history.back(1);
                        </script>";
            }
            else{
                $sql = "INSERT INTO `viewcart` (`FK_ITEM_ID`, `ITEM_QUANTITY`, `FK_CUSTOMER_ID`) VALUES ('$itemId', '1', '$userId')";   
                $result = mysqli_query($conn, $sql);
                if ($result){
       
                    echo "<script>
                        window.history.back(1);
                        </script>";
                }
            }
        };

        $foodVendor = $_POST["foodVendor"];
        // Check whether this item exists
        $existSql = "SELECT * FROM `viewcart` INNER JOIN goods ON viewcart.FK_ITEM_ID = goods.ITEM_ID WHERE FK_RESTAURANT_ID = '$foodVendor'";
        $result = mysqli_query($conn, $existSql);
        $numExistRows = mysqli_num_rows($result);
        
        if($numExistRows > 0){
             goAdd();
        }
        else{
            $existSql1 = "SELECT * FROM `viewcart` INNER JOIN goods ON viewcart.FK_ITEM_ID = goods.ITEM_ID LIMIT 1";
            $result1 = mysqli_query($conn, $existSql1);
            while($row1 = mysqli_fetch_assoc($result1)){
             $currentVendor = $row1['FK_RESTAURANT_ID'];
            }  

            if(empty($currentVendor)){
                goAdd();
            }
            else{

                echo "<script> 
                sessionStorage.setItem('removeModal', 1);
                sessionStorage.setItem('removeModalFood', '$itemId');
                sessionStorage.setItem('removeModalUser', '$userId');
                window.history.back(1);</script>"; 
                
            } 
        }


    }
    if(isset($_POST['removeItem'])) {
        $itemId = $_POST["itemId"];
        $sql = "DELETE FROM `viewcart` WHERE `FK_ITEM_ID`='$itemId' AND `FK_CUSTOMER_ID`='$userId'";   
        $result = mysqli_query($conn, $sql);
        echo "<script>alert('Removed');
                window.history.back(1);
            </script>";
    }
    if(isset($_POST['removeAllItem'])) {
        $sql = "DELETE FROM `viewcart` WHERE `FK_CUSTOMER_ID`='$userId'";   
        $result = mysqli_query($conn, $sql);
        echo "<script>alert('Removed All');
                window.history.back(1);
            </script>";
    }
    if(isset($_POST['checkout'])) {
        $amount = $_POST["amount"];
        $tax = $_POST["tax"];
        $delivery = $_POST["delivery"];
        $MOD = $_POST["MOD"];
        $price = $_POST["price"];
        
        $sql = "INSERT INTO orders (FK_CUSTOMER_ID, ORDER_PRICE) VALUES ('$userId', '$amount')";
        $result = mysqli_query($conn, $sql);
        
        $sql = "SELECT ORDER_ID FROM orders ORDER BY ORDER_ID DESC LIMIT 1";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $orderId = $row['ORDER_ID'];
        }

        $sql = "SELECT * FROM viewcart INNER JOIN goods ON viewcart.FK_ITEM_ID = goods.ITEM_ID WHERE FK_CUSTOMER_ID = '$userId'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $item_id = $row['FK_ITEM_ID'];
            $quant = $row['ITEM_QUANTITY'];
            $price = $row['UNIT_PRICE'];
            $subtotal = $price * $quant;
            $sql1 = "INSERT INTO order_details (FK_ORDER_ID, FK_ITEM_ID, QUANTITY, SUBTOTAL) VALUES ('$orderId', '$item_id','$quant', '$subtotal')";
            $result1 = mysqli_query($conn, $sql1);
        }

        $sql = "SELECT FK_ORDER_ID, SUM(SUBTOTAL) AS TOTAL FROM order_details GROUP BY FK_ORDER_ID";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $pay_total = $row['TOTAL'];
        }

        $sql = "INSERT INTO payments (FK_ORDER_ID, FK_CUSTOMER_ID, ORDER_AMOUNT, TAX, DELIVERY_CHARGE, METHOD) VALUES ('$orderId', '$userId','$pay_total', '$tax','$delivery', '$MOD')";
        $result = mysqli_query($conn, $sql);

        $sql = "DELETE FROM viewcart WHERE FK_CUSTOMER_ID = '$userId'";
        $result = mysqli_query($conn, $sql);
        
        if($result){
            echo "<script>alert('Sucessfully Placed Order.');
                        window.history.back(1);
                        </script>";
        }
        else{
            echo "<script>alert('ERROR 404.');
            window.history.back(1);
            </script>";
        }
 
    }
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
    {
        $foodId = $_POST['foodId'];
        $qty = $_POST['quantity'];
        $updatesql = "UPDATE `viewcart` SET `itemQuantity`='$qty' WHERE `foodId`='$foodId' AND `userId`='$userId'";
        $updateresult = mysqli_query($conn, $updatesql);
    }
    
}
?>