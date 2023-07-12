<?php
include '_dbconnect.php';

$sql = "SELECT * FROM `customers` WHERE `CUSTOMER_ID`='$userId'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
    $locId =  $row['FK_LOCATION_ID'];
}

$n=0;
$phone = array();
$sql = "SELECT * FROM `customers_phonenums` WHERE `FK_CUSTOMER_ID`='$userId'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
    $phone[$n] =  $row['PHONE_NO'];
    $n++;
}

if(empty($phone[1])){
    $phone[1] = "";
}


$sql = "SELECT * FROM `locations` INNER JOIN regions ON locations.FK_REGION_ID = regions.REGION_ID WHERE `LOCATION_ID`='$locId'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
    $street =  $row['STREET_ADDRESS'];
    $city =  $row['CITY'];
    $region =  $row['REGION_NAME'];
}
?>


<!-- Checkout Modal -->
<div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="checkoutModal">Review Your Order</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="partials/_manageCart.php" method="post">
                <label for="address" style="font-weight: bold;">Address:</label><br>
                <p style="display: inline;"><?php echo $street ?>, <?php echo $city ?>, <?php echo $region ?></p><br><br>
                <label for="phone1" style="font-weight: bold;">Phone#1</label>
                <p style="display: inline;">+63<?php echo $phone[0] ?></p><br>
                <label for="phone2" style="font-weight: bold;">Phone#2:</label>
                <p style="display: inline;">+63<?php echo $phone[1] ?></p><br>
                <p style="display: inline; font-weight: bold;">Orders:</p><br>
                <?php
                                $sql = "SELECT * FROM `viewcart` WHERE `FK_CUSTOMER_ID`= $userId";
                                $result = mysqli_query($conn, $sql);
                                $counter = 0;
                                $totalPrice = 0;
                                while($row = mysqli_fetch_assoc($result)){
                                    $foodId = $row['FK_ITEM_ID'];
                                    $Quantity = $row['ITEM_QUANTITY'];
                                    $cartId = $row['CARTITEMID'];
                                    $mysql = "SELECT * FROM `goods` WHERE ITEM_ID = $foodId";
                                    $myresult = mysqli_query($conn, $mysql);
                                    $myrow = mysqli_fetch_assoc($myresult);
                                    $foodName = $myrow['ITEM_NAME'];
                                    $foodPrice = $myrow['UNIT_PRICE'];
                                    $total = $foodPrice * $Quantity;
                                    $counter++;
                                    $totalPrice = $totalPrice + $total;

                                    echo '<span> '.$foodName.'  '.$Quantity .'pc/s Php'.$total.'</span><br>';
                                }
         
                ?>
               <br><p style="display: inline; font-weight: bold;">Total Amount (including tax and charge):<p>Php<?php echo $totalAmount ?></p></p>
                <input type="hidden" name="amount" value="<?php echo $totalAmount ?>">
                <input type="hidden" name="price" value="<?php echo $totalPrice ?>">
                <input type="hidden" name="tax" value="<?php echo $tax ?>">
                <input type="hidden" name="delivery" value="<?php echo $shipping ?>">
                <input type="hidden" name="MOD" value="Cash On Delivery">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="checkout" class="btn btn-success"> Place Order</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>